<?php

namespace App\Models;
use DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberAttendance extends Model
{
    use HasFactory;
    
    protected $table = 'member_attendance';

    public function CourseClassAttendance()
    {
        return $this->belongsTo(CourseClassAttendance::class, 'course_class_attendance_id');
    }
}
