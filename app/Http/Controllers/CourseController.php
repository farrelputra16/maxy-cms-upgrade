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

    function getEditCourse(Request $request){
        $idCourse = $request->id;
        $courses = Course::find($idCourse);

        $currentData = collect(DB::select('SELECT course.id AS course_id, course.id_m_course_type AS id_course_type, m_course_type.name AS course_type_name,
            course.id_m_difficulty_type AS id_course_difficulty, m_difficulty_type.name AS course_difficulty 
            FROM course 
            INNER JOIN m_course_type ON course.id_m_course_type = m_course_type.id
            INNER JOIN m_difficulty_type ON course.id_m_difficulty_type = m_difficulty_type.id 
            WHERE course.id = ?;', [$idCourse]));

        $allCourseType = MCourseType::where('id', '!=', $currentData->value('id_course_type'))->get();
        $allDifficultyType = MDifficultyType::where('id', '!=', $currentData->value('id_course_difficulty'))->get();


        return view('course.editcourse', [
            'courses' => $courses,
            'currentData' => $currentData,
            'allCourseType' => $allCourseType,
            'allDifficultyType' => $allDifficultyType
        ]);
    }

    function postEditCourse(Request $request){
        $idCourse = $request->id;
        
        $updateData = DB::table('course')
            ->where('id', $idCourse)
            ->update([
                'name' => $request->name,
                'fake_price' => 0,
                'price' => 0,
                'discounted_price' => 0,
                'short_description' => 'no desc',
                'image' => 'no.jpg',
                'preview' => '0',
                'target' => '0',
                'payment_link' => '0',
                'slug' => $request->slug,
                'id_m_course_type' => $request->type,
                'id_m_difficulty_type' => $request->level,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => 1,
                'updated_id' => 1
            ]);

        if ($updateData){
            return redirect()->route('getCourse');
        } else {
            return redirect()->route('getDashboard');
        }
        
    }

    function getDeleteCourse(Request $request){
        $idCourse = $request->id;
        $courses = Course::find($idCourse);

        return view('course.deletecourse', [
            'courses' => $courses,
        ]);
    }

    function postDeleteCourse(Request $request){
        $idCourse = $request->id;
        $courses = Course::find($idCourse);

        $delete = $courses->delete();
        
        if($delete){
            return redirect('/course');
        }
    }
}
