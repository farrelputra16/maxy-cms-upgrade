<?php

namespace Modules\Enrollment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;

class CourseClassMember extends Model
{
    use HasFactory;

    protected $table = 'course_class_member';

    protected $fillable = [
        'user_id',
        'course_class_id',
        'description',
        'status',
        'created_id',
        'updated_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Enrollment\Database\factories\CourseClassMemberFactory::new();
    }

    public static function getCourseClassMember(){
        $courseClassMembers = collect(DB::select('SELECT 
            course_class_member.id AS id,
            course_class_member.description AS description,
            course_class_member.status AS status,
            course_class_member.created_at AS created_at,
            course_class_member.updated_at AS updated_at,
            users.id AS user_id,
            users.name AS user_name,
            course_class.batch AS course_class_batch,
            course.name AS course_name
            FROM course_class_member
            JOIN users
            JOIN course_class
            JOIN course
            WHERE course_class_member.user_id = users.id 
            AND course_class_member.course_class_id = course_class.id
            AND course_class.course_id = course.id;
        '));

        return $courseClassMembers;
    }


    public static function getEditCourseClassMember($request){
        
        $currentData = collect(DB::select('SELECT 
                course_class_member.user_id AS ccm_member_id,
                course_class_member.course_class_id AS ccm_course_class_id,
                course_class_member.description AS ccm_description,
                course_class_member.status AS ccm_status,
                users.name AS user_name,
                course_class.batch AS course_class_batch
                FROM course_class_member
                JOIN users
                JOIN course_class
                WHERE course_class_member.user_id = users.id 
                AND course_class_member.course_class_id = course_class.id
                AND course_class_member.id = ?;
            ', [$request->id]));
            
        return $currentData;
    }
}
