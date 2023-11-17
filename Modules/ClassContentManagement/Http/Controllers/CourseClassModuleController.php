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

        $courseClassModules = CourseClassModule::getCourseClassModule($request);

        return view('classcontentmanagement::course_class_module.index', [
            'courseclassmodules' => $courseClassModules,
            'course_id' => $idCourse
        ]);
    }

    function getAddCourseClassModule(Request $request){

        $idCourse = $request->id;

        $allModules = CourseModule::all();

        $allClass = CourseClassModule::getAddCourseClassModule($request);
        
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

        $currentData = CourseClassModule::getEditCourseClassModule($request);
        
        $courseModuleId = $currentData->course_module_id;
        $allModules = CourseModule::where('id', '!=', $currentData->course_module_id)->get();


        $allClasses = CourseClass::select(
            'course_class.id AS course_class_id',
            'course_class.batch AS batch',
            'course.name AS course_name'
        )
            ->join('course', 'course_class.course_id', '=', 'course.id')
            ->where('course_class.id', '!=', $currentData->course_class_id)
            ->get();


        return view('classcontentmanagement::course_class_module.edit', [
            'courseclassmodules' => $courseclassmodules,
            'currentData' => $currentData,
            'allModules' => $allModules,
            'allClasses' => $allClasses,
        ]);
    }

    function postEditCourseClassModule(Request $request){
        $idCourseClassModule = $request->id;
        
        $updateData = CourseClassModule::where('id', $idCourseClassModule)
            ->update([
                'start_date' => $request->start,
                'end_date' => $request->end,
                'priority' => $request->priority,
                'level' => $request->level,
                'course_module_id' => $request->coursemodulesid,
                'course_class_id' => $request->courseclassid,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
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
