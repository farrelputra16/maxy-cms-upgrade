<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\Course;
use App\Models\User;
use App\Models\CourseClass;

class TestimonialController extends Controller
{
    //
    function getTestimonial(){
        $testimonials = DB::select('SELECT 
        member_testimonial.*, 
        users.name AS membername, 
        users.name AS coursename, 
        course_class.batch AS coursebatch 
        FROM member_testimonial
        JOIN users ON member_testimonial.user_id = users.id
        JOIN course ON member_testimonial.course_id = course.id
        JOIN course_class ON member_testimonial.course_class_id = course_class.id');

        return view('member_testimonial.index',[
            'testimonials' => $testimonials
        ]);
    
    }

    function getAddTestimonial(){
        $allcourse = Course::all();
        $allmember = User::all();
        $allcourseclass = CourseClass::all();

        return view('member_testimonial.add',[
            'allcourse' => $allcourse,
            'allmember' => $allmember,
            'allcourseclass' => $allcourseclass
        ]);
    }

    function postAddTestimonial(Request $request){
        // return dd($request);
        $validated= $request->validate([
            'stars' => 'required',
            'role' => 'required',
            'course_id' => 'required',
            'user_id' => 'required',
            'course_class_id' => 'required',
            'description' => 'required',
        ]);

        if ($validated){
            $create = Testimonial::create([
                'stars' => $request->stars,
                'role' => $request->role,
                'status_highlight' => $request->status_highlight ? 1 : 0,
                'course_id' => $request->course_id,
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0
            ]);
            if ($create){
                return app(HelperController::class)->Positive('getTestimonial');
            }
            return app(HelperController::class)->Negative('getTestimonial');
        }
    }

    function getEditTestimonial(Request $request){
        $idtestimonial = $request->id;
        $testimonials = Testimonial::find($idtestimonial);

        $currentData = collect(DB::select('SELECT 
        member_testimonial.course_id, 
        member_testimonial.user_id,
        member_testimonial.course_class_id,
        users.name AS membername, 
        course.name AS coursename, 
        course_class.batch AS coursebatch 
        FROM member_testimonial
        JOIN users ON member_testimonial.user_id = users.id
        JOIN course ON member_testimonial.course_id = course.id
        JOIN course_class ON member_testimonial.course_class_id = course_class.id
        WHERE member_testimonial.id = ?;',[$idtestimonial]))->first();

        $allcourse = Course::where('id', '!=', $currentData->course_id)->get();
        $allmember = User::where('id', '!=', $currentData->user_id)->get();
        $allcourseclass = CourseClass::where('id', '!=', $currentData->course_class_id)->get();

        // return dd($currentData);

        return view('member_testimonial.edit',[
            'testimonials' => $testimonials,
            'currentData' => $currentData,
            'allcourse' => $allcourse,
            'allmember' => $allmember,
            'allcourseclass' => $allcourseclass
        ]);
    }

    function postEditTestimonial(Request $request){
        $idtestimonial = $request->id;

        $updateData = DB::table('member_testimonial')
        ->where('id', '=', $idtestimonial)
        ->update([
            'stars' => $request->stars,
                'role' => $request->role,
                'status_highlight' => $request->status_highlight ? 1 : 0,
                'course_id' => $request->course_id,
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0
        ]);

        if ($updateData){
            return app(HelperController::class)->Positive('getTestimonial');
        } else{
            return app(HelperController::class)->Warning('getTestimonial');
        }
    }
}
    