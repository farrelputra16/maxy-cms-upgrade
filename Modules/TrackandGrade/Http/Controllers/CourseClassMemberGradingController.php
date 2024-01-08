<?php

namespace Modules\TrackandGrade\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;

use App\Http\Controllers\HelperController;
use App\Models\CourseModule;
use App\Models\Course;
use Carbon\Carbon;

class CourseClassMemberGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    function getCCMHGrade()
    {
        $ccmh = CourseClassMemberGrading::distinct()
            ->orderByDesc('created_at')
            ->get();

        $courseNames = Course::select('name')->get();

        $day = CourseModule::select('day')
            ->where('day', '!=', '')
            ->whereNotNull('day')
            ->groupBy('day')
            ->get();

        return view('trackandgrade::course_class_member_grading.index', compact('ccmh', 'courseNames', 'day'));
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
        return view('course_class_member_grading.edit', compact('courseClassMemberGrading'));
    }

    function postEditCCMH(Request $request, CourseClassMemberGrading $courseClassMemberGrading)
    {
        $waktuSaatIni = Carbon::now();
        $waktuSaatIni->setTimezone('Asia/Jakarta');

        // Mengambil jam dalam zona waktu yang telah diatur di .env
        $jamDiZonaWaktuAnda = $waktuSaatIni->format('Y-m-d H:i:s');

        $updateData = $courseClassMemberGrading
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

    public function index()
    {
        return view('trackandgrade::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('trackandgrade::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('trackandgrade::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('trackandgrade::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
