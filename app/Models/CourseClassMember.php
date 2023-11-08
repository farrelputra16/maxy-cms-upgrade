<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClassMember extends Model
{
    use HasFactory;

    protected $table = 'course_class_member';

    protected $fillable = [
        'user_id',
        'course_class_id',
        'description',
        'status',
        'created_id',
        'updated_id'
    ];
}
