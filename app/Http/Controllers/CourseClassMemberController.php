<?php

namespace App\Http\Controllers;

use App\Models\CourseClassMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseClassMemberController extends Controller
{
    //
    function getCourseClassMember(){
        $courseClassMembers = collect(DB::select('SELECT 
            course_class_member.id AS id,
            course_class_member.description AS description,
            course_class_member.status AS status,
            course_class_member.created_at AS created_at,
            course_class_member.updated_at AS updated_at,
            users.id AS user_id,
            users.name AS user_name,
            course_class.batch AS course_class_batch,
            course.name AS course_name
            FROM course_class_member
            JOIN users
            JOIN course_class
            JOIN course
            WHERE course_class_member.user_id = users.id 
            AND course_class_member.course_class_id = course_class.id
            AND course_class.course_id = course.id;
        '));

        return view('course_class_member.index', ['courseClassMembers' => $courseClassMembers]);
    }

    function getAddCourseClassMember(){
        $courseClasses = DB::select('SELECT course_class.id AS course_class_id,
            course_class.batch AS course_class_batch,
            course.id AS course_id,
            course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id;
        ');

        $users = User::all();

        return view('course_class_member.add', [
            'users' => $users,
            'courseClasses' => $courseClasses
        ]);
    }

    function postAddCourseClassMember(Request $request){
        $validate = $request->validate([
            'users' => 'required',
            'course_class' => 'required',
        ]);

        if ($validate){
            $created = CourseClassMember::create([
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($created){
                return app(HelperController::class)->Positive('getCourseClassMember');
            } else {
                return app(HelperController::class)->Negative('getCourseClassMember');
            }
        }
    }

        function getEditCourseClassMember(Request $request){
            $currentData = collect(DB::select('SELECT 
                course_class_member.user_id AS ccm_member_id,
                course_class_member.course_class_id AS ccm_course_class_id,
                course_class_member.description AS ccm_description,
                course_class_member.status AS ccm_status,
                users.name AS user_name,
                course_class.batch AS course_class_batch
                FROM course_class_member
                JOIN users
                JOIN course_class
                WHERE course_class_member.user_id = users.id 
                AND course_class_member.course_class_id = course_class.id
                AND course_class_member.id = ?;
            ', [$request->id]));
            

            $currentDataCourse = DB::select('SELECT course.name AS course_name
                FROM course_class
                JOIN course ON course_class.course_id = course.id
                WHERE course_class.id = ?;
            ', [$currentData[0]->ccm_course_class_id])[0];

            $allCourseClasses = DB::select('SELECT course_class.id AS course_class_id,
            course_class.batch AS course_class_batch,
            course.id AS course_id,
            course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id AND NOT course_class.id = ?;
            ', [$currentData[0]->ccm_course_class_id]);


            // return dd($allCourseClasses);

            $ccmMemberId = $currentData[0]->ccm_member_id;

            $allMembers = User::where('id', '!=', $ccmMemberId)->get();

            return view('course_class_member.edit', [
                'currentData' => $currentData,
                'currentDataCourse' => $currentDataCourse,
                'allCourseClasses' => $allCourseClasses,
                'allMembers' => $allMembers
            ]);
        }

    function postEditCourseClassMember(Request $request){
        $update = CourseClassMember::where('id', '=', $request->id)
            ->update([
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'updated_id' => Auth::user()->id
            ]);

        if ($update){
            return app(HelperController::class)->Positive('getCourseClassMember');
        } else {
            return app(HelperController::class)->Warning('getCourseClassMember');
        }
    }
}
