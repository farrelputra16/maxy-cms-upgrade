<?php

namespace Modules\ClassContentManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Support\Facades\Auth;
use DB;

class CourseClassModule extends Model
{
    use HasFactory;

    protected $table ='course_class_module';
    protected $fillable = [
        'start_date',
        'end_date',
        'percentage',
        'priority',
        'level',
        'course_module_id',
        'course_class_id',
        'content',
        'description',
        'status',
        'created_at',
        'created_id',
        'updated_at',
        'updated_id'
    ];
    
    protected static function newFactory()
    {
        return \Modules\ClassContentManagement\Database\factories\CourseClassModuleFactory::new();
    }

    public function CourseClassMemberGrading()
    {
        return $this->hasMany(\Modules\TrackandGrade\Entities\CourseClassMemberGrading::class, 'course_class_module_id');
    }

    public function CourseClass()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }

    public function CourseModule()
    {
        return $this->belongsTo(CourseModule::class, 'course_module_id');
    }


    public static function getClassModuleParentByClassId($course_class_id){
        // if ($course_class_id !== null) {
            $ccmod = DB::table('course_class_module as ccmod')
                ->select(
                    'ccmod.*',
                    'cm.name AS course_module_name',
                    'cc.batch AS course_class_batch',
                    'cm.course_module_parent_id as parent_id',
                    'c.name AS course_name'
                )  
                ->join('course_module as cm', 'cm.id', '=', 'ccmod.course_module_id')
                ->join('course_class as cc', 'cc.id', '=', 'ccmod.course_class_id')
                ->join('course as c', 'c.id', '=', 'cm.course_id')
                ->where('ccmod.course_class_id', $course_class_id)
                ->where('ccmod.level', 1)
                ->get();

            // foreach($ccmod as $module){
            //     if($module->parent_id){
            //         $ccmod_parent_name = DB::table('course_module as cm')
            //             ->select('cm.name')
            //             ->where('cm.id', $module->parent_id)
            //             ->first();
            //         $module->parent_name = $ccmod_parent_name->name;
            //     }
            // }
            
        return $ccmod;
    }
    public static function getClassModuleChildByClassId($course_class_id){
        // if ($course_class_id !== null) {
            $ccmod = DB::table('course_class_module as ccmod')
                ->select(
                    'ccmod.*',
                    'cm.name AS course_module_name',
                    'cc.batch AS course_class_batch',
                    'cm.course_module_parent_id as parent_id',
                    'c.name AS course_name',
                    'cm.content AS course_module_content',
                    'cm.material AS course_module_material',
                )  
                ->join('course_module as cm', 'cm.id', '=', 'ccmod.course_module_id')
                ->join('course_class as cc', 'cc.id', '=', 'ccmod.course_class_id')
                ->join('course as c', 'c.id', '=', 'cm.course_id')
                ->where('ccmod.course_class_id', $course_class_id)
                ->where('ccmod.level', 2)
                ->get();
            
        return $ccmod;
    }

    public static function getAddCourseClassModule($idCourse){
        if ($idCourse !== null) {
            $allClass = DB::select('
            SELECT 
                course_class.id AS course_class_id,
                course_class.batch AS batch,
                course.name AS course_name
            FROM 
                course_class
            JOIN 
                course ON course_class.course_id = course.id
            WHERE 
                course_class.id = :idCourse
        ', ['idCourse' => $idCourse]);
        }else{
            $allClass = DB::select('SELECT course_class.id AS course_class_id,
            course_class.batch AS batch,
            course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');
        }
        return $allClass;
    }


    public static function getEditCourseClassModule($request){
        $idCourseClassModule = $request->id;
        $currentData = collect(DB::select('SELECT 
            course_class_module.id, 
            course_class_module.course_module_id, 
            course_class_module.course_class_id, 
            course_module.name AS module_name, 
            course_class.batch AS class_batch,
            course.name AS course_name
            FROM course_class
            INNER JOIN	course_class_module 
            ON course_class_module.course_class_id = course_class.id
            INNER JOIN course_module 
            ON course_class_module.course_module_id = course_module.id
            INNER JOIN course 
            ON course_class.course_id = course.id
            WHERE course_class_module.id = ?;', [$idCourseClassModule]))->first();
            
        return $currentData;
    }

    // new
    public static function getAllModuleLMSByCourseClassId($course_class_id){
        if($course_class_id){
            $allModule = DB::table('course_class_module as ccmod')
            ->select('*')
            ->join('course_module as cm', 'cm.id', '=', 'ccmod.course_module_id')
            ->where('ccmod.id', $course_class_id)
            ->where('type','!=','company_profile')
            ->get();
        } else {
            $allModule = DB::table('course_class_module')
            ->select('*')
            ->join('course_module cm', 'cm.id', '=', 'ccmod.course_module_id')
            ->where('type','!=','company_profile')
            ->get();
        }
        
        return $allModule;
    }

    public static function getClassModuleDetail($course_class_module_id){
        $module_detail = DB::table('course_class_module as ccmodule')
            ->select('ccmodule.*', 'cm.name as course_module_name', 'cm.type as course_module_type')
            ->join('course_module as cm', 'cm.id', '=', 'ccmodule.course_module_id')
            ->where('ccmodule.id', $course_class_module_id)
            ->first();
        return $module_detail;
    }
    public static function getClassModuleChildByClassModuleParentId($course_class_id){
        // if ($course_class_id !== null) {
            $ccmod = DB::table('course_class_module as ccmod')
                ->select(
                    'ccmod.*',
                    'cm.name AS course_module_name',
                    'cc.batch AS course_class_batch',
                    'cm.course_module_parent_id as parent_id',
                    'c.name AS course_name'
                )  
                ->join('course_module as cm', 'cm.id', '=', 'ccmod.course_module_id')
                ->join('course_class as cc', 'cc.id', '=', 'ccmod.course_class_id')
                ->join('course as c', 'c.id', '=', 'cm.course_id')
                ->where('ccmod.course_class_id', $course_class_id)
                ->where('ccmod.level', 1)
                ->get();

            // foreach($ccmod as $module){
            //     if($module->parent_id){
            //         $ccmod_parent_name = DB::table('course_module as cm')
            //             ->select('cm.name')
            //             ->where('cm.id', $module->parent_id)
            //             ->first();
            //         $module->parent_name = $ccmod_parent_name->name;
            //     }
            // }
            
        return $ccmod;
    }
}
