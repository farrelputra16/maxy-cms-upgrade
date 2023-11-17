<?php

namespace Modules\ClassContentManagement\Entities;

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


    public static function getCourseClass(){
        $courseClasses = DB::select('SELECT course.name AS course_name, 
            course_class.id AS id,
            course_class.batch AS batch,
            course_class.quota AS quota,
            course_class.start_date AS start_date,
            course_class.end_date AS end_date,
            course_class.description AS description,
            course_class.status AS status,
            course_class.created_at AS created_at,
            course_class.updated_at AS updated_at
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');

        return $courseClasses;
    }

    public static function getDuplicateCourseClass(){
        $allCourseClasses = DB::select('SELECT course_class.id AS course_class_id,
        course_class.batch AS course_class_batch,
        course.id AS course_id,
        course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');

        return $allCourseClasses;
    }

    public static function getCurrentDataCourseClass($request){
        $idCourseClass = $request->id;
        $currentData = collect(DB::select('SELECT course.name AS course_name, 
            course_class.course_id AS course_id
            FROM course_class 
            INNER JOIN course 
            ON course_class.course_id = course.id 
            WHERE course_class.id = ?;', [$idCourseClass]))->first();

        return $currentData;
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
}
