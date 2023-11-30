<?php

namespace Modules\TrackandGrade\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;

use App\Http\Controllers\HelperController;
use App\Models\CourseClassMemberHistory;
use App\Models\CourseModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseClassMemberGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    function getCCMHGrade(){
        $ccmh = CourseClassMemberGrading::join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
            ->join('users', 'users.id', '=', 'course_class_member.user_id')
            ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
            ->join('course', 'course.id', '=', 'course_module.course_id')
            ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
            ->select('course_class_member_grading.*', 'users.name as user_name')
            ->distinct()
            ->get();



        $course_name = Course::select('name')
            ->get();
        $day = CourseModule::select('day')
            ->whereNotNull('day')
            ->Where('day', '!=', '')
            ->groupBy('day')
            ->get();


        // return dd($ccmh1);
        return view('trackandgrade::course_class_member_grading.index', ['ccmh' => $ccmh , 'course_name' => $course_name, 'day' => $day  ]);
    }

    function getGradeCCMH(Request $request){
        $courseNameValue = $request->input('course_name');
        $dayValue = $request->input('day');
        if ($courseNameValue == 'all') {
            if ($dayValue == 'all') { // jika course all, day all
                $ccmh = CourseClassMemberGrading::join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_grading.*', 'users.name as user_name')
                    ->distinct()
                    ->get();

            } else { // jika course all, select day spesifik
                $ccmh = CourseClassMemberGrading::join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_grading.*', 'users.name as user_name')
                    ->where('course_module.day', $dayValue)
                    ->distinct()
                    ->get();

            }
        } else { // jika course spesifik
            if ($dayValue == 'all') { // jika course spesifik, day all
                $ccmh = CourseClassMemberGrading::join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_grading.*', 'users.name as user_name')
                    ->where('course.name', $courseNameValue)
                    ->distinct()
                    ->get();

            } else { // jika course spesifik, day spesifik
                $ccmh = CourseClassMemberGrading::join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_grading.*', 'users.name as user_name')
                    ->where('course.name', $courseNameValue)
                    ->where('course_module.day', $dayValue)
                    ->distinct()
                    ->get();

            }
        }
        
        // return dd($ccmh);
        $course_name = Course::select('name')
            ->get();
        $day = CourseModule::select('day')
            ->whereNotNull('day')
            ->Where('day', '!=', '')
            ->groupBy('day')
            ->get();

        return view('trackandgrade::course_class_member_grading.index', ['ccmh' => $ccmh , 'course_name' => $course_name , 'day' => $day, 'courseNameValue' => $courseNameValue,'dayValue' => $dayValue]);
        
    }


    function getEditCCMH(Request $request){
        // $voucher = Promotion::all();

        $idCCMH = $request->id;
        // return dd($idCCMH);

        // $currentData = collect(DB::select('SELECT 
        //     course_class_member_history.submitted_file, 
        //     course_class_member_history.comment, 
        //     course_class_member_history.grade, 
        //     course_class_member_history.graded_at
        //     FROM course_class_member_history
        //     WHERE course_class_member_history.id = ?; ',[$idCCMH]))->first();

        $currentData = CourseClassMemberGrading::join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
            ->join('users', 'users.id', '=', 'course_class_member.user_id')
            ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
            ->select('course_class_member_grading.*', 'users.name as user_name', 'course_module.name as course_module_name')
            ->where('course_class_member_grading.id', $idCCMH)
            ->first();


        // return dd($currentData);

        // $allPromotion = Promotion::where('id', '!=', $currentData->id)->get();
        // return dd($allPromotion);
        return view('course_class_member_grading.edit', [
            'currentData' => $currentData
        ]);
    }


    function postEditCCMH(Request $request){
        $idccmh = $request->id;
        $waktuSaatIni = Carbon::now();
        $waktuSaatIni->setTimezone('Asia/Jakarta');

        // Mengambil jam dalam zona waktu yang telah diatur di .env
        $jamDiZonaWaktuAnda = $waktuSaatIni->format('Y-m-d H:i:s');

        // return dd($jamDiZonaWaktuAnda);
    
        $updateData = CourseClassMemberGrading::where('id', $idccmh)
            ->update([
                'grade' => $request->grade,
                'graded_at' => $jamDiZonaWaktuAnda
            ]);
            if ($updateData){
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
