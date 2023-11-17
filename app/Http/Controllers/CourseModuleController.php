<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModule;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class CourseModuleController extends Controller
{
    // PARENT
    function getCourseModule(Request $request){
        $idCourse = $request->id;   

        $courseModuleParent = CourseModule::getCourseModuleParent($request);
        
        
        return view('course_module.index', [
            'courseModules' => $courseModuleParent,
            'course_id' => $idCourse
        ]);
    }

    function getAddCourseModule(Request $request){
        $idCourse = $request->id;   

        if ($idCourse !== null) {
            $coursenama = Course::select('name')->where('id', $idCourse)->first();
        }else{
            $coursenama = 'NULL';
        }
        $courses = Course::select('id', 'name')->get();
        return view('course_module.add', [
            'courses' => $courses,
            'courseID' => $idCourse ,
            'courseNAME' => $coursenama
        ]);
    }

    function postAddCourseModule(Request $request){ 
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
    
            if ($create && $request->course_name != NULL ) {
                return app(HelperController::class)->Positive('getCourse');;
            } elseif($create && $request->course_name == NULL){
                return app(HelperController::class)->Positive('getCourseModule');
            }
            else {
                return app(HelperController::class)->Negative('getCourseModule');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan umum di sini jika diperlukan
            return app(HelperController::class)->Negative('getCourseModule');
        }
    }

    function getEditCourseModule(Request $request){
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
    

    function postEditCourseModule(Request $request){
        $update = CourseModule::where('id', $request->id)
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
        
        if($update){
            return app(HelperController::class)->Positive('getCourseModule');
        } else {
            return app(HelperController::class)->Warning('getCourseModule');
        }
    }

    // CHILD
    function getCourseChildModule(Request $request){
        $courseParent = CourseModule::find($request->id);
        $courseModuleChild = CourseModule::CourseModuleChild($request);

        return view('course_module.child.index', [
            'courseParent' => $courseParent,
            'courseChildModules' => $courseModuleChild
        ]);
    }

    function getAddChildModule(Request $request){
        $parent = CourseModule::find($request->id);
        $childModules = CourseModule::where('course_module_parent_id', '=', $parent->id)->get();

        return view('course_module.child.add', [
            'parent' => $parent,
            'allChildHave' => $childModules
        ]);
    }

    function postAddChildModule(Request $request){
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

        if ($create){
            return app(HelperController::class)->Positive('getCourseModule');
        }
        return app(HelperController::class)->Negative('getCourseModule');
    }

    function getEditChildModule(Request $request){
        $childModule = CourseModule::find($request->id);
        return view('course_module.child.edit', [
            'childModules' => $childModule,
        ]);
    }

    function postEditChildModule(Request $request){
        $updated = CourseModule::where('id', '=', $request->id)
        ->update([
            'name' => $request->name,
            'priority' => $request->priority,
            'level' => $request->level,
            'content' => $request->content,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'updated_id' => Auth::user()->id,
        ]);

        if ($updated){
            return app(HelperController::class)->Positive('getCourseModule');
        } else {
            return app(HelperController::class)->Warning('getCourseModule');
        }
    }
}
