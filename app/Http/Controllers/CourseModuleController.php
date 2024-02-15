<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModule;
use App\Models\MCourseType;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class CourseModuleController extends Controller
{
    // PARENT
    function getCourseModule(Request $request)
    {
        // dd($request->all());
        $course_id = $request->course_id;
        
        $course_detail = Course::getCourseDetailByCourseId($course_id);
        $parent_modules = CourseModule::getCourseModuleParentByCourseId($course_id, $request->page_type);

        // dd($parent_modules);
        return view('course_module.index', [
            'parent_modules' => $parent_modules,
            'course_detail' => $course_detail,
            'page_type' => $request->page_type,
        ]);
    }
    function getCourseSubModule(Request $request)
    {
        // dd($request->all());
        $course_id = $request->course_id;
        $course_detail = Course::getCourseDetailByCourseId($course_id);

        $module_id = $request->module_id;
        $sub_modules = CourseModule::getCourseModuleChildByParentId($module_id);
        $parent_module_detail = CourseModule::getCourseModuleDetailByModuleId($module_id);

        // dd($sub_modules);
        return view('course_module.child.index', [
            'sub_modules' => $sub_modules,
            'course_detail' => $course_detail,
            'parent_module_detail' => $parent_module_detail,
            'page_type' => $request->page_type,
        ]);
    }

    function getAddCourseModule(Request $request)
    {
        $course_id = $request->id;
        $course_detail = Course::getCourseDetailByCourseId($course_id);
        $page_type = $request->page_type;

        return view('course_module.add', [
            'course_detail' => $course_detail,
            'page_type' => $page_type,
        ]);
    }

    function postAddCourseModule(Request $request)
    {
        // dd($request->all());
        $level = 1;
        $type = '';

        if ($request->page_type == 'LMS') {
            $type = 'parent';
        }
        if ($request->page_type == 'CP') {
            $type = 'company_profile';
        }
        // dd($type);

        $create = CourseModule::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'level' => $level,
            'type' => $type,
            'course_id' => $request->course_id,
            'content' => $request->content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if ($create) {
            return redirect()->route('getCourseModule', ['course_id' => $request->course_id, 'page_type' => $request->page_type])->with('success', 'Sukses Menambah Modul');
        } else {
            return redirect()->route('getCourseModule', ['course_id' => $request->course_id, 'page_type' => $request->page_type])->with('error', 'Gagal Menambah Modul, silahkan coba lagi');
        }
    }

    function getEditCourseModule(Request $request)
    {
        // dd($request->all());
        $module_id = $request->id;
        $module_detail = CourseModule::getCourseModuleDetailByModuleId($module_id);

        // dd($module_detail);

        return view('course_module.edit', [
            'module_detail' => $module_detail,
            'page_type' => $request->page_type,
        ]);
    }

    function postEditCourseModule(Request $request)
    {
        // dd($request->all());
        $course_detail = Course::getCourseDetailByCourseId($request->course_id);
        $update = CourseModule::where('id', $request->id)
            ->update([
                "name" => $request->name,
                "priority" => $request->priority,
                "description" => $request->description,
                "status" => $request->status ? 1 : 0,
                'updated_at' => now(),
                'updated_id' => Auth::guard('web')->user()->id,
            ]);

        if ($update) {
            return redirect()->route('getCourseModule', ['course_id' => $course_detail->id, 'page_type' => $request->page_type])->with('success', 'Sukses Update Module');
        } else {
            return redirect()->route('getCourseModule', ['course_id' => $course_detail->id, 'page_type' => $request->page_type])->with('error', 'Gagal Update Modul, silahkan coba lagi');
        }
    }

    // CHILD
    // function getCourseChildModule(Request $request){
    //     $courseParent = CourseModule::find($request->id);
    //     $courseModuleChild = CourseModule::CourseModuleChild($request);

    //     return view('course_module.child.index', [
    //         'courseParent' => $courseParent,
    //         'courseChildModules' => $courseModuleChild
    //     ]);
    // }

    function getAddCourseChildModule(Request $request)
    {
        // dd($request->all());
        $course_detail = Course::getCourseDetailByCourseId($request->course_id);
        $parent = CourseModule::find($request->id);
        $course_type = MCourseType::find($course_detail->m_course_type_id);

        // dd($course_type);
        return view('course_module.child.add', [
            'course_type' => $course_type,
            'parent' => $parent,
            'page_type' => $request->page_type,
            // 'allChildHave' => $childModules
        ]);
    }

    function postAddChildModule(Request $request)
    {
        // dd($request->all());
        $parentModule = CourseModule::find($request->parentId);

        if (isset($request->rapid) & $request->rapid == 1) {
            $create = CourseModule::create([
                'name' => $request->name,
                'priority' => $request->priority,
                'level' => 2,
                'html' => $request->html,
                'js' => $request->js,
                'course_id' => $parentModule->course_id,
                'course_module_parent_id' => $parentModule->id,
                'type' => 'materi_pembelajaran',
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
        } else {
            if ($request->type == 'materi_pembelajaran' || $request->type == 'assignment') {
                $material = '';
                if ($request->hasFile('material')) {
                    $file = $request->file('material');
                    $material = $file->getClientOriginalName();
                    $destinationPath = public_path('/uploads/course_module/' . $parentModule->id);
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $material);
                }
            } else {
                $material = $request->material;
            }

            $create = CourseModule::create([
                'name' => $request->name,
                'priority' => $request->priority,
                'level' => 2,
                'course_id' => $parentModule->course_id,
                'course_module_parent_id' => $parentModule->id,
                'type' => $request->type,
                'material' => $material,
                'duration' => $request->duration,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
        }


        if ($create) {
            return redirect()->route('getCourseSubModule', ['course_id' => $parentModule->course_id, 'module_id' => $parentModule->id, 'page_type' => 'LMS_child'])->with('success', 'Sukses Update Module');
        } else {
            return redirect()->route('getCourseSubModule', ['course_id' => $parentModule->course_id, 'module_id' => $parentModule->id, 'page_type' => 'LMS_child'])->with('error', 'Gagal Update Modul, silahkan coba lagi');
        }
    }

    function getEditChildModule(Request $request)
    {
        // dd($request->all());
        $childModule = CourseModule::find($request->id);
        $parentModule = CourseModule::find($childModule->course_module_parent_id);
        $course_detail = Course::getCourseDetailByCourseId($parentModule->course_id);
        $course_type = MCourseType::find($course_detail->m_course_type_id);

        // dd($childModule);
        return view('course_module.child.edit', [
            'childModule' => $childModule,
            'parentModule' => $parentModule,
            'course_type' => $course_type,
        ]);
    }

    function postEditChildModule(Request $request)
    {
        // dd($request->all());
        $module_detail = CourseModule::find($request->id);

        if (isset($request->rapid) & $request->rapid == 1) {
            $update = CourseModule::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'priority' => $request->priority,
                    'html' => $request->html,
                    'js' => $request->js,
                    'type' => $request->type,
                    'content' => $request->content,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        } else {
            if ($request->type == 'materi_pembelajaran' || $request->type == 'assignment') {
                $material = $module_detail->material;
                if ($request->hasFile('material')) {
                    $file = $request->file('material');
                    $material = $file->getClientOriginalName();
                    $destinationPath = public_path('/uploads/course_module/' . $module_detail->course_module_parent_id);
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $material);
                }
            } else {
                $material = $request->material;
            }
            $update = CourseModule::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'priority' => $request->priority,
                    'type' => $request->type,
                    'material' => $material,
                    'duration' => $request->duration,
                    'content' => $request->content,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        }

        if ($update) {
            return redirect()->route('getCourseSubModule', ['course_id' => $module_detail->course_id, 'module_id' => $module_detail->course_module_parent_id, 'page_type' => 'LMS_child'])->with('success', 'Sukses Update Module');
        } else {
            return redirect()->route('getCourseSubModule', ['course_id' => $module_detail->course_id, 'module_id' => $module_detail->course_module_parent_id, 'page_type' => 'LMS_child'])->with('error', 'Gagal Update Modul, silahkan coba lagi');
        }
    }
}
