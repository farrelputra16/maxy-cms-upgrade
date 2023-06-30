<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePackage;
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
        $allPackagePrices = CoursePackage::all();
        $allCourseTypes = MCourseType::all();
        $allCourseDifficulty = MDifficultyType::all();

        return view('course.add', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes, 
            'allCourseDifficulty'=> $allCourseDifficulty
        ]);
    }

    public function postAddCourse(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'type' => 'required',
        ]);

        $trim_mini_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_fake_price));
        $trim_mini_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_price));

        if ($validated){
            $create = Course::create([
                'name' => $request->name,
                'fake_price' => (float)$trim_mini_fake_price,
                'price' => (float)$trim_mini_price,
                'discounted_price' => 0,
                'short_description' => 'no desc',
                'image' => 'no.jpg',
                'preview' => '0',
                'target' => '0',
                'payment_link' => '0',
                'slug' => $request->slug,
                'm_course_type_id' => $request->type,
                'course_package_id' => $request->type == 2 ? null : $request->package_price,
                'm_difficulty_type_id' => $request->level,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getCourse');
            }
        } 
    }

    function getEditCourse(Request $request){
        $idCourse = $request->id;
        $courses = Course::find($idCourse);

        $currentDataCourse = collect(DB::select('SELECT course.id AS course_id, 
            course.m_course_type_id AS m_course_type_id,
            course.fake_price AS fake_price,
            course.price AS price,
            course.m_difficulty_type_id AS m_difficulty_type_id,
            m_course_type.name AS course_type_name,
            m_difficulty_type.name AS course_difficulty
            FROM course 
            INNER JOIN m_course_type ON course.m_course_type_id = m_course_type.id
            INNER JOIN m_difficulty_type ON course.m_difficulty_type_id = m_difficulty_type.id 
            WHERE course.id = ?;', [$idCourse]));

        $currentCoursePackages = collect(DB::select('SELECT course_package.id AS course_package_id, course_package.name AS course_package_name,
            course_package.price AS course_package_price
            FROM course
            JOIN course_package
            WHERE course_package.id = course.course_package_id AND course.id = ?
        ', [$idCourse]));
        
        $allCourseTypes = MCourseType::where('id', '!=', $currentDataCourse->value('m_course_type_id'))->get();
        $allDifficultyTypes = MDifficultyType::where('id', '!=', $currentDataCourse->value('m_difficulty_type_id'))->get();
        $allCoursePackages = CoursePackage::where('id', '!=', $currentCoursePackages->value('course_package_id'))->get();

        return view('course.edit', [
            'courses' => $courses,
            'currentDataCourse' => $currentDataCourse,
            'allCourseTypes' => $allCourseTypes,
            'currentCoursePackages' => $currentCoursePackages,
            'allCoursePackages' => $allCoursePackages,
            'allDifficultyTypes' => $allDifficultyTypes,
        ]);
    }

    function postEditCourse(Request $request){
        $idCourse = $request->id;

        $trim_mini_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_fake_price));
        $trim_mini_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_price));

        $courses = Course::find($idCourse);

        if ($request->package && $courses->fake_price && $courses->price){
            $updateData = DB::table('course')
                ->where('id', $idCourse)
                ->update([
                    'name' => $request->name,
                    'fake_price' => null,
                    'price' => null,
                    'discounted_price' => 0,
                    'short_description' => 'no desc',
                    'image' => 'no.jpg',
                    'preview' => '0',
                    'target' => '0',
                    'payment_link' => '0',
                    'slug' => $request->slug,
                    'm_course_type_id' => $request->type,
                    'course_package_id' => $request->package == 2 ? null : $request->package,
                    'm_difficulty_type_id' => $request->level,
                    'description' => $request->description,
                    'status' => $request->status == '' ? 0 : 1,
                    'created_created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id
            ]);

            if ($updateData){
                return app(HelperController::class)->Positive('getCourse');;
            } else {
                return app(HelperController::class)->Warning('getCourse');;
            }
        } else if ($request->mini_fake_price && $request->mini_price && $courses->course_package_id){
            $updateData = DB::table('course')
                ->where('id', $idCourse)
                ->update([
                    'name' => $request->name,
                    'fake_price' => $trim_mini_fake_price,
                    'price' => $trim_mini_price,
                    'discounted_price' => 0,
                    'short_description' => 'no desc',
                    'image' => 'no.jpg',
                    'preview' => '0',
                    'target' => '0',
                    'payment_link' => '0',
                    'slug' => $request->slug,
                    'm_course_type_id' => $request->type,
                    'course_package_id' => null,
                    'm_difficulty_type_id' => $request->level,
                    'description' => $request->description,
                    'status' => $request->status == '' ? 0 : 1,
                    'created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id
            ]);

            if ($updateData){
                return app(HelperController::class)->Positive('getCourse');;
            } else {
                return app(HelperController::class)->Warning('getCourse');;
            }
        } else {
            $updateData = DB::table('course')
                ->where('id', $idCourse)
                ->update([
                    'name' => $request->name,
                    'fake_price' => $request->mini_fake_price ? $trim_mini_fake_price : null,
                    'price' => $request->mini_price ? $trim_mini_price : null,
                    'discounted_price' => 0,
                    'short_description' => 'no desc',
                    'image' => 'no.jpg',
                    'preview' => '0',
                    'target' => '0',
                    'payment_link' => '0',
                    'slug' => $request->slug,
                    'm_course_type_id' => $request->type,
                    'course_package_id' => $request->package ? $request->package : null,
                    'm_difficulty_type_id' => $request->level,
                    'description' => $request->description,
                    'status' => $request->status == '' ? 0 : 1,
                    'created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id
            ]);

            if ($updateData){
                return app(HelperController::class)->Positive('getCourse');;
            } else {
                return app(HelperController::class)->Warning('getCourse');;
            }
        }
    }
}
