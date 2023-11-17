<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModule extends Model
{
    use HasFactory;

    protected $table = 'course_module';

    protected $fillable = [
        'name',
        'priority',
        'level',
        'course_id',
        'course_module_parent_id',
        'content',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public static function getCourseModuleParent($request){
        $idCourse = $request->id;   

        if ($idCourse !== null) {
            $courseModuleParent = DB::select('
                SELECT 
                    id, name, course_id, content, description, status, created_at, created_id, updated_at, updated_id 
                FROM 
                    course_module 
                WHERE 
                    course_module_parent_id IS NULL 
                    AND course_id = :idCourse
                ORDER BY 
                    id ASC, priority ASC;
            ', ['idCourse' => $idCourse]);
        }else{
            $courseModuleParent = DB::select('SELECT id, name, course_id, content, description, status, created_at , created_id, updated_at , updated_id 
            FROM course_module 
            WHERE course_module_parent_id IS NULL 
            ORDER BY id ASC, priority ASC;');
        }

        return $courseModuleParent;
    }

    public static function getCurrentCourse($request){  
        $currentCourse = collect(DB::select('SELECT course.id as course_id, course.name as course_name
            FROM course_module
            JOIN course
            WHERE course_module.course_id = course.id
            AND course_module.id = ?;
        ', [$request->id]));

        return $currentCourse;
    }

    public static function CourseModuleChild($request){  
        $courseModuleChild = DB::select('SELECT id, name, content ,  description, priority, level, status , created_at , created_id, updated_at , updated_id
            FROM course_module 
            WHERE course_module_parent_id = ? ORDER BY priority ASC', [$request->id]);

        return $courseModuleChild;
    }
}
