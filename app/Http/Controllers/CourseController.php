<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\MCourseType;
use App\Models\MDifficultyType;
use DB;
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
}