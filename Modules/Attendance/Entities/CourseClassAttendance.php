<?php

namespace Modules\Attendance\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\Attendance\Entities\MemberAttendance;

class CourseClassAttendance extends Model
{
    use HasFactory;

    protected $table = 'course_class_attendance';

    protected $fillable = [
        'name',
        'course_class_module_id',
        'created_id',
        'updated_id',
    ];

    protected static function newFactory()
    {
        return \Modules\Attendance\Database\factories\CourseClassAttendanceFactory::new();
    }

    public function MemberAttendance()
    {
        return $this->hasMany(MemberAttendance::class, 'course_class_attendance_id');
    }

    public function CourseClassModule()
    {
        return $this->belongsTo(CourseClassModule::class, 'course_class_module_id');
    }

    public static function getAttendanceByClassId($class_id)
    {
        return DB::table('course_class_module as ccmod')
            ->select('cca.*', 'ccmod.priority as day')
            ->join('course_class as cc', 'cc.id', '=', 'ccmod.course_class_id')
            ->join('course_class_attendance as cca', 'cca.course_class_module_id', '=', 'ccmod.id')
            ->where('ccmod.level', 1)
            ->where('cc.id', $class_id)
            ->get();
    }
}
