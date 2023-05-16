<?php

namespace App\Http\Controllers;

use Auth;
use DB;

class CourseController extends Controller
{
    //
    function getCourse(){
        $memberid = Auth::user()->id;

        // batch users/member
        $mybatch = DB::select("select course_class.id as batch_id, course_class.batch as batch from course_class_member join course_class join users where course_class_member.id_member = users.id and course_class_member.id_course_class = course_class.id and users.id = '$memberid'");
        $mycourse = DB::select("SELECT users.id AS id_member, users.name as user_name, course.name AS course_name
            FROM users
            INNER JOIN course_class_member ON course_class_member.id_member = users.id
            INNER JOIN course_class ON course_class_member.id_course_class = course_class.id
            INNER JOIN course ON course_class.id_course = course.id 
            WHERE users.id = ?", array($memberid));

        // course users/member
        // $mycourse = $mybatch;

        return view('course.index', [
            'mybatch' => $mybatch,
            'myuserid' => $memberid,
            'mycourse' => $mycourse
        ]);
    }
}
