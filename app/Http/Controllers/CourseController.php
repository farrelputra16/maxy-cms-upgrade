<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePackage;
use App\Models\MCourseType;
use App\Models\MDifficultyType;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/course_img'), $fileName);
        }

        // return dd($request);
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
                'short_description' => $request->short_description,
                'image' => $fileName,
                'payment_link' => $request->payment_link,
                'slug' => $request->slug,
                'm_course_type_id' => $request->type,
                'course_package_id' => $request->type == 2 ? null : $request->package_price,
                'm_difficulty_type_id' => $request->level,
                'content' => $request->content,
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

        $currentDataCourse = Course::CurrentDataCourse($idCourse);
        $currentCoursePackages = Course::CurrentCoursePackages($idCourse);
        
        // return dd($currentDataCourse);

        $allCourseTypes = MCourseType::where('id', '!=', $currentDataCourse->m_course_type_id)->get();
        $allDifficultyTypes = MDifficultyType::where('id', '!=', $currentDataCourse->m_difficulty_type_id)->get();
        if($currentCoursePackages == NULL){
            $allCoursePackages = CoursePackage::all();

        }
        else{
            $allCoursePackages = CoursePackage::where('id', '!=', $currentCoursePackages->course_package_id)->get();
        }
        
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
        $updateData = Course::postEditCourse($request);
        
        if ($updateData){
            return app(HelperController::class)->Positive('getCourse');;
        } else {
            return app(HelperController::class)->Warning('getCourse');;
        }

    }
}
