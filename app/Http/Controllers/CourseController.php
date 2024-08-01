<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePackage;
use App\Models\MCourseType;
use App\Models\MDifficultyType;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    function getCourse()
    {
        $courses = Course::all();
        return view('course.index', ['courses' => $courses]);
    }

    function getAddCourse()
    {
        $allPackagePrices = CoursePackage::all();
        $allCourseTypes = MCourseType::all();
        $allCourseDifficulty = MDifficultyType::all();
        $allCourseCategory = Category::where('status', 1)->get();

        return view('course.add', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes,
            'allCourseDifficulty' => $allCourseDifficulty,
            'allCourseCategory' => $allCourseCategory,
        ]);
    }

    public function postAddCourse(Request $request)
    {
        try {
            $fileName = null;
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/course_img'), $fileName);
            }
            
            $validated = $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'type' => 'required',
                'mini_fake_price' => 'nullable|numeric',
                'mini_price' => 'nullable|numeric',
                'short_description' => 'nullable|string|max:500',
                'payment_link' => 'nullable|url',
                'level' => 'nullable|numeric',
                'content' => 'nullable|string',
                'description' => 'nullable|string',
                'courseCategory' => 'required|array',
                'courseCategory.*' => 'exists:m_category_course,id',
            ]);
            //sementara
            $request->mini_fake_price=0;
            $request->mini_price=0;
            $request->short_description='';
            $request->package_price=1;
            
            $trim_mini_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_fake_price));
            $trim_mini_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_price));

            if ($validated) {
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
                ]);//dd($request);

                if ($create) {
                    $categories = $request->input('courseCategory');

                    foreach ($categories as $categoryId) {
                        DB::table('course_category')->insert([
                            'course_id' => $create->id,
                            'category_id' => $categoryId,
                            'created_id' => Auth::user()->id,
                            'updated_id' => Auth::user()->id
                        ]);
                    }
                    return app(HelperController::class)->Positive('getCourse');
                }
            }
        } catch (\Exception $e) {//dd($e);
            return app(HelperController::class)->Negative('getCourse');
        }
    }

    function getEditCourse(Request $request)
    {
        $idCourse = $request->id;
        $courses = Course::find($idCourse);
        $allCourseCategory = Category::where('status', 1)->get();
        $selectedCategoryId = DB::table('course_category')->where('course_id', $request->id)->get('category_id');

        $currentDataCourse = Course::CurrentDataCourse($idCourse);
        $currentCoursePackages = Course::CurrentCoursePackages($idCourse);

        $allCourseTypes = MCourseType::where('id', '!=', $currentDataCourse->m_course_type_id)->get();
        $allDifficultyTypes = MDifficultyType::where('id', '!=', $currentDataCourse->m_difficulty_type_id)->get();

        if ($currentCoursePackages == NULL) {
            $allCoursePackages = CoursePackage::all();
        } else {
            $allCoursePackages = CoursePackage::where('id', '!=', $currentCoursePackages->course_package_id)->get();
        }//dd($selectedCategoryId);

        return view('course.edit', [
            'courses' => $courses,
            'currentDataCourse' => $currentDataCourse,
            'allCourseTypes' => $allCourseTypes,
            'currentCoursePackages' => $currentCoursePackages,
            'allCoursePackages' => $allCoursePackages,
            'allDifficultyTypes' => $allDifficultyTypes,
            'allCourseCategory' => $allCourseCategory,
            'selectedCategoryId' => $selectedCategoryId,
        ]);
    }


    function postEditCourse(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'type' => 'required|numeric',
            'mini_fake_price' => 'nullable|numeric',
            'mini_price' => 'nullable|numeric',
            'short_description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
            'description' => 'nullable|string',
            'file_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_link' => 'nullable|url',
            'level' => 'nullable|numeric',
            'status' => 'nullable|boolean',
            'courseCategory' => 'required|array',
            'courseCategory.*' => 'exists:m_category_course,id',
        ]);

        //sementara
        $request->mini_fake_price=0;
        $request->mini_price=0;
        $request->short_description='';
        $request->package_price=1;//dd($request->name);

        try {
            $updateData = Course::postEditCourse($request);
            if ($updateData) {
                DB::table('course_category')->where('course_id', $request->id)->delete();
                $categories = $request->input('courseCategory');
                foreach ($categories as $categoryId) {
                    DB::table('course_category')->insert([
                        'course_id' => $request->id,
                        'category_id' => $categoryId,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id
                    ]);
                }
                return app(HelperController::class)->Positive('getCourse');
            } else {
                return app(HelperController::class)->Warning('getCourse');
            }
        } catch (\Exception $e) {dd($e);
            return app(HelperController::class)->Negative('getCourse');
        }
    }
}
