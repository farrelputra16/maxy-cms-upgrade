<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    protected $table = 'course_class';
    public $timestamps = false;
    protected $guarded = [];

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
        return $query->addSelect(['total_duration' => CourseClassModule::selectRaw('CAST(SUM(course_module.duration) AS SIGNED)')
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
                if(auth()->check()) {
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
}
