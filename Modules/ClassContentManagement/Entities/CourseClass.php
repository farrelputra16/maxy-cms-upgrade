<?php

namespace Modules\ClassContentManagement\Entities;


use App\Models\Course;
use App\Models\CourseClassMember;
// use App\Models\CourseClassModule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ClassContentManagement\Entities\CourseClassModule;

use Illuminate\Support\Facades\Auth;
use DB;

class CourseClass extends Model
{
    use HasFactory;

    protected $table = 'course_class';

    protected $fillable = [
        'batch',
        'start_date',
        'end_date',
        'quota',
        "slug",
        "payment_link",
        "slashed_price",
        "price",
        'course_id',
        'announcement',
        'content',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    protected static function newFactory()
    {
        return \Modules\ClassContentManagement\Database\factories\CourseClassFactory::new();
    }


    public static function getAllCourseClass()
    {
        $class_list = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->get();

        return $class_list;
    }
    public static function getTutorEnrolledClass()
    {
        $class_list = DB::table('course_module as cm')
            ->select('cm.id', 'cm.name', 'cm.day', 'course.name as course_name', 'course_class.batch', 'course_class.id as class_id', 'course_class_module.id as module')
            ->whereIn('cm.type', ['assignment', 'quiz'])
            ->join('course_class_module', 'course_class_module.course_module_id', '=', 'cm.id')
            ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
            ->join('course', 'course.id', '=', 'course_class.course_id')
            ->get();

        // Initialize the final array
        $final_array = [];

        // Iterate through each class in the list
        foreach ($class_list as $class) {
            $class_id = $class->class_id;
            $module_id = $class->module;
            // Join with course_class_member, course_class_member_grading, and users tables
            $class_members = DB::table('course_class_member')
                ->join('users', 'users.id', '=', 'course_class_member.user_id')
                ->leftJoin('course_class_member_grading', function ($join) use ($class_id, $module_id) {
                    $join->on('course_class_member_grading.user_id', '=', 'course_class_member.user_id')
                        ->where('course_class_member_grading.course_class_module_id', $module_id);
                })
                ->select(
                    'users.id as user_id',
                    'users.name as user_name',
                    'course_class_member_grading.submitted_file',
                    'course_class_member_grading.comment',
                    'course_class_member_grading.tutor_comment',
                    'course_class_member_grading.grade',
                    'course_class_member_grading.id as id_grading'
                )
                ->where('course_class_member.course_class_id', $class_id)
                ->get();

            // Add each member to the final array
            foreach ($class_members as $member) {
                $classKey = $class->name;
                $userKey = $member->user_id;

                // If user not in array for this class, add them
                if (!isset($final_array[$classKey][$userKey])) {
                    $final_array[$classKey][$userKey] = (object) array_merge((array) $class, (array) $member);
                }
            }
        }
        // Flatten the array to have a sequential index
        $final_array = array_reduce($final_array, 'array_merge', []);
        return $final_array;
    }


    public static function getDuplicateCourseClass($request)
    {
        $idCourseClass = $request->id;
        if ($idCourseClass !== null) {
            $allCourseClasses = DB::table('course_class')
                ->select(
                    'course_class.id AS course_class_id',
                    'course_class.batch AS course_class_batch',
                    'course.id AS course_id',
                    'course.name AS course_name'
                )
                ->join('course', 'course_class.course_id', '=', 'course.id')
                ->where('course_class.id', $idCourseClass)
                ->get();
        } else {
            $allCourseClasses = DB::select('SELECT course_class.id AS course_class_id,
            course_class.batch AS course_class_batch,
            course.id AS course_id,
            course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');
        }

        return $allCourseClasses;
    }

    public static function getCurrentDataCourseClass($course_class_id)
    {
        $currentData = collect(DB::select('SELECT course.name AS course_name,
            course_class.course_id AS course_id, course_class.id as course_class_id, course_class.batch as batch
            FROM course_class
            INNER JOIN course
            ON course_class.course_id = course.id
            WHERE course_class.id = ?;', [$course_class_id]))->first();

        return $currentData;
    }
    public static function getCourseDetailByClassId($course_class_id)
    {
        $currentDataCourse = DB::table('course_class as cc')
            ->select('c.id', 'c.name', 'cc.batch')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->where('cc.id', $course_class_id)
            ->first();
        return $currentDataCourse;
    }

    public static function getEditCourseClassMemberCurrentData($request)
    {
        $idCourseClass = $request->id;
        $currentData = collect(DB::select('SELECT course.name AS course_name,
            course_class.course_id AS course_id
            FROM course_class
            INNER JOIN course
            ON course_class.course_id = course.id
            WHERE course_class.id = ?;', [$idCourseClass]))->first();

        $currentDataCourse = DB::select('SELECT course.name AS course_name
        FROM course_class
        JOIN course ON course_class.course_id = course.id
        WHERE course_class.id = ?;
        ', [$currentData[0]->ccm_course_class_id])[0];

        $allCourseClasses = DB::select('SELECT course_class.id AS course_class_id,
        course_class.batch AS course_class_batch,
        course.id AS course_id,
        course.name AS course_name
        FROM course_class
        JOIN course
        WHERE course_class.course_id = course.id AND NOT course_class.id = ?;
        ', [$currentData[0]->ccm_course_class_id]);

        return [
            'currentData' => $currentData,
            'currentDataCourse' => $currentDataCourse,
            'allCourseClasses' => $allCourseClasses
        ];
    }


    public static function getEditCourseClassMemberCOURSEandCLASSES($currentData)
    {

        $currentDataCourse = DB::select('SELECT course.name AS course_name
        FROM course_class
        JOIN course ON course_class.course_id = course.id
        WHERE course_class.id = ?;
        ', [$currentData[0]->ccm_course_class_id])[0];

        $allCourseClasses = DB::select('SELECT course_class.id AS course_class_id,
        course_class.batch AS course_class_batch,
        course.id AS course_id,
        course.name AS course_name
        FROM course_class
        JOIN course
        WHERE course_class.course_id = course.id AND NOT course_class.id = ?;
        ', [$currentData[0]->ccm_course_class_id]);

        return [
            'currentDataCourse' => $currentDataCourse,
            'allCourseClasses' => $allCourseClasses
        ];
    }

    // new
    public static function getAllParentCourseModuleByCourseId($course_id)
    {
        $allModule = DB::table('course_module as cm')
            ->select('*')
            ->where('cm.course_id', $course_id)
            ->where('type', '!=', 'company_profile')
            ->where('status', 1)
            ->where('level', 1)
            ->get();

        return $allModule;
    }

    // new
    public static function getClassDetailByClassModuleId($course_class_module_id)
    {
        $class_detail = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name', 'mct.name as course_type_name')
            ->join('course_class_module as ccmodule', 'ccmodule.course_class_id', '=', 'cc.id')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->join('m_course_type as mct', 'mct.id', '=', 'c.m_course_type_id')
            ->where('ccmodule.id', $course_class_module_id)
            ->first();
        return $class_detail;
    }
    // new
    public static function getClassDetailByClassId($course_class_id)
    {
        $class_detail = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name', 'mct.name as course_type_name')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->join('m_course_type as mct', 'mct.id', '=', 'c.m_course_type_id')
            ->where('cc.id', $course_class_id)
            ->first();
        $class_detail->parent_modules = DB::table('course_class_module as ccmodule')
            ->select('ccmodule.*', 'cm.name as module_name', 'cm.type as module_type', 'cm.id as module_id')
            ->join('course_module as cm', 'cm.id', '=', 'ccmodule.course_module_id')
            ->where('ccmodule.status', 1)
            ->where('ccmodule.level', 1)
            ->where('ccmodule.course_class_id', $course_class_id)
            ->where('cm.type', '!=', 'company_profile')
            ->orderBy('ccmodule.priority', 'asc')
            ->get();
        foreach ($class_detail->parent_modules as $parent) {
            $submods = DB::table('course_class_module as ccmodule')
                ->select('ccmodule.*', 'cm.name as module_name', 'cm.type as module_type', 'cm.material as material', 'cm.duration as duration', 'cm.course_module_parent_id as parent_id')
                ->join('course_module as cm', 'cm.id', '=', 'ccmodule.course_module_id')
                // ->where('ccmodule.status', 1)
                ->where('ccmodule.course_class_id', $course_class_id)
                ->where('cm.course_module_parent_id', $parent->module_id)
                // ->where('cm.type', '!=', 'company_profile')
                // ->where('ccmodule.level', 2)
                ->orderBy('ccmodule.priority', 'asc')
                ->get();
            $parent->submod = $submods;
        }
        return $class_detail;
    }
}
