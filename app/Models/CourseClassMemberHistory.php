<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClassMemberHistory extends Model
{
    use HasFactory;

    protected $table = 'course_class_member_history';

    protected $fillable = [
        'grade',
        'graded_at'
    ];
}
