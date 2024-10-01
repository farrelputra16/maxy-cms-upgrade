<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Testimonial;
use App\Models\Course;
use App\Models\User;
use Modules\ClassContentManagement\Entities\CourseClass;

class TestimonialController extends Controller
{
    //
    function getTestimonial(){
        $testimonials = Testimonial::select(
            'user_testimonial.*',
            'users.name AS membername',
            'users.name AS coursename',
            'course_class.batch AS coursebatch')
            ->join('users', 'user_testimonial.user_id', '=', 'users.id')
            ->join('course_class', 'user_testimonial.course_class_id', '=', 'course_class.id')
            ->get();

        return view('user_testimonial.indexv3',[
            'testimonials' => $testimonials
        ]);

    }

    function getAddTestimonial(){
        $allcourse = Course::all();
        $allmember = User::all();
        $allcourseclass = CourseClass::all();

        return view('user_testimonial.addv3',[
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
            'user_id' => 'required',
            'course_class_id' => 'required',
            'content' => 'required',
        ]);

        if ($validated){
            $create = Testimonial::create([
                'stars' => $request->stars,
                'role' => $request->role,
                'status_highlight' => $request->status_highlight ? 1 : 0,
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class_id,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
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

        $currentData = Testimonial::select(
            'user_testimonial.user_id',
            'user_testimonial.course_class_id',
            'users.name AS membername',
            'course_class.batch AS coursebatch'
        )
            ->join('users', 'user_testimonial.user_id', '=', 'users.id')
            ->join('course_class', 'user_testimonial.course_class_id', '=', 'course_class.id')
            ->where('user_testimonial.id', $idtestimonial)
            ->first();

        $allmember = User::where('id', '!=', $currentData->user_id)->get();
        $allcourseclass = CourseClass::where('id', '!=', $currentData->course_class_id)->get();

        // return dd($currentData);

        return view('user_testimonial.editv3',[
            'testimonials' => $testimonials,
            'currentData' => $currentData,
            'allmember' => $allmember,
            'allcourseclass' => $allcourseclass
        ]);
    }

    function postEditTestimonial(Request $request){
        $idtestimonial = $request->id;

        $updateData = Testimonial::where('id', $idtestimonial)
            ->update([
                'stars' => $request->stars,
                'role' => $request->role,
                'status_highlight' => $request->status_highlight ? 1 : 0,
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class_id,
                'content' => $request->content,
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
