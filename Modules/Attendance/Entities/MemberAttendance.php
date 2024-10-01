<?php

namespace Modules\Attendance\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Enrollment\Entities\CourseClassMember;
use Modules\Attendance\Entities\CourseClassAttendance;


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
        return \Modules\Attendance\Database\factories\MemberAttendanceFactory::new();
    }

    public function CourseClassAttendance()
    {
        return $this->belongsTo(CourseClassAttendance::class, 'course_class_attendance_id');
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

    public static function generateMemberAttendance($class_id)
    {
        $memberList = CourseClassMember::getCCMByCourseClassId($class_id);
        $classAttendanceList = CourseClassAttendance::getAttendanceByClassId($class_id);

        foreach ($classAttendanceList as $attendance) {
            foreach ($memberList as $key => $value) {
                $exist = MemberAttendance::where('course_class_attendance_id', $attendance->id)
                    ->where('user_id', $value->id)
                    ->first();

                if (!$exist) {
                    $memberAttendance = new MemberAttendance();
                    $memberAttendance->course_class_attendance_id = $attendance->id;
                    $memberAttendance->user_id = $value->id;
                    $memberAttendance->status = 0;
                    $memberAttendance->created_id = Auth::user()->id;
                    $memberAttendance->updated_id = Auth::user()->id;

                    $memberAttendance->save();
                }
            }
        }
    }
}
