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
        $course_class_id = $request->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);

        $courseClassModules = CourseClassModule::getCourseClassModule($course_class_id);
        // dd($courseClassModules);

        return view('classcontentmanagement::course_class_module.index', [
            'courseclassmodules' => $courseClassModules,
            'course_class_id' => $course_class_id,
            'course_detail' => $course_detail,
        ]);
    }

    function getAddCourseClassModule(Request $request){
        $course_class_id = $request->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllCourseModuleByCourseId($course_detail->id);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        // dd($classDetail);
        
        return view('classcontentmanagement::course_class_module.add', [
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    public function postAddCourseClassModule(Request $request){
        // dd($request->all());
        // $validated = $request->validate([
        //     'start' => 'required',
        //     'end' => 'required',
        //     'priority' => 'required|integer',
        //     'level' => 'required|integer'
        // ]);

        // if ($validated){
        $create = CourseClassModule::create([
            'start_date' => $request->start,
            'end_date' => $request->end,
            'priority' => $request->priority,
            'level' => $request->level,
            'course_module_id' => $request->coursemoduleid,
            'course_class_id' => $request->course_class_id,
            'content' => $request->content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if ($create){
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Sukses Menambahkan Modul');
            // return app(HelperController::class)->Positive('getCourseClassModule', $request->course_class_id);
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Gagal Menambahkan Modul, silahkan coba lagi');
        }
        // }
    }

    function getEditCourseClassModule(Request $request){
        // dd($request->all());
        $course_class_module_id = $request->id;
        $class_module_detail = CourseClassModule::getClassModuleDetail($course_class_module_id);
        // dd($class_module_detail);
        $course_class_detail = CourseClass::getClassDetailByClassModuleId($course_class_module_id);
        
        $course_class_id = $course_class_detail->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllCourseModuleByCourseId($course_detail->id);
        // dd($allModules);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        // dd($course_class_id);
        return view('classcontentmanagement::course_class_module.edit', [
            'course_class_module' => $class_module_detail,
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    function postEditCourseClassModule(Request $request){
        // dd($request->all());
        $course_class_module_id = $request->id;
        // dd($course_class_module_id);
        
        $updateData = CourseClassModule::where('id', $course_class_module_id)
            ->update([
                'start_date' => $request->start,
                'end_date' => $request->end,
                'priority' => $request->priority,
                'level' => $request->level,
                'course_module_id' => $request->coursemodulesid,
                'course_class_id' => $request->course_class_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);
            // dd($updateData);

        if ($updateData){
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Update Module Success');
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Failed to Update Module, please try again    ');
        }

        // if ($updateData){
        //     return app(HelperController::class)->Positive('getCourseClassModule');
        // } else {
        //     return app(HelperController::class)->Warning('getCourseClassModule');
        // }
        
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
