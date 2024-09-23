<?php

namespace Modules\ClassContentManagement\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ClassContentManagement\Entities\ClassAttendance;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\ClassContentManagement\Entities\MemberAttendance;
use Modules\Enrollment\Entities\CourseClassMember;

class AttendanceController extends Controller
{
    public function getCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        $attendance_list = ClassAttendance::getAttendanceByClassId($request->id);
        $class = CourseClass::getClassDetailByClassId($request->id);

        // dd($attendance_list);
        return view('classcontentmanagement::course_class_attendance.indexv3', [
            'attendance' => $attendance_list,
            'class' => $class,
        ]);
    }
    public function getAddCourseClassAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);

        return view('classcontentmanagement::course_class_attendance.addv3', [
            'class' => $class
        ]);
    }
    public function postAddCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        try {
            // create new class attendance
            $attendance = new ClassAttendance();
            $attendance->name = $request->name;
            $attendance->course_class_module_id = $request->day;
            $attendance->question = '[{"question":"apakah pengajar hadir tepat waktu?","type":"radio","option":["yes","no"]},{"question":"apakah materi pembelajaran jelas dan sesuai?","type":"radio","option":["tidak jelas","cukup jelas","jelas","sangat jelas"]},{"question":"apa saran/pendapatmu terhadap pembelajaran di pertemuan ini?","type":"text"}]';
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->created_id = Auth::user()->id;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

            // create member attendance data (default = tidak hadir)
            $members = CourseClassMember::getCCMByCourseClassId($request->class_id);
            foreach ($members as $key => $value) {
                $memberAttendance = new MemberAttendance();
                $memberAttendance->course_class_attendance_id = $attendance->id;
                $memberAttendance->user_id = $value->id;
                $memberAttendance->status = 0;
                $memberAttendance->created_id = Auth::user()->id;
                $memberAttendance->updated_id = Auth::user()->id;

                $memberAttendance->save();
            }

            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('success', 'new attendance created successfully');
        } catch (\Exception $e) {
            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('error', 'failed to create new attendance: ' . $e->getMessage());
        }
    }
    public function getEditCourseClassAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);
        $attendance = ClassAttendance::find($request->id);

        return view('classcontentmanagement::course_class_attendance.editv3', [
            'attendance' => $attendance,
            'class' => $class
        ]);
    }
    public function postEditCourseClassAttendance(Request $request)
    {
        // dd($request->all());

        try {
            // edit class attendance
            $attendance = ClassAttendance::find($request->attendance_id);
            $attendance->name = $request->name;
            $attendance->course_class_module_id = $request->day;
            $attendance->question = '[{"question":"apakah pengajar hadir tepat waktu?","type":"radio","option":["yes","no"]},{"question":"apakah materi pembelajaran jelas dan sesuai?","type":"radio","option":["tidak jelas","cukup jelas","jelas","sangat jelas"]},{"question":"apa saran/pendapatmu terhadap pembelajaran di pertemuan ini?","type":"text"}]';
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->created_id = Auth::user()->id;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

            // create member attendance data if not exist (default = tidak hadir)
            $members = CourseClassMember::getCCMByCourseClassId($request->class_id);
            foreach ($members as $key => $value) {
                $exist = MemberAttendance::where('course_class_attendance_id', $attendance->id)
                    ->where('user_id', $value->id)
                    ->first();

                if (!$exist) {
                    $memberAttendance = new MemberAttendance();
                    $memberAttendance->course_class_attendance_id = $attendance->id;
                    $memberAttendance->user_id = $value->id;
                    $memberAttendance->status = 0;
                    $memberAttendance->created_id = Auth::user()->id;
                    $memberAttendance->updated_id = Auth::user()->id;

                    $memberAttendance->save();
                }
            }

            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('success', 'new attendance updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('error', 'failed to update attendance: ' . $e->getMessage());
        }
    }

    // course class member attendance
    public function getMemberAttendance(Request $request)
    {
        // dd($request->all());
        $attendance = MemberAttendance::getMemberAttendanceByClassAttendanceId($request->class_id, $request->id);
        $class = CourseClass::getClassDetailByClassId($request->class_id);

        // dd($attendance_list);
        return view('classcontentmanagement::course_class_member_attendance.indexv3', [
            'attendance' => $attendance,
            'class' => $class,
            'class_attendance_id' => $request->id,
        ]);
    }
    public function getEditMemberAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);
        $attendance = MemberAttendance::getMemberAttendanceDetailByMemberAttendanceId($request->id);

        return view('classcontentmanagement::course_class_member_attendance.edit', [
            'attendance' => $attendance,
            'class' => $class,
            'class_attendance_id' => $request->class_attendance_id,
        ]);
    }
    public function postEditMemberAttendance(Request $request)
    {
        // dd($request->all());

        try {
            //code...
            $attendance = MemberAttendance::find($request->attendance_id);
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

            return redirect()->route('getMemberAttendance', ['id' => $request->class_attendance_id, 'class_id' => $request->class_id])->with('success', 'member attendance updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('getMemberAttendance', ['id' => $request->class_attendance_id, 'class_id' => $request->class_id])->with('error', 'failed to update member attendance: ' . $e->getMessage());
        }
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
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
