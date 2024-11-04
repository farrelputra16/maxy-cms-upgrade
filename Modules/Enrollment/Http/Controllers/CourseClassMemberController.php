<?php

namespace Modules\Enrollment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Enrollment\Entities\CourseClassMember;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Modules\Enrollment\Http\Requests\CourseClassMemberRequest;
use Modules\Enrollment\Imports\CourseClassMemberImport;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\Enrollment\Entities\Jobdesc;

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
        // dd($courseClassMembers);

        return view('enrollment::course_class_member.indexv3', [
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
        // $users = User::where('access_group_id', 2)->get();
        $users = User::get();
        $courseClassMemberIds = collect($courseClassMembers)->pluck('user_id')->toArray();
        // Filter out users with the same 'id' as in $courseClassMemberIds
        $filteredUsers = $users->whereNotIn('id', $courseClassMemberIds);

        $mentors = User::where('access_group_id', '!=', 2)
            ->select('id', 'name', 'email')
            ->get();

        $jobdescriptions = Jobdesc::all();

        return view('enrollment::course_class_member.addv3', [
            'users' => $filteredUsers,
            'course_class_detail' => $course_class_detail,
            'mentors' => $mentors,
            'jobdescriptions' => $jobdescriptions
        ]);
    }

    function postAddCourseClassMember(Request $request)
    {
        $request->validate([
            'users' => 'required',
            'mentor' => 'required',
        ]);

        $users = $request->users;
        $mentors = $request->mentor;
        $jobdescs = $request->jobdesc; // Mengambil jobdesc dari permintaan
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

                if ($created) {
                    foreach ($mentors as $index => $mentor) {
                        DB::table('user_mentorships')->insert([
                            'member_id' => $user, // mentee
                            'mentor_id' => $mentor, // mentor
                            'course_class_id' => $courseClassId, // kelas yang terkait
                            'jobdesc_id' => $request->jobdesc[$index],
                        ]);
                    }
                }
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
        $users = $courseClassMember->user_id;
        $currentMentors = DB::table('user_mentorships')
            ->where('member_id', $users)
            ->select('mentor_id', 'jobdesc_id')
            ->get();
        // dd($courseClassMember);
        $mentors = User::where('access_group_id', '!=', 2)
        ->select('id', 'name', 'email')
        ->get();

        $jobdescriptions = Jobdesc::all();

        return view('enrollment::course_class_member.editv3', compact('courseClassMember', 'users', 'mentors', 'currentMentors', 'jobdescriptions'));
    }

    function postEditCourseClassMember(Request $request)
    {
        // dd($request->all());
        $update = CourseClassMember::where('id', $request->id)
        ->update([
            'daily_score' => $request->daily_score,
            'absence_score' => $request->absence_score,
            'hackathon_1_score' => $request->hackathon_1_score,
            'hackathon_2_score' => $request->hackathon_2_score,
            'internship_score' => $request->internship_score,
            'final_score' => $request->final_score,
            'jobdesc' => $request->jobdesc,
            'description' => $request->description,
            'status' => $request->status ? 1 : 0,
            'updated_at' => now(),
            'updated_id' => Auth::user()->id,
        ]);

        if($update) {
            // Jika update berhasil, lanjutkan ke bagian update user_mentorships
            // Hapus semua mentor dan jobdesc lama untuk member ini di user_mentorships
            DB::table('user_mentorships')->where('member_id', $request->member_id)->delete();

            // Simpan mentor dan jobdesc baru
            if ($request->mentor && $request->jobdesc) {
                foreach ($request->mentor as $index => $mentorId) {
                    if ($mentorId) { // Pastikan mentorId tidak kosong
                        DB::table('user_mentorships')->insert([
                            'member_id' => $request->member_id,
                            'mentor_id' => $mentorId,
                            'jobdesc_id' => $request->jobdesc[$index],
                            'course_class_id' => $request->cc_id,
                        ]);
                    }
                }
            }

            return redirect()->route('getCourseClassMember', ['id' => $request->cc_id])->with('success', 'Member data updated successfully');
        } else {
            return redirect()->route('getCourseClassMember', ['id' => $request->cc_id])->with('error', 'Failed to update member data');
        }
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
