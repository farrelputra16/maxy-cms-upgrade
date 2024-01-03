<?php

namespace Modules\ClassContentManagement\Entities;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'course_id',
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

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public static function getCourseClass(){
        // $class_list = DB::select('SELECT course.name AS course_name,
        //     course_class.id AS id,
        //     course_class.batch AS batch,
        //     course_class.quota AS quota,
        //     course_class.start_date AS start_date,
        //     course_class.end_date AS end_date,
        //     course_class.description AS description,
        //     course_class.status AS status,
        //     course_class.created_at AS created_at,
        //     course_class.updated_at AS updated_at
        //     FROM course_class
        //     JOIN course
        //     WHERE course_class.course_id = course.id;
        // ');
        $class_list = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->get();
        return $class_list;
    }

    public static function getDuplicateCourseClass($request){
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

        }else{
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

    public static function getCurrentDataCourseClass($course_class_id){
        $currentData = collect(DB::select('SELECT course.name AS course_name,
            course_class.course_id AS course_id, course_class.id as course_class_id, course_class.batch as batch
            FROM course_class
            INNER JOIN course
            ON course_class.course_id = course.id
            WHERE course_class.id = ?;', [$course_class_id]))->first();

        return $currentData;
    }
    public static function getCourseDetailByClassId($course_class_id){
        $currentDataCourse = DB::table('course_class as cc')
        ->select('c.id', 'c.name', 'cc.batch')
        ->join('course as c', 'c.id', '=', 'cc.course_id')
        ->where('cc.id', $course_class_id)
        ->first();

        return $currentDataCourse;
    }

    public static function getEditCourseClassMemberCurrentData($request){
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


    public static function getEditCourseClassMemberCOURSEandCLASSES($currentData){

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
    public static function getAllCourseModuleByCourseId($course_id){
        $allModule = DB::table('course_module as cm')
            ->select('*')
            ->where('cm.course_id', $course_id)
            ->where('type','!=','company_profile')
            ->where('status', 1)
            ->where('day', '!=', null)
            ->get();
            // dd($allModule);

        return $allModule;
    }

    // new
    public static function getClassDetailByClassModuleId($course_class_module_id){
        $class_detail = DB::table('course_class as cc')
            ->select('cc.*')
            ->join('course_class_module as ccmodule', 'ccmodule.course_class_id', '=', 'cc.id')
            ->where('ccmodule.id', $course_class_module_id)
            ->first();
        return $class_detail;
    }
    // new
    public static function getClassDetailByClassId($course_class_id){
        $class_detail = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->where('cc.id', $course_class_id)
            ->first();
        return $class_detail;
    }
}
