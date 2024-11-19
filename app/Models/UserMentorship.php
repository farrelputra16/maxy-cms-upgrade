<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
