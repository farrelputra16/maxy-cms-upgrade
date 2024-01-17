<?php

namespace Modules\ClassContentManagement\Entities;

use App\Models\User;
use App\Models\CourseModule;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;
use Modules\TrackandGrade\Entities\CourseClassMemberLog;

class CourseClassModule extends Model
{
    use HasFactory;

    protected $table = 'course_class_module';
    protected $guarded = [];

    protected $with = ['courseModule', 'courseClass'];

    public function courseModule()
    {
        return $this->belongsTo(CourseModule::class, 'course_module_id');
    }

    public function courseClass()
    {
        return $this->belongsTo(CourseClass::class, 'course_class_id');
    }

    public function gradings()
    {
        return $this->hasMany(CourseClassMemberGrading::class, 'course_class_module_id');
    }

    public function membersLog()
    {
        return $this->hasMany(CourseClassMemberLog::class, 'course_class_module_id');
    }

    public function userCreated()
    {
        return $this->belongsTo(User::class, 'created_id');
    }

    public function userUpdated()
    {
        return $this->belongsTo(User::class, 'updated_id');
    }

    public static function getCourseClassModule($course_class_id)
    {
        // if ($course_class_id !== null) {
        $ccmod = DB::table('course_class_module as ccmod')
            ->select(
                'ccmod.id AS id',
                'ccmod.start_date AS start_date',
                'ccmod.end_date AS end_date',
                'ccmod.priority AS priority',
                'ccmod.level AS level',
                'cm.name AS course_module_name',
                'cm.day as course_module_day',
                'cc.batch AS course_class_batch',
                'ccmod.description AS description',
                'cm.course_module_parent_id as parent_id',
                'ccmod.status AS status',
                'ccmod.created_at AS created_at',
                'ccmod.updated_at AS updated_at',
                'c.name AS course_name'
            )
            ->join('course_module as cm', 'cm.id', '=', 'ccmod.course_module_id')
            ->join('course_class as cc', 'cc.id', '=', 'ccmod.course_class_id')
            ->join('course as c', 'c.id', '=', 'cm.course_id')
            ->where('ccmod.course_class_id', $course_class_id)
            ->get();

        foreach ($ccmod as $module) {
            if ($module->parent_id) {
                $ccmod_parent_name = DB::table('course_module as cm')
                    ->select('cm.name')
                    ->where('cm.id', $module->parent_id)
                    ->first();
                $module->parent_name = $ccmod_parent_name->name;
            }
        }

        return $ccmod;
    }

    // public static function getCourseClassModule($course_class_id){

    //     if($course_class_id !== null){
    //         $course_class_module = DB::select('SELECT
    //             id, start_date, end_date, priority, level, course_module_id, course_class_id, description, status, created_at, created_id, updated_at, updated_id
    //         FROM
    //             course_class_module
    //         WHERE
    //             course_class_id = :idCourseClass
    //         ORDER BY
    //             id ASC, priority ASC;
    //         ', ['idCourseClass' => $course_class_id]);
    //     }else{
    //         $course_class_module = DB::select('SELECT
    //             id, start_date, end_date, priority, level, course_module_id, course_class_id, description, status, created_at, created_id, updated_at, updated_id
    //         FROM
    //             course_class_module
    //         WHERE
    //             course_class_id IS NULL
    //         ORDER BY
    //             id ASC, priority ASC;');
    //     }
    //     return $course_class_module;
    // }


    public static function getAddCourseClassModule($idCourse)
    {
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
        } else {
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


    public static function getEditCourseClassModule($request)
    {
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
    public static function getAllModuleLMSByCourseClassId($course_class_id)
    {
        if ($course_class_id) {
            $allModule = DB::table('course_class_module as ccmod')
                ->select('*')
                ->join('course_module as cm', 'cm.id', '=', 'ccmod.course_module_id')
                ->where('ccmod.id', $course_class_id)
                ->where('type', '!=', 'company_profile')
                ->get();
        } else {
            $allModule = DB::table('course_class_module')
                ->select('*')
                ->join('course_module cm', 'cm.id', '=', 'ccmod.course_module_id')
                ->where('type', '!=', 'company_profile')
                ->get();
        }

        return $allModule;
    }

    public static function getClassModuleDetail($course_class_module_id)
    {
        $module_detail = DB::table('course_class_module as ccmodule')
            ->select('ccmodule.*', 'cm.name as course_module_name', 'cm.type as course_module_type')
            ->join('course_module as cm', 'cm.id', '=', 'ccmodule.course_module_id')
            ->where('ccmodule.id', $course_class_module_id)
            ->first();
        return $module_detail;
    }

    public static function getParentModules(Request $request)
    {
        return CourseClassModule::where('course_class_id', $request->id)
            ->whereHas('courseModule', function ($query) {
                $query->whereNull('course_module_parent_id');
            })
            ->orderBy('priority')->get();
    }

    public static function getChildModules($id)
    {
        return CourseClassModule::whereHas('courseModule', function ($query) use ($id) {
            $query->where('course_module_parent_id', $id);
        })
            ->orderBy('priority')->get();
    }

    public static function getAddCourseClassChildModule($idCourseClassChild)
    {
        if ($idCourseClassChild !== null) {
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
            ', ['idCourseClassChild' => $idCourseClassChild]);
        } else {
            $allClass = DB::select('
                SELECT
                    course_class.id AS course_class_id,
                    course_class.batch AS batch,
                    course.name AS course_name
                FROM
                    course_class
                JOIN
                    course ON course_class.course_id = course.id
            ');
        }
        return $allClass;
    }

    public static function getEditCourseClassChildModule($idCourseClassChild)
    {
        $editClass = DB::select('
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
    ', ['idCourseClassChild' => $idCourseClassChild]);

        return $editClass;
    }
}
