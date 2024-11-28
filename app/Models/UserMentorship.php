<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserMentorship extends Model
{
    use HasFactory;

    protected $table = 'user_mentorships';

    protected $fillable = [
        'member_id',
        'mentor_id',
        'course_class_id',
        'm_jobdesc_id',
        'description',
        'status',
        'created_id',
        'updated_id'
    ];

    public static function getActiveClass($user_id)
    {
        return DB::table('user_mentorships')
            ->leftJoin('course_class', 'user_mentorships.course_class_id', '=', 'course_class.id')
            ->leftJoin('course', 'course_class.course_id', '=', 'course.id')
            ->where('user_mentorships.mentor_id', $user_id)
            ->where('course_class.status', 1)
            ->where('course_class.status_ongoing', 1)
            ->selectRaw('DISTINCT course_class.*, course.name as course_name')
            ->get();
    }
}
