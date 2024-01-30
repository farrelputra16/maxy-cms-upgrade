<?php

namespace Modules\TrackandGrade\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseClassMemberGrading extends Model
{
    use HasFactory;

    protected $table = 'course_class_member_grading';
    protected $guarded = [];
    protected $with = ['user', 'tutor', 'courseClassModule'];

    // relasi ke user student
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id')->where('type', 'tutor');
    }

    public function courseClassModule()
    {
        return $this->belongsTo(\Modules\ClassContentManagement\Entities\CourseClassModule::class);
    }

    protected static function newFactory()
    {
        return \Modules\TrackandGrade\Database\factories\CourseClassMemberGradingFactory::new();
    }
}
