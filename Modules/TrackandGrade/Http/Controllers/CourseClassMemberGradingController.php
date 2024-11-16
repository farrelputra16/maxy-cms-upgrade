<?php

namespace Modules\TrackandGrade\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;
use App\Http\Controllers\HelperController;
use App\Models\CourseModule;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use Illuminate\Support\Facades\DB;
use App\Models\AccessMaster;
use Illuminate\Support\Facades\Auth;

class CourseClassMemberGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getGrade(Request $request)
    {
        // dd($request->all());

        // check if user have access to manage all class
        $broGotAccessMaster = AccessMaster::getUserAccessMaster();
        $hasManageAllClass = false;

        foreach ($broGotAccessMaster as $access) {
            if ($access->name === 'manage_all_class') {
                $hasManageAllClass = true;
                break;
            }
        }

        // get class list based on user access
        if ($hasManageAllClass) {
            $class_list = DB::table('course_class')
                ->join('course', 'course.id', '=', 'course_class.course_id')
                ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                ->where('course_class.status', 1)
                ->get();
        } else {
            $class_list = DB::table('course_class')
                ->join('course', 'course.id', '=', 'course_class.course_id')
                ->join('course_class_member', 'course_class.id', '=', 'course_class_member.course_class_id')
                ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                ->where('course_class.status', 1)
                ->where('course_class_member.user_id', Auth::user()->id)
                ->get();
        }

        // if class has been picked
        if ($request->has('class_id')) {
            $data = CourseClass::getAssignmentModulesByClassId($request->class_id);
        }

        return view('trackandgrade::course_class_member_grading.index', [
            'data' => isset($data) ? $data : [],
            'class_list' => $class_list,
            'class_id' => $request->class_id,
        ]);
    }

    // function getGradeCCMH(Request $request)
    // {
    //     $courseNameValue = $request->input('course_name');
    //     $dayValue = $request->input('day');

    //     if ($courseNameValue == 'all') {
    //         // jika course all, day all
    //         if ($dayValue == 'all') {
    //             $ccmh = CourseClassMemberGrading::distinct()->get();
    //             // jika course all, select day spesifik
    //         } else {
    //             $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule', function ($query) use ($dayValue) {
    //                 $query->where('day', $dayValue);
    //             })
    //                 ->distinct()
    //                 ->get();
    //         }
    //     } else { // jika course spesifik
    //         if ($dayValue == 'all') {
    //             // jika course spesifik, day all
    //             $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule.course', function ($query) use ($courseNameValue) {
    //                 $query->where('name', $courseNameValue);
    //             })
    //                 ->distinct()
    //                 ->get();
    //         } else { // jika course spesifik, day spesifik
    //             $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule.course', function ($query) use ($courseNameValue) {
    //                 $query->where('name', $courseNameValue);
    //             })
    //                 ->whereHas('courseClassModule.courseModule', function ($query) use ($dayValue) {
    //                     $query->where('day', $dayValue);
    //                 })
    //                 ->distinct()
    //                 ->get();
    //         }
    //     }

    //     $courseNames = Course::select('name')->get();

    //     $day = CourseModule::select('day')
    //         ->whereNotNull('day')
    //         ->where('day', '!=', '')
    //         ->groupBy('day')
    //         ->get();

    //     return view('trackandgrade::course_class_member_grading.index', compact('ccmh', 'courseNames', 'day', 'courseNameValue', 'dayValue'));
    // }

    function getEditGrade(Request $request)
    {
        // dd($request->all());

        $data = CourseClassMemberGrading::getSubmissionDetailById($request->id);

        $course_name = Str::snake(Str::lower($data->course_name));
        $user_name = Str::snake(Str::lower($data->user_name));
        $module_name = Str::snake(Str::lower($data->module_name));

        $data->submission_url = 'uploads/course_class_member_grading/' . $course_name . '/' . $user_name . '/' . $module_name . '/' . $data->submitted_file;

        return view('trackandgrade::course_class_member_grading.edit', compact('data'));
    }

    function postEditGrade(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'grade' => 'nullable|integer|min:0|max:100',
        ]);

        try {
            $data = CourseClassMemberGrading::find($request->id);

            $data->grade = $request->grade;
            $data->tutor_comment = $request->tutor_comment;
            $data->graded_at = Carbon::now();

            $data->save();

            return redirect()->route('getGrade', ['class_id' => $request->class_id])->with('success', 'data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'failed to save data, ' . $e->getMessage());
        }
    }

    function addCCMH(Request $request, CourseClassMemberGrading $courseClassMemberGrading)
    {
        $user_id = $request->input('user_id');
        $module = $request->input('module');
        $user_name = $request->input('user_name');

        return view('course_class_member_grading.add', compact('courseClassMemberGrading', 'user_id', 'module', 'user_name'));
    }

    function postAddCCMH(Request $request, CourseClassMemberGrading $courseClassMemberGrading)
    {
        $waktuSaatIni = Carbon::now();
        $waktuSaatIni->setTimezone('Asia/Jakarta');
        // Mengambil jam dalam zona waktu yang telah diatur di .env
        $jamDiZonaWaktuAnda = $waktuSaatIni->format('Y-m-d H:i:s');
        $updateData = $courseClassMemberGrading
            ->insert([
                'grade' => $request->grade,
                'graded_at' => $jamDiZonaWaktuAnda,
                'tutor_comment' => $request->tutor_comment
            ]);

        if ($updateData) {
            return app(HelperController::class)->Positive('getCCMHGrade');
        } else {
            return app(HelperController::class)->Warning('getCCMHGrade');
        }
    }

    function postEditCCMH(Request $request)
    {
        // dd($request->all());

        $waktuSaatIni = Carbon::now();
        $waktuSaatIni->setTimezone('Asia/Jakarta');

        // Mengambil jam dalam zona waktu yang telah diatur di .env
        $jamDiZonaWaktuAnda = $waktuSaatIni->format('Y-m-d H:i:s');

        $updateData = CourseClassMemberGrading::where('id', $request->id)
            ->update([
                'grade' => $request->grade,
                'graded_at' => $jamDiZonaWaktuAnda,
                'tutor_comment' => $request->tutor_comment
            ]);

        if ($updateData) {
            return app(HelperController::class)->Positive('getCCMHGrade', ['class_id' => $request->class_id]);
        } else {
            return app(HelperController::class)->Warning('getCCMHGrade');
        }
    }
}
