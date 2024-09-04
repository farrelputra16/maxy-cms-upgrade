<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use illuminate\Support\Facades\Auth;

class Transkrip extends Model
{
    use HasFactory;

    protected $table = 'transkrip';

    protected $fillable = [
        'user_id',
        'course_class_id',
        'm_score_id',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function CourseClass()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }

    public function MScore()
    {
        return $this->belongsTo(MScore::class, 'm_score_id');
    }

    public function Schedule()
    {
        return $this->hasManyThrough(Schedule::class, CourseClass::class, 'id', 'course_class_id', 'course_class_id', 'id');
    }
}
