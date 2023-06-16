<?php

namespace App\Http\Controllers;

use App\Models\CourseClassMember;
use App\Models\Member;
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
            member.id AS member_id,
            member.name AS member_name,
            course_class.batch AS course_class_batch,
            course.name AS course_name
            FROM course_class_member
            JOIN member
            JOIN course_class
            JOIN course
            WHERE course_class_member.member_id = member.id 
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

        $members = Member::all();

        return view('course_class_member.add', [
            'members' => $members,
            'courseClasses' => $courseClasses
        ]);
    }

    function postAddCourseClassMember(Request $request){
        $validate = $request->validate([
            'member' => 'required',
            'course_class' => 'required',
        ]);

        if ($validate){
            $created = CourseClassMember::create([
                'member_id' => $request->member,
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
            course_class_member.member_id AS ccm_member_id,
            course_class_member.course_class_id AS ccm_course_class_id,
            course_class_member.description AS ccm_description,
            course_class_member.status AS ccm_status,
            member.name AS member_name,
            course_class.batch AS course_class_batch
            FROM course_class_member
            JOIN member
            JOIN course_class
            WHERE course_class_member.member_id = member.id 
            AND course_class_member.course_class_id = course_class.id
            AND course_class_member.id = ?;
        ', [$request->id]));

        $currentDataCourse = collect(DB::select('SELECT course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id AND course_class.id = ?;
        ', [$currentData->value('ccm_course_class_id')]));

        $allCourseClasses = DB::select('SELECT course_class.id AS course_class_id,
            course_class.batch AS course_class_batch,
            course.id AS course_id,
            course.name AS course_name
            FROM course_class
            JOIN course
            WHERE course_class.course_id = course.id AND NOT course_class.id = ?;
        ', [$currentData->value('ccm_course_class_id')]);

        $allMembers = Member::where('id', '!=', $currentData->value('ccm_member_id'))->get();

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
                'member_id' => $request->member,
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
