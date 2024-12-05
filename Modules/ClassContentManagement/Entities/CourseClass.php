<?php

namespace Modules\ClassContentManagement\Entities;


use App\Models\Course;
use App\Models\CourseClassMember;

// use App\Models\CourseClassModule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\ClassContentManagement\Entities\CourseClassModule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Psr7\Request;

class CourseClass extends Model
{
    use HasFactory;

    protected $table = 'course_class';

    public $timestamps = false;
    protected $guarded = [];
    protected $with = ['course'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function members()
    {
        return $this->hasMany(CourseClassMember::class, 'course_class_id');
    }

    public function modules()
    {
        return $this->hasMany(CourseClassModule::class, 'course_class_id')
            ->orderBy('priority')
            ->where('status', 1)
            ->where('level', '!=', 0);
    }

    public function scopeTotalDuration($query)
    {
        return $query->addSelect([
            'total_duration' => CourseClassModule::selectRaw('CAST(SUM(course_module.duration) AS SIGNED)')
                ->whereColumn('course_class_module.course_class_id', 'course_class.id')
                ->leftJoin('course_module', 'course_class_module.course_module_id', '=', 'course_module.id')
        ]);
    }

    public function scopeCompleteDetails($query)
    {
        return $query->totalDuration()
            ->withCount(['modules' => function ($query) {
                $query->where('level', '>=', 2);
            }])
            ->withCount(['members' => function ($query) {
                $query->where('status', 1);
            }])
            ->whereHas('course.type', function ($query) {
                $query->where('id', '!=', 2);
            })
            ->whereHas('members', function ($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->user()->id);
                }
            })
            ->having('modules_count', '>', 0)
            ->where('status', 1);
    }

    // Untuk mendapatkan parent modules
    public function parentModules()
    {
        return $this->modules()->with('courseModule', 'gradings')
            ->whereHas('courseModule', function ($query) {
                $query->where('level', 1)->where('status', 1)->whereNotNull('day')->orderBy('priority')->orderBy('day');
            })
            //            ->whereHas('gradings', function ($query) {
            //                $query->where('user_id', auth()->user()->id);
            //            })
            ->get();
    }

    // Untuk mendapatkan child modules
    public function childModules()
    {
        return $this->modules()->with('courseModule')->whereHas('courseModule', function ($query) {
            $query->where('level', '>', 1)->where('status', 1)->whereNotNull('day')->orderBy('priority')->orderBy('day');
        })->get();
    }

    public static function getAllCourseClass()
    {
        $class_list = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name', 'c.slug as course_slug', 'mct.name as type', 'mct.slug as type_slug', 'ct.name as class_type')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->join('m_course_type as mct', 'mct.id', '=', 'c.m_course_type_id')
            ->join('m_class_type as ct', 'ct.id', '=', 'cc.m_class_type_id')
            ->orderBy('cc.batch', 'asc')
            ->orderBy('cc.slug', 'asc')
            ->get();

        return $class_list;
    }

    public static function getAllCourseClassbyMentor()
    {
        // dd(Auth::user()->id);
        // $class_list = DB::table('course_class as cc')
        //     ->select('cc.*', 'c.name as course_name', 'mct.name as type')
        //     ->join('course as c', 'c.id', '=', 'cc.course_id')
        //     ->join('m_course_type as mct', 'mct.id', '=', 'c.m_course_type_id')
        //     ->join('course_class_member as ccmember', 'ccmember.course_class_id', '=', 'cc.id')
        //     ->where('ccmember.user_id', Auth::user()->id)
        //     ->get();

        $class_list = DB::table('user_mentorships')
            ->leftJoin('course_class', 'user_mentorships.course_class_id', '=', 'course_class.id')
            ->leftJoin('course', 'course_class.course_id', '=', 'course.id')
            ->leftJoin('m_course_type', 'course.m_course_type_id', '=', 'm_course_type.id')
            ->leftJoin('m_class_type', 'course_class.m_class_type_id', '=', 'm_class_type.id')
            ->where('user_mentorships.mentor_id', Auth::user()->id)
            ->select('course_class.*', 'course.name as course_name', 'course.slug as course_slug', 'm_course_type.name as type', 'm_course_type.slug as type_slug', 'm_class_type.name as class_type')
            ->orderBy('course_class.batch', 'asc')
            ->orderBy('course_class.slug', 'asc')
            ->distinct()
            ->get();

        return $class_list;
    }

    public static function getAssignmentModulesByClassId($class_id)
    {
        // get assignment & quiz modules
        $module_list = DB::table('course_module as cm')
            ->select('ccm.*', 'cm.name as module_name', 'cm.course_module_parent_id as parent_id', 'c.name as course_name', 'cc.batch as batch', 'cc.id as class_id')
            ->join('course_class_module as ccm', 'ccm.course_module_id', '=', 'cm.id')
            ->join('course_class as cc', 'cc.id', '=', 'ccm.course_class_id')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->whereIn('cm.type', ['assignment'])
            ->where('ccm.status', 1)
            ->where('cm.status', 1)
            ->where('cc.id', $class_id)
            ->get();

        // get class member list
        $class_member_list = DB::table('course_class_member as ccmember')
            ->select('ccmember.*', 'u.name as user_name', 'u.id as user_id')
            ->join('users as u', 'u.id', '=', 'ccmember.user_id')
            ->where('ccmember.course_class_id', $class_id)
            ->get();

        // iterate through each module in the list
        foreach ($module_list as $key => $item) {
            // 1. find parent cm id
            // 2. find ccm id where cm id = parent cm id

            // find parent course module
            $parent_module = DB::table('course_module as cm')
                ->where('cm.id', $item->parent_id)
                ->first();

            // add parent course class module data using parent cm id and class id to each module
            $item->parent = DB::table('course_class_module as ccm')
                ->where('course_module_id', $parent_module->id)
                ->where('course_class_id', $class_id)
                ->first();

            // add member list to each module
            // ** use map to create a clone of the member list to avoid affecting the original $class_member_list **
            $item->member_list = $class_member_list->map(function ($member) {
                return clone $member;
            });

            // check assignment and quiz submission of each member on each module
            foreach ($item->member_list as $member_key => $member) {
                $member->submission = DB::table('course_class_member_grading')
                    ->where('user_id', $member->user_id)
                    ->where('course_class_module_id', $item->id)
                    ->first();
            }
        }
        return $module_list;
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

    public static function getAllParentCourseModuleByCourseId($courseId)
    {

        $allModule = DB::table('course_module as cm')
            ->select('*')
            ->where('cm.course_id', '=', $courseId)
            ->where('type', '!=', 'company_profile')
            ->where('status', 1)
            ->where('level', 1)
            ->get();

        // dd($allModule);
        return $allModule;
    }

    public static function getClassDetailByClassModuleId($courseClassModuleId)
    {
        $classDetail = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name', 'mct.name as course_type_name')
            ->join('course_class_module as ccmodule', 'ccmodule.course_class_id', '=', 'cc.id')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->join('m_course_type as mct', 'mct.id', '=', 'c.m_course_type_id')
            ->where('ccmodule.id', $courseClassModuleId)
            ->first();

        return $classDetail;
    }

    public static function getClassDetailByClassId($courseClassId)
    {
        $classDetail = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name', 'mct.name as course_type_name', 'c.m_course_type_id as course_type_id', 'mct.slug as course_type_slug')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->join('m_course_type as mct', 'mct.id', '=', 'c.m_course_type_id')
            ->where('cc.id', $courseClassId)
            ->first();

        // dd($classDetail);

        $classDetail->parent_modules = DB::table('course_class_module as ccmodule')
            ->select('ccmodule.*', 'cm.name as module_name', 'cm.type as module_type', 'cm.id as module_id')
            ->join('course_module as cm', 'cm.id', '=', 'ccmodule.course_module_id')
            ->where('ccmodule.status', 1)
            ->where('ccmodule.level', 1)
            ->where('ccmodule.course_class_id', $courseClassId)
            ->where('cm.type', '!=', 'company_profile')
            ->orderBy('ccmodule.priority', 'asc')
            ->get();

        foreach ($classDetail->parent_modules as $parent) {
            $submods = DB::table('course_class_module as ccmodule')
                ->select('ccmodule.*', 'cm.name as module_name', 'cm.type as module_type', 'cm.material as material', 'cm.duration as duration', 'cm.course_module_parent_id as parent_id')
                ->join('course_module as cm', 'cm.id', '=', 'ccmodule.course_module_id')
                // ->where('ccmodule.status', 1)
                ->where('ccmodule.course_class_id', $courseClassId)
                ->where('cm.course_module_parent_id', $parent->module_id)
                // ->where('cm.type', '!=', 'company_profile')
                // ->where('ccmodule.level', 2)
                ->orderBy('ccmodule.priority', 'asc')
                ->get();

            $parent->submod = $submods;
        }

        return $classDetail;
    }

    public static function getClassKompByClassId($userId, $courseClassId)
    {
        $modulesParent = DB::table('course_class_module as ccm')
            ->join('course_module as cm', 'cm.id', '=', 'ccm.course_module_id')
            ->leftJoin('course_class_member_grading as ccg', 'ccg.course_class_module_id', '=', 'ccm.id')
            ->join('course_class as cc', 'cc.id', '=', 'ccm.course_class_id')
            ->join('course_class_member as ccmh', 'ccmh.course_class_id', '=', 'cc.id')
            ->where('ccmh.user_id', $userId)
            ->where('ccm.course_class_id', $courseClassId)
            ->where('ccm.level', '=', 1)
            // ->whereNotNull('cm.description')
            ->select('ccm.*', 'cm.name as course_module_name', 'cm.day as course_module_day', 'cm.duration as duration', 'cm.content as content', 'cm.description as description', 'ccg.grade as grade', 'ccg.created_at as created_at', 'ccg.updated_at as updated_at', 'cc.batch as batch', 'ccm.status as status', 'ccm.created_at as created_at', 'ccm.updated_at as updated_at', 'ccmh.user_id as user_id')
            ->get();

        foreach ($modulesParent as $parent) {
            $modulesChild = DB::table('course_class_module as ccm')
                ->join('course_module as cm', 'cm.id', '=', 'ccm.course_module_id')
                ->leftJoin('course_class_member_grading as ccg', 'ccg.course_class_module_id', '=', 'ccm.id')
                ->join('course_class as cc', 'cc.id', '=', 'ccm.course_class_id')
                ->join('course_class_member as ccmh', 'ccmh.course_class_id', '=', 'cc.id')
                ->where('ccmh.user_id', $userId)
                ->where('ccg.user_id', $userId)
                ->where('ccm.course_class_id', $courseClassId)
                ->where('ccm.level', '=', 2)
                ->where('cm.course_module_parent_id', '=', $parent->course_module_id)
                ->where('cm.type', '=', 'assignment')
                ->where('cm.grade_status', '=', 1)
                ->select('ccm.*', 'cm.course_module_parent_id as module_parent_id', 'ccg.grade as grade', 'ccg.created_at as created_at', 'ccg.updated_at as updated_at', 'cc.batch as batch', 'ccm.status as status', 'ccm.created_at as created_at', 'ccm.updated_at as updated_at', 'ccmh.user_id as user_id')
                ->get();

            $parent->modulesChild = $modulesChild;
        }

        return $modulesParent;
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
}
