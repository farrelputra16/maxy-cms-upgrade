<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    function getCourse(){
        $courses = Course::all();
        return view('course.index', ['courses' => $courses]);
    }

    function getAddCourse(){
        return view('course.addcourse');
    }

public function postAddCourse(Request $request)
{
    $course= Course::create([
        'name' =>  $request->name, 
        'slug' => $request->slug,
        'description' => $request->description,
        'id_m_course_type' => $request->id_m_course_type,
        'id_m_difficulty_type' => $request->id_m_difficulty_type,
        'fake_price' => 0,
        'price' => 0,
        'discounted_price' => 0,
        'short_description' => 0,
        'image' => 0,
        'preview' => 0,
        'target' => 0,
        'payment_link' => 0,
        'status' => 0,
        'created_id' => 1,
        'updated_id' => 1,
        'discounted_price' => 0
    ]);

    
}
}