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
use DB;
use App\Models\AccessMaster;
use Illuminate\Support\Facades\Auth;

class CourseClassMemberGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getCCMHGrade(Request $request)
    {
        // dd($request);
        $broGotAccessMaster = AccessMaster::getUserAccessMaster();

        $hasManageAllClass = false;

        foreach ($broGotAccessMaster as $access) {
            if ($access->name === 'manage_all_class') {
                $hasManageAllClass = true;
                break;
            }
        }

        if ($request->has('class_id')) {

            if ($hasManageAllClass) {
                $class_list_dropdown1 = DB::table('course_class')
                    ->join('course', 'course.id', '=', 'course_class.course_id')
                    ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                    ->get();

            // dd($class_list);
            }
            else{
                $class_list_dropdown1 = DB::table('course_class')
                    ->join('course', 'course.id', '=', 'course_class.course_id')
                    ->join('course_class_member', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                    ->where('course_class_member.user_id', Auth::user()->id)
                    ->get();
            }
            
            $class_list = null;
            $day_dropdown = null;
            $class_list_dropdown = null;

            if ($request->has('day')) {
                $formattedPath = [];

                if($request->day == 'all'){
                    $course = DB::table('course_class_member')
                    ->join('course_class_member_grading', 'course_class_member_grading.user_id', '=', 'course_class_member.user_id')
                    ->join('course_class', 'course_class_member.course_class_id', '=', 'course_class.id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_grading.course_class_module_id')
                    ->join('users', 'users.id', '=', 'course_class_member.user_id')
                    ->join('course' , 'course.id', '=', 'course_class.course_id')
                    ->join('course_module' , 'course_module.id', '=', 'course_class_module.course_module_id')
                    ->where('course_class.id' ,'=', $request->class_id)
                    ->where('course_class_module.course_class_id' ,'=', $request->class_id)
                    ->whereNotNull('course_class_member_grading.submitted_file')
                    ->select('*' , 'users.name as user_name' , 'course.name as course_name', 'course_module.name as course_module_name')
                    ->get();
                    
                    foreach ($course as $course) {
                        $user_name = Str::snake(Str::lower($course->user_name));
                        $course_name = Str::snake(Str::lower($course->course_name));
                        $course_module_name = Str::snake(Str::lower($course->course_module_name));
                        $submitted_file = $course->submitted_file;
                        $formattedPath[] = [
                            'user_name' => $user_name,
                            'course_name' => $course_name,
                            'course_module_name' => $course_module_name,
                            'submitted_file' => $submitted_file
                        ];
                    }
                }
                else{
                    $course_module_parent = DB::table('course_module')
                    ->join('course_class_module', 'course_class_module.course_module_id', '=', 'course_module.id')
                    ->where('course_class_module.course_class_id' ,'=', $request->class_id)
                    ->where('course_class_module.level' ,'=', 1)
                    ->where('course_class_module.priority' ,'=', $request->day)
                    ->select('course_module.id')
                    ->first();

                    $course_module_child = DB::table('course_module')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class_module', 'course_class_module.course_module_id', '=', 'course_module.id')
                    ->where('course_module.course_module_parent_id' ,'=', $course_module_parent->id)
                    ->where('course_module.type' ,'=', 'assignment')
                    ->where('course_class_module.course_class_id' ,'=', $request->class_id)
                    ->select('course_module.id' , 'course_class_module.id as course_class_module_id', 'course_module.id as course_module_id', 'course_module.name', 'course.name as course_name' ,'course_module.course_module_parent_id' ,'course_class_module.id as course_class_module_id')
                    ->get();

                    $all_course_grading_lists = [];

                    foreach ($course_module_child as $child) {
                        $course_grading_list = DB::table('course_class_member_grading')
                            ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_grading.course_class_module_id')
                            ->join('course_module', 'course_class_module.course_module_id', '=', 'course_module.id')
                            ->join('course', 'course.id', '=', 'course_module.course_id')
                            ->join('users', 'users.id', '=', 'course_class_member_grading.user_id')
                            ->where('course_class_member_grading.course_class_module_id', '=', $child->course_class_module_id)
                            ->where('course_module.id', '=', $child->course_module_id)
                            ->select('*' , 'users.name as user_name' , 'course.name as course_name', 'course_module.name as course_module_name')
                            ->get();

                        $all_course_grading_lists[] = $course_grading_list;
                    }
                    $course = collect($all_course_grading_lists)->flatten()->all();

                    foreach ($course as $course) {
                        $user_name = Str::snake(Str::lower($course->user_name));
                        $course_name = Str::snake(Str::lower($course->course_name));
                        $course_module_name = Str::snake(Str::lower($course->course_module_name));
                        $submitted_file = $course->submitted_file;
                        $formattedPath[] = [
                            'user_name' => $user_name,
                            'course_name' => $course_name,
                            'course_module_name' => $course_module_name,
                            'submitted_file' => $submitted_file
                        ];
                    }
                }

                $files = [];
                foreach ($formattedPath as $formattedItem) {
                    $user_name = $formattedItem['user_name'];
                    $course_name = $formattedItem['course_name'];
                    $course_module_name = $formattedItem['course_module_name'];
                    $submitted_file = $formattedItem['submitted_file'];
                
                    $filePath = 'uploads/course_class_member_grading/' . 
                                $course_name . '/' .
                                $user_name . '/' . 
                                $course_module_name . '/' . 
                                $submitted_file;
                
                    // Periksa apakah file ada sebelum menambahkannya ke dalam zip
                    if (file_exists($filePath)) {
                        $files[] = $filePath;
                    } else {
                        echo "File not found: $filePath <br>";
                    }
                }

                $zipFileName = 'downloaded_files.zip';

                // Buat instance ZipArchive
                $zip = new ZipArchive();
                if ($zip->open(storage_path('app/' . $zipFileName), ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
                    // Tambahkan setiap file ke dalam zip
                    foreach ($files as $file) {
                        // Periksa apakah file ada sebelum menambahkannya ke dalam zip
                        if (file_exists($file)) {
                            $zip->addFile($file, basename($file));
                        }
                    }
                    // Tutup zip
                    $zip->close();
                
                    // Set header untuk response zip
                    return response()->download(storage_path('app/' . $zipFileName))->deleteFileAfterSend(true);
                } else {
                    // Jika gagal membuat zip, kirim respons error
                    return response()->json(['message' => 'Failed to create zip.'], 500);
                }
            }
            else{
                $class_list = CourseClass::getTutorEnrolledClass($hasManageAllClass , $request->class_id);
                $class_list1 = collect($class_list);
                $class_list1 = $class_list1->sortBy('id');
                $class_list_dropdown = $class_list1->filter(function($class) {
                    return $class->submitted_file !== null;
                })->groupBy(function ($class) {
                    return $class->course_name . '-' . $class->batch;
                })->flatMap(function ($group) {
                    return $group->unique('batch')->map(function ($item) {
                        return [
                            'class_id' => $item->class_id,
                            'batch' => $item->batch,
                            'course_name' => $item->course_name
                        ];
                    });
                })->values()->all();
                $day_class = collect($class_list);
                $day_class = $day_class->sortBy('day');
                $day_dropdown = $day_class->groupBy('day')->map(function($group) {
                    return $group->first()->day;
                })->values()->all();
            }
        }
        else{
            if ($hasManageAllClass) {
                $class_list_dropdown1 = DB::table('course_class')
                    ->join('course', 'course.id', '=', 'course_class.course_id')
                    ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                    ->get();

            // dd($class_list);
            }
            else{
                $class_list_dropdown1 = DB::table('course_class')
                    ->join('course', 'course.id', '=', 'course_class.course_id')
                    ->join('course_class_member', 'course_class.id', '=', 'course_class_member.course_class_id')
                    ->select('course.name as course_name', 'course_class.batch', 'course_class.id as class_id')
                    ->where('course_class_member.user_id', Auth::user()->id)
                    ->get();
            }
            
            $class_list = null;
            $day_dropdown = null;
            $class_list_dropdown = null;
        }

        // dd($request);

        return view('trackandgrade::course_class_member_grading.index', [
            'class_list' => $class_list,
            'class_list_dropdown' => $class_list_dropdown,
            'class_list_dropdown1' => $class_list_dropdown1,
            'day_dropdown' => $day_dropdown,
            'id_class' => $request->class_id,
        ]);
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
        // dd($request);
        $class_id = $request->class_id;
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
        return view('trackandgrade::course_class_member_grading.edit', compact('currentData' , 'class_id'));
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
