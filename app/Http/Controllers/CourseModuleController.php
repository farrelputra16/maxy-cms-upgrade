<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModule;
use Auth;
use DB;
use Illuminate\Http\Request;

class CourseModuleController extends Controller
{
    // PARENT
    function getCourseModule(){
        $courseModuleParent = DB::select('SELECT id, name, course_id, description, status 
            FROM course_module 
            WHERE course_module_parent_id IS NULL 
            ORDER BY id ASC, priority ASC;');

            
        return view('course_module.index', [
            'courseModules' => $courseModuleParent
        ]);
    }

    function getAddCourseModule(){
        $courses = Course::select('id', 'name')->get();
        return view('course_module.add', ['courses' => $courses]);
    }

    function postAddCourseModule(Request $request){
        $create = CourseModule::create([
            'name' => $request->name,
            'priority' => $request->priority,
            'level' => 1,
            'course_id' => $request->course,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        if($create){
            return app(HelperController::class)->Positive('getCourseModule');
        } 
        return app(HelperController::class)->Negative('getCourseModule');
    }

    function getEditCourseModule(Request $request){
        $courseModule = CourseModule::find($request->id);
    
        $currentCourse = collect(DB::select('SELECT course.id as course_id, course.name as course_name
            FROM course_module
            JOIN course
            WHERE course_module.course_id = course.id
            AND course_module.id = ?;
        ', [$request->id]));
    
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
        $courseModuleChild = DB::select('SELECT id, name, description, level, status 
            FROM course_module 
            WHERE course_module_parent_id = ? ORDER BY level ASC', [$request->id]);

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
