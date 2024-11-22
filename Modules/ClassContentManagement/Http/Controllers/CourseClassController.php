<?php

namespace Modules\ClassContentManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Auth;
use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;
use Modules\Enrollment\Entities\CourseClassMember;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\AccessMaster;
use App\Models\Transkrip;
use App\Models\MScore;
use Modules\Attendance\Entities\MemberAttendance;


class CourseClassController extends Controller
{
    function generateAttendanceAllClass()
    {
        try {
            //code...
            $broGotAccessMaster = AccessMaster::getUserAccessMaster();
            $hasManageAllClass = false;

            foreach ($broGotAccessMaster as $access) {
                if ($access->name === 'manage_all_class') {
                    $hasManageAllClass = true;
                    break;
                }
            }

            if ($hasManageAllClass) {
                $classList = CourseClass::getAllCourseClass();
            } else {
                $classList = CourseClass::getAllCourseClassbyMentor();
            }
            // dd($classList);

            foreach ($classList as $key => $value) {
                // auto generate student attendance (preventing error if student enrolls mid class)
                MemberAttendance::generateMemberAttendance($value->id);
            }
            return redirect()->route('getCourseClass')->with('success', 'missing student attendances generated successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'failed to generate missing student attendances, ' . $e->getMessage());
        }
    }

    function getCourseClassScoring(Request $request)
    {
        // dd($request->all());
        $classes = CourseClassModule::with(['CourseClass', 'CourseModule'])
            ->where('course_class_id', $request->id)
            ->whereHas('CourseModule', function ($query) {
                $query->where('type', 'assignment');
            })
            ->orderBy('course_class_module.id')
            ->get();

        if ($classes->isEmpty()) {
            return redirect()->route('getCourseClass')->with('error', 'This class does not yet have any assignments to be assessed');
        }

        // $coba = CourseClassModule::with(['CourseClass', 'CourseModule'])
        // ->where('course_class_id', $request->id)
        // ->get();
        // dd($coba->toArray());

        return view('classcontentmanagement::course_class.scoring', [
            'classes' => $classes,
            'id' => $request->id,
        ]);
    }

    public function postCourseClassScoring(Request $request)
    {
        //dd($request->all());
        try {
            // Mengubah nilai kosong atau null pada attendance menjadi 0
            $attendance = $request->attendance ?? 0;

            // Update attendance percentage
            $updateData = CourseClass::where('id', $request->id)
                ->update([
                    'percentage' => $attendance,
                ]);

            $data = $request->all();

            // Ubah nilai kosong atau null pada setiap module percentage menjadi 0
            foreach ($data as $id => $percentage) {
                if (!is_numeric($id)) {
                    continue;
                }
                // Ubah nilai kosong menjadi 0
                $percentage = $percentage ?? 0;

                CourseClassModule::where('id', $id)->update(['percentage' => $percentage]);
            }

            $members = CourseClassMember::where('course_class_id', $request->id)->get();
            foreach ($members as $member) {
                $data = Transkrip::where('user_id', $member->user_id)
                    ->where('course_class_id', $request->id)
                    ->first();

                $attendance_percentage = CourseClass::where('id', $request->id)->value('percentage') ?? 0;

                $courseClassId = $request->id;
                $absentCount = MemberAttendance::where('user_id', $member->user_id)
                    ->whereNull('attended_at')
                    ->whereHas('CourseClassAttendance', function ($query) use ($courseClassId) {
                        $query->whereHas('CourseClassModule', function ($query) use ($courseClassId) {
                            $query->where('course_class_id', $courseClassId);
                        });
                    })
                    ->count();

                $totalCount = MemberAttendance::where('user_id', $member->user_id)
                    ->whereHas('CourseClassAttendance', function ($query) use ($courseClassId) {
                        $query->whereHas('CourseClassModule', function ($query) use ($courseClassId) {
                            $query->where('course_class_id', $courseClassId);
                        });
                    })
                    ->count();

                $attendance_score = $totalCount > 0 ? ($absentCount / $totalCount) * 100 : 0;
                $score = $attendance_score * $attendance_percentage / 100;

                $course_module_percentage = CourseClassModule::with(['CourseClass', 'CourseModule'])
                    ->where('course_class_id', $request->id)
                    ->whereHas('CourseModule', function ($query) {
                        $query->where('type', 'assignment');
                    })
                    ->orderBy('course_class_module.id')
                    ->get();

                foreach ($course_module_percentage as $item) {
                    // Ubah nilai kosong menjadi 0 jika grade null
                    $item->grade = CourseClassMemberGrading::where('course_class_module_id', $item->id)
                        ->where('user_id', $member->user_id)
                        ->value('grade') ?? 0;

                    $score += $item->grade * $item->percentage / 100;
                }

                $score = ceil($score);
                $score = min($score, 100); // Pastikan nilai maksimum adalah 100
                $score_id = MScore::where('range_start', '<=', $score)->where('range_end', '>=', $score)->first();

                if ($score_id == null) {
                    dd($score, $score_id, $data);
                }

                if ($data) {
                    $data->update(['m_score_id' => $score_id->id, 'updated_id' => Auth::user()->id]);
                } else {
                    $create = Transkrip::create([
                        'user_id' => $member->user_id,
                        'course_class_id' => $request->id,
                        'm_score_id' => $score_id->id,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id
                    ]);
                }
            }

            return app(HelperController::class)->Positive('getCourseClass');
        } catch (Exception $e) {
            dd($e);
            return app(HelperController::class)->Warning('getCourseClass');
        }
    }

    function getCourseClass()
    {
        $broGotAccessMaster = AccessMaster::getUserAccessMaster();
        $hasManageAllClass = false;

        foreach ($broGotAccessMaster as $access) {
            if ($access->name === 'manage_all_class') {
                $hasManageAllClass = true;
                break;
            }
        }

        if ($hasManageAllClass) {
            $courseList = CourseClass::getAllCourseClass();
        } else {
            $courseList = CourseClass::getAllCourseClassbyMentor();
        }

        $batchTitle = $courseList->isNotEmpty() ? $courseList[0]->batch : 'No Batch Available';

        return view('classcontentmanagement::course_class.indexv3', [
            'course_list' => $courseList,
            'batch_title' => $batchTitle
        ]);

        // $courseList = CourseClass::getAllCourseClass();
        // dd($courseList);
        // return view('classcontentmanagement::course_class.index', ['course_list' => $courseList]);
    }

    function getAddCourseClass()
    {
        $allCourses = Course::all();

        return view('classcontentmanagement::course_class.addv3', [
            'allCourses' => $allCourses
        ]);
    }

    function getDuplicateCourseClass()
    {
        $classes = CourseClass::all();
        $classList = [];

        foreach ($classes as $c) {
            $classDetail = CourseClass::getClassDetailByClassId($c->id);
            $classList[] = $classDetail;
        }

        $courseList = Course::all();

        return view('classcontentmanagement::course_class.duplicatev3', [
            'course_list' => $courseList,
            'class_list' => $classList
        ]);
    }

    public function postAddCourseClass(Request $request)
    {
        // Validasi input termasuk slug
        $validated = $request->validate([
            'batch' => 'required',
            'slug' => 'required|unique:course_class,slug', // Pastikan slug unik
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'quota' => 'required|integer|gte:1',
            'ongoing' => 'required',
            'semester' => 'required|numeric|min:1'
        ]);
        // dd($request->all());

        // Jika validasi berhasil
        if ($validated) {
            // Input data ke database
            $create = CourseClass::create([
                'batch' => $request->batch,
                'slug' => $request->slug, // Slug disimpan di database
                'credits' => $request->credits,
                'duration' => $request->duration,
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'course_id' => $request->course_id,
                'announcement' => $request->announcement,
                'semester' => $request->semester,
                'content' => $request->content,
                'description' => $request->description,
                'status_ongoing' => $request->ongoing,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            // Redirect atau feedback berdasarkan hasil create
            if ($create) {
                session()->flash('class_added', 'Kelas berhasil ditambahkan! Silakan tambahkan modul kelas.');
                return app(HelperController::class)->Positive('getCourseClass');
            }
        }
    }


    public function postDuplicateCourseClass(Request $request)
    {
        $courseClass = CourseClass::where('id', $request->course_class_id)->first();
        $courseClass->batch = $request->batch;
        $courseClass->course_id = $request->course_id;

        // insert course class yang telah diubah
        $newCourseClass = $courseClass->replicate();

        // Memeriksa jika start_date tidak valid dan menggantinya dengan tanggal hari ini
        if ($newCourseClass->start_date == '0000-00-00') {
            $currentDate = date('Y-m-d');
            $newCourseClass->start_date = $currentDate;
        }
        // Memeriksa jika end_date tidak valid dan menggantinya dengan tanggal hari ini
        if ($newCourseClass->end_date == '0000-00-00') {
            $currentDate = date('Y-m-d');
            $newCourseClass->end_date = $currentDate;
        }
        // mengubah status dari class baru
        if ($request->status == null) {
            $newCourseClass->status = 0;
        } else {
            $newCourseClass->status = 1;
        }

        $newCourseClass->save();

        // mengambil id course class yang barusan dibuat
        $lastCourseClassId = CourseClass::orderBy('id', 'desc')->first();

        // mengambil id course class module yang ingin di duplicate
        $courseClassModule = CourseClassModule::where('course_class_id', $request->course_class_id)->get();

        // Duplicate setiap course class module
        foreach ($courseClassModule as $module) {
            $newModule = $module->replicate();
            $newModule->course_class_id = $lastCourseClassId->id;

            // Memeriksa jika start_date tidak valid dan menggantinya dengan waktu hari ini
            if ($newModule->start_date == '0000-00-00 00:00:00') {
                $newModule->start_date = now();
            }
            // Memeriksa jika end_date tidak valid dan menggantinya dengan waktu hari ini
            if ($newModule->end_date == '0000-00-00 00:00:00') {
                $newModule->end_date = now();
            }

            $newModule->save();
        }

        return app(HelperController::class)->Positive('getCourseClass');
    }

    function getEditCourseClass(Request $request)
    {
        $courseClassId = $request->id;
        $courseClassDetail = CourseClass::getClassDetailByClassId($courseClassId);

        $courseList = Course::get();

        return view('classcontentmanagement::course_class.editv3', [
            'course_class_detail' => $courseClassDetail,
            'course_list' => $courseList
        ]);
    }

    public function postEditCourseClass(Request $request)
    {
        // Validasi input termasuk slug
        $validated = $request->validate([
            'batch' => 'required',
            'slug' => 'required|unique:course_class,slug,' . $request->id, // Slug unik kecuali milik sendiri
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'quota' => 'required|integer|gte:1',
            'ongoing' => 'required',
            'semester' => 'required|numeric|min:1'
        ]);

        // Update data course class
        $courseClassId = $request->id;

        $updateData = CourseClass::where('id', $courseClassId)
            ->update([
                'batch' => $request->batch,
                'slug' => $request->slug, // Slug disimpan di database
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'credits' => $request->credits,
                'duration' => $request->duration,
                'course_id' => $request->course_id,
                'announcement' => $request->announcement,
                'semester' => $request->semester,
                'content' => $request->content,
                'status_ongoing' => $request->ongoing ? $request->ongoing : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);

        // Redirect atau feedback berdasarkan hasil update
        if ($updateData) {
            return app(HelperController::class)->Positive('getCourseClass');
        } else {
            return app(HelperController::class)->Warning('getCourseClass');
        }
    }

    public function index()
    {
        return view('classcontentmanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('classcontentmanagement::create');
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
        return view('classcontentmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('classcontentmanagement::edit');
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
