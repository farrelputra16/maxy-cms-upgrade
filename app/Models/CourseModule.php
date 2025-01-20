<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CourseModule extends Model
{
    use HasFactory;

    protected $table = 'course_module';

    protected $fillable = [
        'name',
        'html',
        'js',
        'php',
        'python',
        'priority',
        'level',
        'course_id',
        'course_module_parent_id',
        'type',
        'material',
        'grade_status',
        'duration',
        'content',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];

    public function MModuleType()
    {
        return $this->belongsTo(MModuleType::class, 'type', 'id');
    }

    public static function getCourseModuleDetailByModuleId($module_id){
        $module_detail = DB::table('course_module as cm')
            ->select('cm.*', 'c.name as course_name', 'c.id as course_id')
            ->join('course as c', 'c.id', '=', 'cm.course_id')
            ->where('cm.id', $module_id)
            ->first();

        return $module_detail;
    }

    public static function getCourseModuleParentByCourseId($course_id, $type){
        if($type == 'CP'){ // jika buka list module company profile
            $parent_modules = DB::table('course_module as cm')
            ->select('cm.*')
            ->where('cm.course_module_parent_id', null)
            ->where('cm.course_id', $course_id)
            ->where('cm.type', '9')
            ->orderBy('cm.id', 'ASC')
            ->get();
        } else { // jika buka list module parent LMS
            $parent_modules = DB::table('course_module as cm')
            ->select('cm.*')
            ->where('cm.course_module_parent_id', null)
            ->where('cm.course_id', $course_id)
            ->where('cm.type', '!=', 'company_profile')
            ->orderBy('cm.id', 'ASC')
            ->get();
        }

        return $parent_modules;
    }

    public static function getCourseModuleChildByParentId($module_id){

        $courseModuleChild = DB::table('course_module')
            ->select('*')
            ->where('course_module_parent_id', $module_id)
            ->get();

        return $courseModuleChild;
    }
}
