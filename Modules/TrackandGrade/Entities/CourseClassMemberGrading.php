<?php

namespace Modules\TrackandGrade\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class CourseClassMemberGrading extends Model
{
    use HasFactory;
    protected $table = 'course_class_member_grading';

    protected $fillable = [
        'submitted_file',
        'js',
        'html',
        'python',
        'python_input',
        'php',
        'comment',
        'user_id',
        'course_class_module_id',
        'description',
        'grade',
        'max_grade',
        'graded_at',
        'tutor_id',
        'tutor_comment',
        'submitted_at',
        'created_at',
        'updated_at',
    ];

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

    public static function getSubmissionDetailById($id)
    {
        return DB::table('course_class_member_grading as ccmg')
            ->select('ccmg.*', 'c.name as course_name', 'u.name as user_name', 'cm.name as module_name', 'cc.id as class_id')
            ->join('course_class_module as ccm', 'ccm.id', '=', 'ccmg.course_class_module_id')
            ->join('course_class as cc', 'cc.id', '=', 'ccm.course_class_id')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->join('users as u', 'u.id', '=', 'ccmg.user_id')
            ->join('course_module as cm', 'cm.id', '=', 'ccm.course_module_id')
            ->where('ccmg.id', $id)
            ->first();
    }
}
