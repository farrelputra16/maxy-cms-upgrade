<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Modules\ClassContentManagement\Entities\CourseClassModule;

class CourseModule extends Model
{
    use HasFactory;

    protected $table = 'course_module';

    protected $guarded = [];

    // untuk upskilling
    protected $appends = ['videoType'];

    public $videoType = 'Video';
    public $imgCover = '';
    protected $with = ['children'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id')->where('status', 1);
    }

    public function courseClassModules()
    {
        return $this->hasMany(CourseClassModule::class, 'course_module_id');
    }

    public function allParents()
    {
        return $this->where('level', 1)->where('status', 1)->orderBy('priority', 'ASC');
    }

    public function parents()
    {
        return $this->belongsTo(CourseModule::class, 'course_module_parent_id')->where('status', 1);
    }

    public function children()
    {
        return $this->hasMany(CourseModule::class, 'course_module_parent_id')
            ->where('status', 1)
            ->where('type', '!=', 'company_profile')
            ->whereNotNull('day')
            ->orderBy('day')
            ->orderBy('priority');
    }

    public function getVideoTypeAttribute()
    {
        return $this->videoType;
    }

    public function getImgCoverAttribute()
    {
        return $this->imgCover;
    }

    public static function getCourseModuleParent($request)
    {
        $idCourse = $request->id;

        if ($idCourse !== null) {
            $courseModuleParent = CourseModule::where('course_module_parent_id', null)
                ->where('course_id', $idCourse)
                ->orderBy('id', 'ASC')
                ->orderBy('priority', 'ASC')
                ->get();
        } else {
            $courseModuleParent = CourseModule::where('course_module_parent_id', null)
                ->orderBy('id', 'ASC')
                ->orderBy('priority', 'ASC')
                ->get();
        }

        return $courseModuleParent;
    }

    public static function getCurrentCourse($request)
    {
        $currentCourse = CourseModule::join('course', 'course_module.course_id', '=', 'course.id')
            ->where('course_module.id', $request->id)
            ->select('course.id as course_id', 'course.name as course_name')
            ->get();

        return $currentCourse;
    }

    public static function courseModuleChild($request)
    {
        $courseModuleChild = CourseModule::where('course_module_parent_id', $request->id)
            ->orderBy('priority', 'ASC')
            ->get();

        return $courseModuleChild;
    }
}
