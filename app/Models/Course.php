<?php

namespace App\Models;
use DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'fake_price',
        'price',
        'discounted_price',
        'short_description',
        'image',
        'preview',
        'target',
        'payment_link',
        'slug',
        'm_course_type_id',
        'course_package_id',
        'm_difficulty_type_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public static function CurrentDataCourse($idCourse){
        $currentDataCourse = collect(DB::select('SELECT course.id AS course_id, 
            course.m_course_type_id AS m_course_type_id,
            course.fake_price AS fake_price,
            course.price AS price,
            course.m_difficulty_type_id AS m_difficulty_type_id,
            m_course_type.name AS course_type_name,
            m_difficulty_type.name AS course_difficulty
            FROM course 
            INNER JOIN m_course_type ON course.m_course_type_id = m_course_type.id
            INNER JOIN m_difficulty_type ON course.m_difficulty_type_id = m_difficulty_type.id 
            WHERE course.id = ?;', [$idCourse]))->first();

        return $currentDataCourse;
    }
    
    public static function CurrentCoursePackages($idCourse){
        $currentCoursePackages = collect(DB::select('SELECT course_package.id AS course_package_id, course_package.name AS course_package_name,
            course_package.price AS course_package_price
            FROM course
            JOIN course_package
            WHERE course_package.id = course.course_package_id AND course.id = ?
        ', [$idCourse]))->first();

        return $currentCoursePackages;
    }
}
