<?php

namespace Modules\ClassContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Auth;
use DB;

class CourseClassModule extends Model
{
    use HasFactory;

    protected $table ='course_class_module';
    protected $fillable = [
        'start_date',
        'end_date',
        'priority',
        'level',
        'course_module_id',
        'course_class_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\ClassContentManagement\Database\factories\CourseClassModuleFactory::new();
    }


    public static function getCourseClassModule($request){
        $idCourse = $request->id;
        if ($idCourse !== null) {
            $courseClassModules = DB::select('
            SELECT 
                course_class_module.id AS id,
                course_class_module.start_date AS start_date,
                course_class_module.end_date AS end_date,
                course_class_module.priority AS priority,
                course_class_module.level AS level,
                course_module.name AS course_module_name,
                course_class.batch AS course_class_batch,
                course_class_module.description AS description,
                course_class_module.status AS status,
                course_class_module.created_at AS created_at,
                course_class_module.updated_at AS updated_at,
                course.name AS course_name
            FROM 
                course_class_module
            JOIN 
                course_class ON course_class_module.course_class_id = course_class.id
            JOIN 
                course_module ON course_class_module.course_module_id = course_module.id
            JOIN 
                course ON course_class.course_id = course.id
            WHERE 
                course_class_module.course_class_id = :idCourse
                AND course_class_module.course_class_id = course_class.id 
                AND course_class_module.course_module_id = course_module.id
                AND course_class.course_id = course.id
        ', ['idCourse' => $idCourse]);
        }else{
            $courseClassModules = DB::select('SELECT 
            course_class_module.id AS id,
            course_class_module.start_date AS start_date,
            course_class_module.end_date AS end_date,
            course_class_module.priority AS priority,
            course_class_module.level AS level,
            course_module.name AS course_module_name,
            course_class.batch AS course_class_batch,
            course_class_module.description AS description,
            course_class_module.status AS status,
            course_class_module.created_at AS created_at,
            course_class_module.updated_at AS updated_at,
            course.name AS course_name
            FROM course_class_module
            JOIN course_class
            JOIN course_module
            JOIN course
            WHERE course_class_module.course_class_id = course_class.id 
            AND course_class_module.course_module_id = course_module.id
            AND course_class.course_id = course.id;
        ');
        }

        return $courseClassModules;
    }


    public static function getAddCourseClassModule($request){
        $idCourse = $request->id;
        if ($idCourse !== null) {
            $allClass = DB::select('
            SELECT 
                course_class.id AS course_class_id,
                course_class.batch AS batch,
                course.name AS course_name
            FROM 
                course_class
            JOIN 
                course ON course_class.course_id = course.id
            WHERE 
                course_class.id = :idCourse
        ', ['idCourse' => $idCourse]);
        }else{
            $allClass = DB::select('SELECT course_class.id AS course_class_id,
            course_class.batch AS batch,
            course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');
        }
        return $allClass;
    }


    public static function getEditCourseClassModule($request){
        $idCourseClassModule = $request->id;
        $currentData = collect(DB::select('SELECT 
            course_class_module.id, 
            course_class_module.course_module_id, 
            course_class_module.course_class_id, 
            course_module.name AS module_name, 
            course_class.batch AS class_batch,
            course.name AS course_name
            FROM course_class
            INNER JOIN	course_class_module 
            ON course_class_module.course_class_id = course_class.id
            INNER JOIN course_module 
            ON course_class_module.course_module_id = course_module.id
            INNER JOIN course 
            ON course_class.course_id = course.id
            WHERE course_class_module.id = ?;', [$idCourseClassModule]))->first();
            
        return $currentData;
    }
}
