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


class CourseClassMemberGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getCCMHGrade()
    {
        $class_list = CourseClass::getTutorEnrolledClass();

        return view('trackandgrade::course_class_member_grading.index', ['class_list' => $class_list]);
    }

    function getGradeCCMH(Request $request)
    {
        $courseNameValue = $request->input('course_name');
        $dayValue = $request->input('day');

        if ($courseNameValue == 'all') {
            // jika course all, day all
            if ($dayValue == 'all') {
                $ccmh = CourseClassMemberGrading::distinct()->get();
                // jika course all, select day spesifik
            } else {
                $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule', function ($query) use ($dayValue) {
                    $query->where('day', $dayValue);
                })
                    ->distinct()
                    ->get();
            }
        } else { // jika course spesifik
            if ($dayValue == 'all') {
                // jika course spesifik, day all
                $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule.course', function ($query) use ($courseNameValue) {
                    $query->where('name', $courseNameValue);
                })
                    ->distinct()
                    ->get();
            } else { // jika course spesifik, day spesifik
                $ccmh = CourseClassMemberGrading::whereHas('courseClassModule.courseModule.course', function ($query) use ($courseNameValue) {
                    $query->where('name', $courseNameValue);
                })
                    ->whereHas('courseClassModule.courseModule', function ($query) use ($dayValue) {
                        $query->where('day', $dayValue);
                    })
                    ->distinct()
                    ->get();
            }
        }

        $courseNames = Course::select('name')->get();

        $day = CourseModule::select('day')
            ->whereNotNull('day')
            ->where('day', '!=', '')
            ->groupBy('day')
            ->get();

        return view('trackandgrade::course_class_member_grading.index', compact('ccmh', 'courseNames', 'day', 'courseNameValue', 'dayValue'));
    }

    function getEditCCMH(Request $request, CourseClassMemberGrading $courseClassMemberGrading)
    {
        // dd($courseClassMemberGrading);
        $currentData = $courseClassMemberGrading;

        $member = User::find($courseClassMemberGrading->user_id);
        $class_module = CourseClassModule::find($courseClassMemberGrading->course_class_module_id);
        $currentData->class_detail = CourseClass::getClassDetailByClassId($class_module->course_class_id);
        $module_detail = CourseModule::find($class_module->course_module_id);

        // $course_name =  Str::lower(str_replace(' ', '_', $currentData->class_detail->course_name));
        // $user_name =  Str::lower(str_replace(' ', '_', $member->name));
        // $module_name = Str::lower(str_replace(' ', '_', $module_detail->name));

        $course_name = Str::snake(Str::lower($currentData->class_detail->course_name));
        $user_name = Str::snake(Str::lower($member->name));
        $module_name = Str::snake(Str::lower($module_detail->name));

        $currentData->user_name = $member->name;
        $currentData->submission_url = 'uploads/course_class_member_grading/'.$course_name.'/'. $user_name.'/'.$module_name.'/'.$currentData->submitted_file;

        // dd($currentData->submission_url);
        return view('trackandgrade::course_class_member_grading.edit', compact('currentData'));
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
            return app(HelperController::class)->Positive('getCCMHGrade');
        } else {
            return app(HelperController::class)->Warning('getCCMHGrade');
        }
    }
}
