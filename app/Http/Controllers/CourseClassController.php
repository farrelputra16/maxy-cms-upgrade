<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CourseClass;
use DB;

class CourseClassController extends Controller
{
    //
    function getCourseClass(){
        $courseClasses = DB::select('SELECT course.name AS course_name, 
            course_class.id AS id,
            course_class.batch AS batch,
            course_class.quota AS quota,
            course_class.start_date AS start_date,
            course_class.end_date AS end_date,
            course_class.description AS description,
            course_class.status AS status,
            course_class.created_at AS created_at,
            course_class.updated_at AS updated_at
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');
        return view('course_class.index', ['courseClasses' => $courseClasses]);
    }

    function getAddCourseClass(){
        $allCourses = Course::all();

        return view('course_class.add', [
            'allCourses' => $allCourses
        ]);
    }

    public function postAddCourseClass(Request $request){
        $validated = $request->validate([
            'batch' => 'required',
            'start' => 'required',
            'end' => 'required',
            'quota' => 'required|integer|gte:1'
        ]);

        if ($validated){
            $create = CourseClass::create([
                'batch' => $request->batch,
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'course_id' => $request->courseid,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getCourseClass');
            }
        }
    }

    function getEditCourseClass(Request $request){
        $idCourseClass = $request->id;
        $courseclasses = CourseClass::find($idCourseClass);
    
        $currentData = collect(DB::select('SELECT course.name AS course_name, 
            course_class.course_id AS course_id
            FROM course_class 
            INNER JOIN course 
            ON course_class.course_id = course.id 
            WHERE course_class.id = ?;', [$idCourseClass]))->first(); // Use first() to get the first item in the collection
    
        $allCourses = Course::where('id', '!=', $currentData->course_id)->get(); // Access the attribute directly
    
        return view('course_class.edit', [
            'courseclasses' => $courseclasses,
            'currentData' => $currentData,
            'allCourses' => $allCourses
        ]);
    }
    

    function postEditCourseClass(Request $request){
        $idCourseClass = $request->id;
        
        $updateData = DB::table('course_class')
            ->where('id', $idCourseClass)
            ->update([
                'batch' => $request->batch,
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'course_id' => $request->courseid,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

        if ($updateData){
            return app(HelperController::class)->Positive('getCourseClass');
        } else {
            return app(HelperController::class)->Warning('getCourseClass');
        }
        
    }
}
    