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
        // dd($courses);
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
        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->where('status', 1)->first();
        if ($mbkmType == null) {
            return redirect()->back()->with('error', 'Course Type MBKM not found.');
        }

        return view('course.MBKM.addv3', [
            'allPackagePrices' => $allPackagePrices,
            'allCourseTypes' => $allCourseTypes,
            'allCourseDifficulty' => $allCourseDifficulty,
            'allCourseCategory' => $allCourseCategory,
            'allCoursePackages' => $allCoursePackages,
            'mbkmTypeId' => $mbkmType->id // Kirim ID MBKM ke view
        ]);
    }

    public function postAddCourse(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'slug' => 'required',
            'type' => 'required',
            'mini_fake_price' => 'nullable|string',
            'mini_price' => 'nullable|string',
            'credits' => 'nullable|numeric|min:0',
            'duration' => 'nullable|numeric|min:0',
            'file_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'short_description' => 'nullable|string|max:500',
            'payment_link' => env('APP_ENV') != 'local' ? ['required', 'url', 'regex:/^https:\/\/.+$/'] : 'nullable',
            'level' => 'nullable|numeric',
            'content' => 'nullable|string|max:65535',
            'description' => 'nullable|string',
            'courseCategory' => 'nullable|array',
            'courseCategory.*' => 'exists:m_category_course,id',
        ]);

        try {
            // Proses upload file gambar
            $fileName = null;
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/course_img'), $fileName);
            }

            // Bersihkan simbol "Rp." dan karakter non-angka dari harga
            $trim_mini_fake_price = preg_replace('/[^\d]/', '', $request->mini_fake_price);
            $trim_mini_price = preg_replace('/[^\d]/', '', $request->mini_price);

            // Simpan data course ke database
            $create = Course::create([
                'name' => $request->name,
                'fake_price' => (float) $trim_mini_fake_price,
                'price' => (float) $trim_mini_price,
                'short_description' => $request->short_description,
                'image' => $fileName,
                'payment_link' => env('APP_ENV') != 'local' ? $request->payment_link : null,
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
                session()->flash('course_added', 'Course created successfully! Please add modules for this course.');
                $categories = $request->courseCategory;

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

                // Redirect berdasarkan tipe course
                $courseType = MCourseType::find($request->type);
                if ($courseType && $courseType->name === 'MBKM') {
                    return redirect()->route('getCourseMBKM')->with('success', 'Course updated successfully!');
                } else {
                    return redirect()->route('getCourse')->with('success', 'Course updated successfully!');
                }
            } else {
                return app(HelperController::class)->Warning('getCourse');
            }

        } catch (\Exception $e) {
            \Log::error('Error adding course: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'There was a problem saving the course. Please try again or contact support.'])->withInput();
        }
    }

    function getEditCourse(Request $request)
    {
        $idCourse = $request->id;
        $courses = Course::find($idCourse);
        $allCourseCategory = Category::where('status', 1)->get();
        $selectedCategoryId = DB::table('course_category')
        ->where('course_id', $idCourse)
        ->pluck('category_id')
        ->toArray();

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
        $selectedCategoryId = DB::table('course_category')->where('course_id', $request->id)->pluck('category_id')->toArray();

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
            'mini_fake_price' => 'nullable|string',
            'mini_price' => 'nullable|string',
            'credits' => 'nullable|numeric|min:0',
            'duration' => 'nullable|numeric|min:0',
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
            return redirect()->back()->withErrors(['error' => 'There was a problem updating the course. Please try again or contact support.'])->withInput();
        }
    }
}
