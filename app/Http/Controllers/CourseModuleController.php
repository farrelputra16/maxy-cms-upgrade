<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModule;
use Auth;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Models\MCourseType;

class CourseModuleController extends Controller
{
    // PARENT
    function getCourseModule(Request $request)
    {

        // dd($request);
        $idCourse = $request->id;
        $coursenama = Course::select('name')->where('id', $idCourse)->first();
        $courseModuleParent = CourseModule::getCourseModuleParent($request);
        // return dd($coursenama);

        return view('course_module.index', [
            'courseModules' => $courseModuleParent,
            'course_id' => $idCourse,
            'course_name' => $coursenama
        ]);
    }

    function getAddCourseModule(Request $request)
    {
        $idCourse = $request->id;

        if ($idCourse !== null) {
            $coursenama = Course::select('name')->where('id', $idCourse)->first();
        } else {
            $coursenama = 'NULL';
        }

        $courses = Course::select('id', 'name')->get();

        return view('course_module.add', [
            'courses' => $courses,
            'courseID' => $idCourse,
            'courseNAME' => $coursenama
        ]);
    }

    function postAddCourseModule(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'priority' => 'required',
                'course' => 'required',
                'content' => 'required',
            ]);

            if ($validator->fails()) {
                // Jika validasi gagal, redirect kembali ke halaman sebelumnya dengan pesan error
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Proses membuat course module jika validasi berhasil
            $create = CourseModule::create([
                'name' => $request->name,
                'priority' => $request->priority,
                'level' => 1,
                'course_id' => $request->course,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create && $request->course_name != NULL) {
                return app(HelperController::class)->Positive('getCourse');
            } elseif ($create && $request->course_name == NULL) {
                return app(HelperController::class)->Positive('getCourseModule');
            } else {
                return app(HelperController::class)->Negative('getCourseModule');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan umum di sini jika diperlukan
            return app(HelperController::class)->Negative('getCourseModule');
        }
    }

    function getEditCourseModule(Request $request)
    {
        $courseModule = CourseModule::find($request->id);

        $currentCourse = CourseModule::getCurrentCourse($request);

        $allCourses = Course::where('id', '!=', $currentCourse->pluck('course_id')->first())->get();

        // return dd($allCourses);

        return view('course_module.edit', [
            'courseModule' => $courseModule,
            'allCourses' => $allCourses,
            'courseName' => [
                'course_id' => $currentCourse->pluck('course_id')->first(),
                'course_name' => $currentCourse->pluck('course_name')->first()
            ]
        ]);
    }


    function postEditCourseModule(Request $request)
    {
        // dd($request);
        $update = CourseModule::where('id', $request->course)
            ->update([
                'name' => $request->name,
                'priority' => $request->priority,
                'course_id' => $request->course,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

        if ($update) {
            return app(HelperController::class)->Positive('getCourseModule', ['id' => $request->course]);
        } else {
            return app(HelperController::class)->Warning('getCourseModule');
        }
    }

    // CHILD
    function getCourseChildModule(Request $request)
    {
        $courseParent = CourseModule::find($request->id);
        $courseModuleChild = CourseModule::courseModuleChild($request);

        // dd($courseModuleChild);

        return view('course_module.child.index', [
            'courseParent' => $courseParent,
            'courseChildModules' => $courseModuleChild
        ]);
    }

    function getAddChildModule(Request $request)
    {
        $parent = CourseModule::find($request->id);
        $childModules = CourseModule::where('course_module_parent_id', '=', $parent->id)->get();

        return view('course_module.child.add', [
            'parent' => $parent,
            'allChildHave' => $childModules
        ]);
    }

    function postAddChildModule(Request $request)
    {
        $parentModule = CourseModule::find($request->parentId);

        $create = CourseModule::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'level' => $request->level,
            'course_id' => $parentModule->course_id,
            'course_module_parent_id' => $parentModule->id,
            'content' => $request->content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id,
        ]);

        if ($create) {
            return app(HelperController::class)->Positive('getCourseModule');
        }
        return app(HelperController::class)->Negative('getCourseModule');
    }

    function getEditChildModule(Request $request)
    {
        $childModule = CourseModule::find($request->id);
        $parentModule = CourseModule::find($childModule->course_module_parent_id);
        $course_detail = Course::getCourseDetailByCourseId($parentModule->course_id);
        $course_type = MCourseType::find($course_detail->m_course_type_id);

        // dd($parentModule);
        return view('course_module.child.edit', [
            'childModule' => $childModule,
            'parentModule' => $parentModule,
            'course_type' => $course_type,
        ]);
    }

    function postEditChildModule(Request $request)
    {
        $updated = CourseModule::where('id', '=', $request->id)
            ->update([
                'name' => $request->name,
                'priority' => $request->priority,
                'level' => 2,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'updated_id' => Auth::user()->id,
            ]);

        if ($updated) {
            // return app(HelperController::class)->Positive('getCourseModule');
            return app(HelperController::class)->Positive('getCourse');
        } else {
            // return app(HelperController::class)->Warning('getCourseModule');
            return app(HelperController::class)->Warning('getCourse');
        }
    }
    
    function deleteCourseModule(Request $request, $id)
    {
        try {
            $courseModule = CourseModule::find($id);

            if (!$courseModule) {
                return app(HelperController::class)->Negative('getCourseModule');
            }

            // Check if it's a parent or child module
            if ($courseModule->course_module_parent_id) {
                // It's a child module
                $parentModule = CourseModule::find($courseModule->course_module_parent_id);
                $courseModule->delete();

                return Redirect::route('getCourseChildModule', ['id' => $parentModule->id])
                    ->with('success', 'Child module deleted successfully.');
            } else {
                // It's a parent module
                $courseModule->delete();

                return app(HelperController::class)->Positive('getCourseModule');
            }
        } catch (\Exception $e) {
            // Handle common errors here if needed
            return app(HelperController::class)->Negative('getCourseModule');
        }
    }

}
