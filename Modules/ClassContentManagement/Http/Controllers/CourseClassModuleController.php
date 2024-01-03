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

    function getCourseClassModule(Request $request)
    {
        $course_class_id = $request->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);

        $courseClassModules = CourseClassModule::getCourseClassModule($course_class_id);

        return view('classcontentmanagement::course_class_module.index', [
            'courseclassmodules' => $courseClassModules,
            'course_class_id' => $course_class_id,
            'course_detail' => $course_detail,
        ]);
    }

    function getAddCourseClassModule(Request $request)
    {
        $course_class_id = $request->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllCourseModuleByCourseId($course_detail->id);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        return view('classcontentmanagement::course_class_module.add', [
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    public function postAddCourseClassModule(Request $request)
    {
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

        if ($create) {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Sukses Menambahkan Modul');
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Gagal Menambahkan Modul, silahkan coba lagi');
        }
    }

    function getEditCourseClassModule(Request $request)
    {
        $course_class_module_id = $request->id;
        $class_module_detail = CourseClassModule::getClassModuleDetail($course_class_module_id);
        $course_class_detail = CourseClass::getClassDetailByClassModuleId($course_class_module_id);

        $course_class_id = $course_class_detail->id;
        $course_detail = CourseClass::getCourseDetailByClassId($course_class_id);
        $allModules = CourseClass::getAllCourseModuleByCourseId($course_detail->id);
        $classDetail = CourseClass::getCurrentDataCourseClass($course_class_id);

        return view('classcontentmanagement::course_class_module.edit', [
            'course_class_module' => $class_module_detail,
            'allModules' => $allModules,
            'classDetail' => $classDetail,
            'course_detail' => $course_detail,
            'course_class_id' => $course_class_id,
        ]);
    }

    function postEditCourseClassModule(Request $request)
    {
        $course_class_module_id = $request->id;

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

        if ($updateData) {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('success', 'Update Module Success');
        } else {
            return redirect()->route('getCourseClassModule', ['id' => $request->course_class_id])->with('failed', 'Failed to Update Module, please try again    ');
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
}
