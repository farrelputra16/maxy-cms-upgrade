<?php

namespace Modules\Enrollment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Enrollment\Entities\CourseClassMember;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Modules\Enrollment\Http\Requests\CourseClassMemberRequest;
use Modules\Enrollment\Imports\CourseClassMemberImport;
use Modules\ClassContentManagement\Entities\CourseClass;

class CourseClassMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCourseClassMember(Request $request)
    {
        $idCourseClass = $request->id;
        $users = User::where('access_group_id', 2)->get();
        $courseClassDetail = CourseClass::getClassDetailByClassId($idCourseClass);
        $courseClassMembers = CourseClassMember::getCourseClassMember($request);

        return view('enrollment::course_class_member.index', [
            'users' => $users,
            'courseClassMembers' => $courseClassMembers,
            'courseClassDetail' => $courseClassDetail
        ]);
    }

    function getAddCourseClassMember(Request $request)
    {
        $course_class_id = $request->id;
        $course_class_detail = CourseClass::getClassDetailByClassId($course_class_id);
        $courseClassMembers = CourseClassMember::getCourseClassMember($request);
        $users = User::where('access_group_id', 2)->get();
        $courseClassMemberIds = collect($courseClassMembers)->pluck('user_id')->toArray();
        // Filter out users with the same 'id' as in $courseClassMemberIds
        $filteredUsers = $users->whereNotIn('id', $courseClassMemberIds);
        return view('enrollment::course_class_member.add', [
            'users' => $filteredUsers,
            'course_class_detail' => $course_class_detail
        ]);
    }

    function postAddCourseClassMember(CourseClassMemberRequest $request)
    {
        $users = $request->users; // Mengambil semua pengguna dari permintaan
        $courseClassId = $request->course_class;

        foreach ($users as $user) {
            $existingUser = CourseClassMember::checkExistingCCM($user, $courseClassId);

            if ($existingUser) {
                return redirect()->route('getCourseClassMember', ['id' => $courseClassId])->with('error', 'Failed to Enroll Member, user already exists');
            } else {
                $created = CourseClassMember::create([
                    'user_id' => $user,
                    'course_class_id' => $courseClassId,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'created_id' => auth()->id(),
                    'updated_id' => auth()->id(),
                ]);
            }
        }

        if ($created) {
            return redirect()->route('getCourseClassMember', ['id' => $courseClassId])->with('success', 'Enroll Member Success');
        } else {
            return redirect()->route('getCourseClassMember', ['id' => $courseClassId])->with('error', 'Failed to Enroll Member, please try again');
        }
    }


    function getEditCourseClassMember(Request $request, CourseClassMember $courseClassMember)
    {
        return view('enrollment::course_class_member.edit', compact('courseClassMember'));
    }

    function postEditCourseClassMember(CourseClassMemberRequest $request, CourseClassMember $courseClassMember)
    {
        $courseClassMember->update($request->all() + ['updated_id' => auth()->id()]);
        return redirect()->route('getCourseClassMember', ['id' => $courseClassMember->course_class_id])->with('success', 'Update Class Member Success');
    }

    function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt', // Hanya menerima file CSV
        ]);

        try {
            // Proses impor file CSV
            $import = new CourseClassMemberImport(); // Ganti dengan nama import yang sesuai
            Excel::import($import, $request->file('csv_file'));

            // Redirect dengan pesan sukses jika berhasil
            return redirect()->route('getCourseClass')->with('success', 'Data berhasil diimpor dari file CSV.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            dd('Validation Exception', $e->getMessage()); // Tambahkan pesan ini
        } catch (\Exception $e) {
            dd('Exception', $e->getMessage()); // Tambahkan pesan ini
        }
    }
}
