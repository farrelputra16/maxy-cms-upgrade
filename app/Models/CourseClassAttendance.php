<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Modules\ClassContentManagement\Entities\CourseClassModule;

class CourseClassAttendance extends Model
{
    use HasFactory;
    
    protected $table = 'course_class_attendance';

    public function MemberAttendance()
    {
        return $this->hasMany(MemberAttendance::class, 'course_class_attendance_id');
    }

    public function CourseClassModule()
    {
        return $this->belongsTo(CourseClassModule::class, 'course_class_module_id');
    }
}
