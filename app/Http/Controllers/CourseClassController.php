<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\CourseClass;
use App\Models\CourseClassModule;
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

    function getDuplicateCourseClass(){
        $allCourseClasses = DB::select('SELECT course_class.id, 
        course_class.batch, 
        course_class.course_id, 
        course.name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');
        
        $allCourses = Course::all();

        // dd($allCourseClasses);

        return view('course_class.duplicate', [
            'allCourses' => $allCourses,
            'allCourseClasses' => $allCourseClasses
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

    public function postDuplicateCourseClass(Request $request){
        $validated = $request->validate([
            'batch' => 'required'
        ]);

        if ($validated){
            // mengambil id course class yang ingin di duplicate
            $course_class = CourseClass::where('id', $request->courseClassId)->first();
            $course_class->batch = $request->batch;
            $course_class->course_id = $request->courseId;
            // insert course class yang telah diubah
            $newCourseClass = $course_class->replicate();

            // Memeriksa jika start_date tidak valid dan menggantinya dengan tanggal hari ini
            if ($newCourseClass->start_date == '0000-00-00') {
                $currentDate = date('Y-m-d');
                $newCourseClass->start_date = $currentDate;
            }
            // Memeriksa jika start_date tidak valid dan menggantinya dengan tanggal hari ini
            if ($newCourseClass->end_date == '0000-00-00') {
                $currentDate = date('Y-m-d');
                $newCourseClass->end_date = $currentDate;
            }
            // mengubah status dari class baru
            if ($request->status == null) {
                $newCourseClass->status = 0;
            } else {
                $newCourseClass->status = 1;
            }

            $newCourseClass->save();


            // mengambil id course class yang barusan dibuat
            $last_course_class_id = CourseClass::orderBy('id', 'desc')->first();


            // mengambil id course class module yang ingin di duplicate
            $course_class_modules = CourseClassModule::where('course_class_id', $request->courseClassId)->get();
            // Duplicate setiap course class module
            foreach ($course_class_modules as $module) {
                $newModule = $module->replicate();
                $newModule->course_class_id = $last_course_class_id->id;

                // Memeriksa jika start_date tidak valid dan menggantinya dengan waktu hari ini
                if ($newModule->start_date == '0000-00-00 00:00:00') {
                    $newModule->start_date = now();
                }
                // Memeriksa jika end_date tidak valid dan menggantinya dengan waktu hari ini
                if ($newModule->end_date == '0000-00-00 00:00:00') {
                    $newModule->end_date = now();
                }

                $newModule->save();
            }


            return app(HelperController::class)->Positive('getCourseClass');
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
    