<?php

namespace Modules\ClassContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class MemberAttendance extends Model
{
    use HasFactory;

    protected $table = 'member_attendance';

    protected $guarded = [];

    protected $fillable = [
        'course_class_attendance_id',
        'user_id',
        'feedback',
        'description',
        'status',
        'created_id',
        'updated_id'
    ];

    protected static function newFactory()
    {
        return \Modules\ClassContentManagement\Database\factories\MemberAttendanceFactory::new();
    }

    public static function getMemberAttendanceByClassAttendanceId($class_id, $class_attendance_id)
    {
        $class_member = DB::table('course_class_member as ccm')
            ->select('ccm.*', 'u.name as user_name')
            ->join('users as u', 'u.id', '=', 'ccm.user_id')
            ->where('ccm.course_class_id', $class_id)
            ->get();

        foreach ($class_member as $key => $item) {
            $item->attendance = DB::table('member_attendance as ma')
                ->select('ma.*', 'u.name as user_name')
                ->join('users as u', 'u.id', '=', 'ma.user_id')
                ->where('ma.course_class_attendance_id', $class_attendance_id)
                ->where('u.id', $item->user_id)
                ->first();
        }
        return $class_member;
    }
    public static function getMemberAttendanceDetailByMemberAttendanceId($member_attendance_id)
    {
        return DB::table('member_attendance as ma')
            ->select('ma.*', 'u.name as user_name')
            ->join('users as u', 'u.id', '=', 'ma.user_id')
            ->where('ma.id', $member_attendance_id)
            ->first();
    }
}
