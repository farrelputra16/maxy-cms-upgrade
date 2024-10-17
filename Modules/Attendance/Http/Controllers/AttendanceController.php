<?php

namespace Modules\Attendance\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Attendance\Entities\CourseClassAttendance;
use Modules\Attendance\Entities\MemberAttendance;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\Enrollment\Entities\CourseClassMember;

class AttendanceController extends Controller
{
    public function getCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        $attendance_list = CourseClassAttendance::getAttendanceByClassId($request->id);
        $class = CourseClass::getClassDetailByClassId($request->id);

        // auto generate student attendance (preventing error if student enrolls mid class)
        MemberAttendance::generateMemberAttendance($request->id);

        // dd($attendance_list);
        return view('attendance::course_class_attendance.index', [
            'attendance' => $attendance_list,
            'class' => $class,
        ]);
    }
    public function getAddCourseClassAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);

        return view('attendance::course_class_attendance.add', [
            'class' => $class
        ]);
    }
    public function postAddCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
           'name' => 'required',
        ]);
        
        try {
            // create new class attendance
            $attendance = new CourseClassAttendance();
            $attendance->name = $request->name;
            $attendance->course_class_module_id = $request->day;
            $attendance->question = '[{"question":"apakah pengajar hadir tepat waktu?","type":"radio","option":["yes","no"]},{"question":"apakah materi pembelajaran jelas dan sesuai?","type":"radio","option":["tidak jelas","cukup jelas","jelas","sangat jelas"]},{"question":"apa saran/pendapatmu terhadap pembelajaran di pertemuan ini?","type":"text"}]';
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->created_id = Auth::user()->id;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('success', 'new attendance created successfully');
        } catch (\Exception $e) {
            return redirect()->route('getCourseClassAttendance', ['id' => $request->class_id])->with('error', 'failed to create new attendance: ' . $e->getMessage());
        }
    }
    public function getEditCourseClassAttendance(Request $request)
    {
        // dd($request->all());

        $class = CourseClass::getClassDetailByClassId($request->class_id);
        $attendance = CourseClassAttendance::find($request->id);

        return view('attendance::course_class_attendance.edit', [
            'attendance' => $attendance,
            'class' => $class
        ]);
    }
    public function postEditCourseClassAttendance(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
         ]);

        try {
            // edit class attendance
            $attendance = CourseClassAttendance::find($request->attendance_id);
            $attendance->name = $request->name;
            $attendance->course_class_module_id = $request->day;
            $attendance->question = '[{"question":"apakah pengajar hadir tepat waktu?","type":"radio","option":["yes","no"]},{"question":"apakah materi pembelajaran jelas dan sesuai?","type":"radio","option":["tidak jelas","cukup jelas","jelas","sangat jelas"]},{"question":"apa saran/pendapatmu terhadap pembelajaran di pertemuan ini?","type":"text"}]';
            $attendance->description = $request->description ? $request->description : '';
            $attendance->status = $request->status ? $request->status : 0;
            $attendance->created_id = Auth::user()->id;
            $attendance->updated_id = Auth::user()->id;

            $attendance->save();

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
        return view('attendance::course_class_member_attendance.index', [
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

        return view('attendance::course_class_member_attendance.edit', [
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
        return view('attendance::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('attendance::create');
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
        return view('attendance::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('attendance::edit');
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
