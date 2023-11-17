<?php

namespace Modules\TrackandGrade\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClassMemberGrading extends Model
{
    use HasFactory;

    protected $table = 'course_class_member_grading';
    protected $fillable = [
        'grade',
        'grade_at'
    ];
    
    protected static function newFactory()
    {
        return \Modules\TrackandGrade\Database\factories\CourseClassMemberGradingFactory::new();
    }
}
