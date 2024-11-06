<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePackage;
use App\Models\MCourseType;
use App\Models\MDifficultyType;
use App\Models\Category;
use App\Models\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    function getCourse()
    {
        $courses = Course::with(['type'])
            ->whereHas('type', function ($q) {
                $q->where('name', '!=', 'MBKM');
            })
            ->get();
        return view('course.indexv3', ['courses' => $courses]);
    }

    function getCourseMBKM()
    {
        $courses = Course::with(['type'])
            ->whereHas('type', function ($query) {
                $query->where('name', 'MBKM');
            })
            ->get();
        return view('course.MBKM.indexv3', ['courses' => $courses]);
    }

    function getAddCourse()
    {
        $allPackagePrices = CoursePackage::where('status', 1)->get();
        $allCourseTypes = MCourseType::where('status', 1)->get();
        $allCourseDifficulty = MDifficultyType::all();
        $allCourseCategory = Category::where('status', 1)->get();
        $allCoursePackages = CoursePackage::where('status', 1)->get();


        return view('course.addv3', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes,
            'allCourseDifficulty' => $allCourseDifficulty,
            'allCourseCategory' => $allCourseCategory,
            'allCoursePackages' => $allCoursePackages
        ]);
    }

    function getAddMBKM()
    {
        $allPackagePrices = CoursePackage::where('status', 1)->get();
        $allCourseTypes = MCourseType::where('status', 1)->get();
        $allCourseDifficulty = MDifficultyType::where('status', 1)->get();
        $allCourseCategory = Category::where('status', 1)->get();
        $allCoursePackages = CoursePackage::where('status', 1)->get();


        // Ambil ID berdasarkan slug 'mbkm'
        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->first();

        return view('course.MBKM.addv3', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes,
            'allCourseDifficulty' => $allCourseDifficulty,
            'allCourseCategory' => $allCourseCategory,
            'allCoursePackages' => $allCoursePackages,
            'mbkmTypeId' => $mbkmType ? $mbkmType->id : null // Kirim ID MBKM ke view
        ]);
    }

    public function postAddCourse(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'type' => 'required',
            'mini_fake_price' => 'nullable|numeric',
            'mini_price' => 'nullable|numeric',
            'credits' => 'nullable|numeric',
            'duration' => 'nullable|numeric',
            'file_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'nullable|string|max:500',
            // 'payment_link' => ['required', 'url', 'regex:/^https:\/\/.+$/'],
            'level' => 'nullable|numeric',
            'content' => 'nullable|string|max:65535',
            'description' => 'nullable|string',
            'courseCategory' => 'nullable|array',
            'courseCategory.*' => 'exists:m_category_course,id',
        ]);

        try {
            $fileName = null;
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/course_img'), $fileName);
            }
            //sementara
            // $request->mini_fake_price = 0;
            // $request->mini_price = 0;
            // $request->short_description = '';
            // $request->package_price = 1;

            $trim_mini_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_fake_price));
            $trim_mini_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->mini_price));

            $create = Course::create([
                'name' => $request->name,
                'fake_price' => (float) $trim_mini_fake_price,
                'price' => (float) $trim_mini_price,
                'short_description' => $request->short_description,
                'image' => $fileName,
                // 'payment_link' => $request->payment_link,
                'slug' => $request->slug,
                'credits' => $request->credits,
                'duration' => $request->duration,
                'm_course_type_id' => $request->type,
                'course_package_id' => $request->type == 2 ? null : $request->package,
                'm_difficulty_type_id' => $request->level,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create) {
                $categories = $request->input('courseCategory');

                if ($categories) {
                    foreach ($categories as $categoryId) {
                        DB::table('course_category')->insert([
                            'course_id' => $create->id,
                            'category_id' => $categoryId,
                            'created_id' => Auth::user()->id,
                            'updated_id' => Auth::user()->id
                        ]);
                    }
                }
                $courseType = MCourseType::find($request->type);
                if ($courseType && $courseType->name === 'MBKM') {
                    // Jika tipe adalah MBKM, redirect ke halaman index MBKM
                    return redirect()->route('getCourseMBKM')->with('success', 'Course updated successfully!');
                } else {
                    // Jika bukan MBKM, redirect ke halaman index course biasa
                    return redirect()->route('getCourse')->with('success', 'Course updated successfully!');
                }
            } else {
                return app(HelperController::class)->Warning('getCourse');
            }

        } catch (\Exception $e) {
            // Log error untuk ditelusuri admin/developer
            \Log::error('Error adding course: ' . $e->getMessage());

            // Kembalikan pesan error yang ramah kepada user
            return redirect()->back()->withErrors(['error' => 'There was a problem saving the course. Please try again or contact support.']);
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

        $allCourseTypes = MCourseType::where('id', '!=', $currentDataCourse->m_course_type_id)->where('status', 1)->get();
        $allDifficultyTypes = MDifficultyType::where('id', '!=', $currentDataCourse->m_difficulty_type_id)->where('status', 1)->get();

        if ($currentCoursePackages == NULL) {
            $allCoursePackages = CoursePackage::where('status', 1)->get();
        } else {
            $allCoursePackages = CoursePackage::where('id', '!=', $currentCoursePackages->course_package_id)->where('status', 1)->get();
        }//dd($selectedCategoryId);

        return view('course.editv3', [
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

    function getEditMBKM(Request $request)
    {
        $idCourse = $request->id;
        $courses = Course::find($idCourse);
        $allCourseCategory = Category::where('status', 1)->get();
        $selectedCategoryId = DB::table('course_category')->where('course_id', $request->id)->get('category_id');

        $currentDataCourse = Course::CurrentDataCourse($idCourse);
        $currentCoursePackages = Course::CurrentCoursePackages($idCourse);

        $allCourseTypes = MCourseType::where('id', '!=', $currentDataCourse->m_course_type_id)->where('status', 1)->get();
        $allDifficultyTypes = MDifficultyType::where('id', '!=', $currentDataCourse->m_difficulty_type_id)->where('status', 1)->get();

        if ($currentCoursePackages == NULL) {
            $allCoursePackages = CoursePackage::where('status', 1)->get();
        } else {
            $allCoursePackages = CoursePackage::where('id', '!=', $currentCoursePackages->course_package_id)->where('status', 1)->get();
        }//dd($selectedCategoryId);

        return view('course.MBKM.editv3', [
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
        // dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'file_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $updateData = Course::postEditCourse($request);
            if (CourseCategory::where('course_id', $request->id)->exists()) {
                DB::table('course_category')->where('course_id', $request->id)->delete();
            }

            $categories = $request->input('courseCategory');
            if ($categories) {
                foreach ($categories as $categoryId) {
                    DB::table('course_category')->insert([
                        'course_id' => $request->id,
                        'category_id' => $categoryId,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id
                    ]);
                }
            }

            // Cek apakah course type adalah MBKM
            $courseType = MCourseType::find($request->type);
            if ($courseType && $courseType->name === 'MBKM') {
                return redirect()->route('getCourseMBKM')->with('success', 'Course updated successfully!');
            } else {
                return redirect()->route('getCourse')->with('success', 'Course updated successfully!');
            }
        } catch (\Exception $e) {
            // Log error untuk developer/admin
            \Log::error('Error updating course: ' . $e->getMessage());

            // Kembalikan pesan error yang ramah kepada user
            return redirect()->back()->withErrors(['error' => 'There was a problem updating the course. Please try again or contact support.']);
        }
    }
}
