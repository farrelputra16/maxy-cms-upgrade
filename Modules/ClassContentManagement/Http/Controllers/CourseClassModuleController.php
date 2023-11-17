<?php

namespace Modules\ClassContentManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Http\Controllers\HelperController;


use App\Models\CourseModule;
use DB;
use Illuminate\Support\Facades\Auth;


class CourseClassModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCourseClassModule(Request $request){
        $idCourse = $request->id; 

        if ($idCourse !== null) {
            $courseClassModules = DB::select('
            SELECT 
                course_class_module.id AS id,
                course_class_module.start_date AS start_date,
                course_class_module.end_date AS end_date,
                course_class_module.priority AS priority,
                course_class_module.level AS level,
                course_module.name AS course_module_name,
                course_class.batch AS course_class_batch,
                course_class_module.description AS description,
                course_class_module.status AS status,
                course_class_module.created_at AS created_at,
                course_class_module.updated_at AS updated_at,
                course.name AS course_name
            FROM 
                course_class_module
            JOIN 
                course_class ON course_class_module.course_class_id = course_class.id
            JOIN 
                course_module ON course_class_module.course_module_id = course_module.id
            JOIN 
                course ON course_class.course_id = course.id
            WHERE 
                course_class_module.course_class_id = :idCourse
                AND course_class_module.course_class_id = course_class.id 
                AND course_class_module.course_module_id = course_module.id
                AND course_class.course_id = course.id
        ', ['idCourse' => $idCourse]);
        }else{
            $courseClassModules = DB::select('SELECT 
            course_class_module.id AS id,
            course_class_module.start_date AS start_date,
            course_class_module.end_date AS end_date,
            course_class_module.priority AS priority,
            course_class_module.level AS level,
            course_module.name AS course_module_name,
            course_class.batch AS course_class_batch,
            course_class_module.description AS description,
            course_class_module.status AS status,
            course_class_module.created_at AS created_at,
            course_class_module.updated_at AS updated_at,
            course.name AS course_name
            FROM course_class_module
            JOIN course_class
            JOIN course_module
            JOIN course
            WHERE course_class_module.course_class_id = course_class.id 
            AND course_class_module.course_module_id = course_module.id
            AND course_class.course_id = course.id;
        ');
        }
        return view('classcontentmanagement::course_class_module.index', [
            'courseclassmodules' => $courseClassModules,
            'course_id' => $idCourse
        ]);
    }

    function getAddCourseClassModule(Request $request){

        $idCourse = $request->id;

        $allModules = CourseModule::all();

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

        

        return view('classcontentmanagement::course_class_module.add', [
            'allModules' => $allModules,
            'allClass' => $allClass,
        ]);
    }

    public function postAddCourseClassModule(Request $request){
        $validated = $request->validate([
            'start' => 'required',
            'end' => 'required',
            'priority' => 'required|integer',
            'level' => 'required|integer'
        ]);

        if ($validated){
            $create = CourseClassModule::create([
                'start_date' => $request->start,
                'end_date' => $request->end,
                'priority' => $request->priority,
                'level' => $request->level,
                'course_module_id' => $request->coursemoduleid,
                'course_class_id' => $request->courseclassid,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getCourseClassModule');
            }
        }
    }

    function getEditCourseClassModule(Request $request){
        $idCourseClassModule = $request->id;
        $courseclassmodules = CourseClassModule::find($idCourseClassModule);

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

        $courseModuleId = $currentData->course_module_id;


        $allModules = CourseModule::where('id', '!=', $currentData->course_module_id)->get();


        $allClasses = DB::select('SELECT 
            course_class.id AS course_class_id,
            course_class.batch AS batch,
            course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id AND course_class.id != ?;
        ', [$currentData->course_class_id]);


        return view('classcontentmanagement::course_class_module.edit', [
            'courseclassmodules' => $courseclassmodules,
            'currentData' => $currentData,
            'allModules' => $allModules,
            'allClasses' => $allClasses,
        ]);
    }

    function postEditCourseClassModule(Request $request){
        $idCourseClassModule = $request->id;
        
        $updateData = DB::table('course_class_module')
            ->where('id', $idCourseClassModule)
            ->update([
                'start_date' => $request->start,
                'end_date' => $request->end,
                'priority' => $request->priority,
                'level' => $request->level,
                'course_module_id' => $request->coursemodulesid,
                'course_class_id' => $request->courseclassid,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

        if ($updateData){
            return app(HelperController::class)->Positive('getCourseClassModule');
        } else {
            return app(HelperController::class)->Warning('getCourseClassModule');
        }
        
    }

    public function index()
    {
        return view('classcontentmanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('classcontentmanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('classcontentmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('classcontentmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
