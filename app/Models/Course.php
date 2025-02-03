<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $table = 'course';

    protected $guarded = [];

    protected $appends = ['issuer', 'total_learners', 'total_duration'];

    public $issuer = 'maxy-academy';

    // ini buat upskilling
    public $total_learners = 0;
    public $total_duration = 0;

    protected $with = ['type'];

    public function CourseCategory()
    {
        return $this->hasMany(CourseCategory::class, 'course_id');
    }

    public function modules()
    {
        return $this->hasMany(CourseModule::class, 'course_id')->where('status', 1);
    }

    public function type()
    {
        return $this->belongsTo(MCourseType::class, 'm_course_type_id')->where('status', 1);
    }

    public function courseClasses()
    {
        return $this->hasMany(CourseClass::class, 'course_id')->where('status', 1);
    }

    public function coursePackage()
    {
        return $this->belongsTo(CoursePackage::class, 'course_package_id')->where('status', 1);
    }

    public function difficulty()
    {
        return $this->belongsTo(MDifficultyType::class, 'm_difficulty_type_id')->where('status', 1);
    }

    public function getIssuerAttribute()
    {
        return $this->issuer;
    }

    public function getTotalLearnersAttribute()
    {
        return $this->total_learners;
    }

    public function getTotalDurationAttribute()
    {
        return $this->total_duration;
    }

    public static function CurrentDataCourse($idCourse)
    {
        $currentDataCourse = collect(DB::select('SELECT course.id AS course_id,
            course.credits AS credits,
            course.duration AS duration,
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

    public static function CurrentCoursePackages($idCourse)
    {
        $currentCoursePackages = collect(DB::select('SELECT course_package.id AS course_package_id, course_package.name AS course_package_name,
            course_package.price AS course_package_price
            FROM course
            JOIN course_package
            WHERE course_package.id = course.course_package_id AND course.id = ?
        ', [$idCourse]))->first();

        return $currentCoursePackages;
    }

    public static function getCourseDetailByCourseId($course_id)
    {
        $course_detail = DB::table('course as c')
            ->select('c.*', 'mct.name as course_type_name', 'mct.slug as course_type_slug', 'mct.id as course_type_id')
            ->join('m_course_type as mct', 'mct.id', '=', 'c.m_course_type_id')
            ->where('c.id', $course_id)
            ->first();

        return $course_detail;
    }
}
