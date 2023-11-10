<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseClassMemberHistory;
use App\Models\CourseModule;
use App\Models\CourseClass;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseClassMemberHistoryController extends Controller
{

    //TRACKING
    function getCCMH(){
        $ccmh = DB::table('course_class_member_log')
            ->join('course_class_member', 'course_class_member_log.course_class_member_id', '=', 'course_class_member.id')
            ->join('users', 'users.id', '=', 'course_class_member.user_id')
            ->join('course_class_module' , 'course_class_module.id' , '=', 'course_class_member_log.course_class_module_id')
            ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
            ->join('course', 'course.id', '=', 'course_module.course_id')
            ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
            ->select('course_class_member_log.*', 'users.name as user_name', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.day as day','course_module.name as course_module_name','course.name as course_name')
            ->distinct() 
            ->get();


        $course_name = Course::select('name')
            ->get();
        $user_name = User::select('name')
            ->get();

        return view('course_class_member_log.index', ['ccmh' => $ccmh , 'course_name' => $course_name, 'user_name' => $user_name  ]);
    }

    function getnameCCMH(Request $request){
        
        $courseNameValue = $request->input('course_name');
        $userNameValue = $request->input('user_name');
        if($courseNameValue == 'all'){
            if($userNameValue == 'all'){ // jika course all, member all
                $ccmh = DB::table('course_class_member_log')
                    ->join('course_class_member', 'course_class_member_log.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_class_module' , 'course_class_module.id' , '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name','course.name as course_name')
                    ->distinct() 
                    ->get();
            } else { // jika course all, select member spesifik
                $ccmh = DB::table('course_class_member_log')
                ->join('course_class_member', 'course_class_member_log.course_class_member_id', '=', 'course_class_member.id')
                ->join('users', 'users.id', '=', 'course_class_member.user_id')
                ->join('course_class_module' , 'course_class_module.id' , '=', 'course_class_member_log.course_class_module_id')
                ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                ->join('course', 'course.id', '=', 'course_module.course_id')
                ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                ->select('course_class_member_log.*', 'users.name as user_name',  'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name','course.name as course_name')
                ->distinct() 
                ->where('users.name', $userNameValue) 
                ->get();
            }            
        } else { // jika course spesifik
            if($userNameValue == 'all'){ // jika course spesifik, member all
                $ccmh = DB::table('course_class_member_log')
                    ->join('course_class_member', 'course_class_member_log.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_class_module' , 'course_class_module.id' , '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name','course.name as course_name')
                    ->distinct() 
                    ->where('course.name', $courseNameValue)
                    ->get();
            } else { // jika course spesifik, member spesifik
                $ccmh = DB::table('course_class_member_log')
                    ->join('course_class_member', 'course_class_member_log.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_class_module' , 'course_class_module.id' , '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name','course.name as course_name')
                    ->distinct() 
                    ->where('course.name', $courseNameValue)
                    ->where('users.name', $userNameValue) 
                    ->get();
            }
        }
        // return dd($ccmh);
        $course_name = Course::select('name')
            ->get();
        $user_name = User::select('name')
            ->get();

        return view('course_class_member_log.index', ['ccmh' => $ccmh , 'course_name' => $course_name , 'user_name' => $user_name, 'courseNameValue' => $courseNameValue,'userNameValue' => $userNameValue]);
        
    }

    //GRADING
    function getCCMHGrade(){
        $ccmh = DB::table('course_class_member_grading')
            ->join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
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
        return view('course_class_member_grading.index', ['ccmh' => $ccmh , 'course_name' => $course_name, 'day' => $day  ]);
    }

    function getGradeCCMH(Request $request){
        $courseNameValue = $request->input('course_name');
        $dayValue = $request->input('day');
        if ($courseNameValue == 'all') {
            if ($dayValue == 'all') { // jika course all, day all
                $ccmh = DB::table('course_class_member_grading')
                    ->join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_grading.*', 'users.name as user_name')
                    ->distinct()
                    ->get();
            } else { // jika course all, select day spesifik
                $ccmh = DB::table('course_class_member_grading')
                    ->join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
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
                $ccmh = DB::table('course_class_member_grading')
                    ->join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_member_grading.course_class_module_id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course_class_member_grading.*', 'users.name as user_name')
                    ->where('course.name', $courseNameValue)
                    ->distinct()
                    ->get();
            } else { // jika course spesifik, day spesifik
                $ccmh = DB::table('course_class_member_grading')
                    ->join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
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

        return view('course_class_member_grading.index', ['ccmh' => $ccmh , 'course_name' => $course_name , 'day' => $day, 'courseNameValue' => $courseNameValue,'dayValue' => $dayValue]);
        
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

        $currentData = DB::table('course_class_member_grading')
            ->join('course_class_member', 'course_class_member_grading.course_class_member_id', '=', 'course_class_member.id')
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
    
        $updateData = DB::table('course_class_member_grading')
            ->where('id', $idccmh)
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
}
