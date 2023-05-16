<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    function getCourse(){
        $memberid = Auth::user()->id;

        // batch users/member
        $mybatch = DB::select("select course_class.id as batch_id, course_class.batch as batch from course_class_member join course_class join users where course_class_member.id_member = users.id and course_class_member.id_course_class = course_class.id and users.id = 33");

        // // course users/member
        // $mycourse = $mybatch->batch_id;

        return view('course.index', [
            'mybatch' => $mybatch,
        ]);
    }
}
