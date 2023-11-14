<?php

namespace Modules\Enrollment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    
    protected static function newFactory()
    {
        return \Modules\Enrollment\Database\factories\CourseClassMemberFactory::new();
    }
}
