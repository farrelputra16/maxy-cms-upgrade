<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseClassMemberHistory;
use App\Models\CourseModule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseClassMemberHistoryController extends Controller
{
    function getCCMH(){
        $ccmh = DB::table('course_class_member_history')
        ->join('course_class_member', 'course_class_member_history.course_class_member_id', '=', 'course_class_member.id')
        ->join('users', 'users.id', '=', 'course_class_member.user_id')
        ->join('course_module', 'course_module.id', '=', 'course_class_member_history.course_module_id')
        ->select('course_class_member_history.*', 'users.name as user_name', 'course_module.name as course_module_name')
        ->get();

        // return dd($ccmh);
        $course_type = CourseModule::select('type')
        ->whereNotNull('type')
        ->Where('type', '!=', '')
        ->groupBy('type')
        ->get();
        // return dd($ccmh1);
        return view('course_class_member_history.index', ['ccmh' => $ccmh , 'course_type' => $course_type ]);
    }

    function gettypeCCMH(Request $request){
        
        // Mengambil nilai 'course_type' dari permintaan HTTP
        $courseTypeValue = $request->input('course_type');
        if($courseTypeValue == 'all'){
            $ccmh = DB::table('course_class_member_history')
        ->join('course_class_member', 'course_class_member_history.course_class_member_id', '=', 'course_class_member.id')
        ->join('users', 'users.id', '=', 'course_class_member.user_id')
        ->join('course_module', 'course_module.id', '=', 'course_class_member_history.course_module_id')
        ->select('course_class_member_history.*', 'users.name as user_name', 'course_module.name as course_module_name')
        ->get();

        // return dd($ccmh);
        $course_type = CourseModule::select('type')
        ->whereNotNull('type')
        ->Where('type', '!=', '')
        ->groupBy('type')
        ->get();
        // return dd($ccmh1);
        return view('course_class_member_history.index', ['ccmh' => $ccmh , 'course_type' => $course_type ]);

        }else{
            $ccmh = DB::table('course_class_member_history')
        ->join('course_class_member', 'course_class_member_history.course_class_member_id', '=', 'course_class_member.id')
        ->join('users', 'users.id', '=', 'course_class_member.user_id')
        ->join('course_module', 'course_module.id', '=', 'course_class_member_history.course_module_id')
        ->select('course_class_member_history.*', 'users.name as user_name', 'course_module.name as course_module_name')
        ->where('course_module.type', $courseTypeValue)
        ->get();

        // return dd($ccmh);
        $course_type = CourseModule::select('type')
            ->whereNotNull('type')
            ->where('type', '!=', '')
            ->groupBy('type')
            ->get();
    
        return view('course_class_member_history.index', ['ccmh' => $ccmh , 'course_type' => $course_type , 'courseTypeValue' => $courseTypeValue]);

        }
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

        $currentData = DB::table('course_class_member_history')
            ->join('course_class_member', 'course_class_member_history.course_class_member_id', '=', 'course_class_member.id')
            ->join('users', 'users.id', '=', 'course_class_member.user_id')
            ->join('course_module', 'course_module.id', '=', 'course_class_member_history.course_module_id')
            ->select('course_class_member_history.*', 'users.name as user_name', 'course_module.name as course_module_name')
            ->where('course_class_member_history.id', $idCCMH)
            ->first();

        // return dd($currentData);

        // $allPromotion = Promotion::where('id', '!=', $currentData->id)->get();
        // return dd($allPromotion);
        return view('course_class_member_history.edit', [
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
    
        $updateData = DB::table('course_class_member_history')
            ->where('id', $idccmh)
            ->update([
                'grade' => $request->grade,
                'graded_at' => $jamDiZonaWaktuAnda
            ]);
            if ($updateData){
                return app(HelperController::class)->Positive('getCCMH');
            } else {
                return app(HelperController::class)->Warning('getCCMH');
            }
    }
}
