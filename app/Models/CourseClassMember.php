<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseClassMember extends Model
{
    // Define the table name (optional if following naming convention)
    protected $table = 'course_class_member';

    // Define the primary key (optional if following naming convention)
    protected $primaryKey = 'id';

    // Disable auto timestamps (optional)
    public $timestamps = false;

    // Define the fillable columns (optional)
    protected $fillable = [
        'user_id',
        'course_class_id',
        'trans_order_id',
        'description',
        'expired_date',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class);
    }

    public static function getCCMId($courseClassId)
    {
        return self::where('user_id', auth()->user()->id)
            ->where('course_class_id', $courseClassId)
            ->first()->id;
    }
    public static function getJoinedActiveClass()
    {
        return DB::table('course_class_member as ccm')
            ->select('cc.*', 'c.name as course_name')
            ->join('course_class as cc', 'cc.id', '=', 'ccm.course_class_id')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->where('ccm.user_id', auth()->user()->id)
            ->where('ccm.status', 1)
            ->where('cc.status_ongoing', 1)
            ->get();
    }
}
