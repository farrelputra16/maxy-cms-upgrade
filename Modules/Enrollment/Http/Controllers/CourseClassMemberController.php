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
use App\Models\MJobdesc;
use App\Models\Partner;
use Yajra\DataTables\Facades\DataTables;

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
        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->where('status', 1)->value('id');
        if ($courseClassDetail->course_type_id == $mbkmType) {
            $courseClassMembers = CourseClassMember::getCourseClassMemberMbkm($request);
        } else {
            $courseClassMembers = CourseClassMember::getCourseClassMember($request);
        }
        // dd($courseClassMembers);

        return view('enrollment::course_class_member.indexv3', [
            'users' => $users,
            'courseClassMembers' => $courseClassMembers,
            'courseClassDetail' => $courseClassDetail,
            'mbkmType' => $mbkmType,
            'idCourseClass' => $idCourseClass
        ]);
    }

    public function getCourseClassMemberData(Request $request)
    {
        $idCourse = $request->input('id');
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id'
        ];

        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $courseClassMembers = DB::table('course_class_member')
            ->select(
                'course_class_member.id AS id',
                'course_class_member.description AS description',
                'course_class_member.status AS status',
                'course_class_member.created_at AS created_at',
                'course_class_member.created_id AS created_id',
                'course_class_member.updated_at AS updated_at',
                'course_class_member.updated_id AS updated_id',
                'users.id AS user_id',
                'users.name AS user_name',
                'users.email AS user_email',
                'course_class.batch AS course_class_batch',
                'course.name AS course_name',
                'm_partner.name AS partner_name'
            )
            ->join('users', 'course_class_member.user_id', '=', 'users.id')
            ->join('course_class', 'course_class_member.course_class_id', '=', 'course_class.id')
            ->join('course', 'course_class.course_id', '=', 'course.id')
            ->leftJoin('m_partner', 'course_class_member.m_partner_id', '=', 'm_partner.id')
            ->leftJoin('user_mentorships', function ($join) {
                $join->on('course_class_member.user_id', '=', 'user_mentorships.mentor_id')
                    ->where('users.type', '=', 'tutor');
            })
            ->where('course_class_member.course_class_id', $idCourse);

        // Global search
        if (!empty($searchValue)) {
            $courseClassMembers->where(function($query) use ($searchValue) {
                $query->where('users.name', 'like', "%{$searchValue}%")
                    ->orWhere('users.email', 'like', "%{$searchValue}%")
                    ->orWhere('course.name', 'like', "%{$searchValue}%")
                    ->orWhere('m_partner.name', 'like', "%{$searchValue}%");
            });
        }

        // Column-specific search
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];

            if (!empty($columnSearchValue) && $columnName !== 'action') {
                switch ($columnName) {
                    case 'user_name':
                        $courseClassMembers->where('users.name', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'user_email':
                        $courseClassMembers->where('users.email', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'course_name':
                        $courseClassMembers->where('course.name', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'partner_name':
                        $courseClassMembers->where('m_partner.name', 'like', "%{$columnSearchValue}%");
                        break;
                    case 'status':
                        $courseClassMembers->where('course_class_member.status', $columnSearchValue);
                        break;
                }
            }
        }

        // Ordering
        $courseClassMembers->orderBy($finalOrderColumn, $orderDirection);

        return DataTables::of($courseClassMembers)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('user_name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->user_name) . '">'
                    . \Str::limit(e($row->user_name), 30)
                    . '</span>';
            })
            ->addColumn('user_email', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->user_email) . '">'
                    . \Str::limit(e($row->user_email), 30)
                    . '</span>';
            })
            ->addColumn('course_name', function ($row) {
                return $row->course_name . ' ' . $row->course_class_batch;
            })
            // ->addColumn('course_class_batch', function ($row) {
            //     return $row->course_class_batch;
            // })
            ->addColumn('partner_name', function ($row) {
                return $row->partner_name ?? '-';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->description) . '">'
                    . (!empty($row->description) ? \Str::limit(e($row->description), 30) : '-')
                    . '</span>';
            })
            ->addColumn('status', function ($row) {
                return '<button
                    class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                    data-id="' . $row->id . '"
                    data-status="' . $row->status . '"
                    data-model="CourseClassMember">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) use ($idCourse) {
                return '<a href="' . route('getEditCourseClassMember', ['course_class_member' => $row->id]) . '"
                        class="btn btn-primary rounded">Ubah</a>
                        <a href="' . route('getGenerateCertificate', ['course_class_member' => $row->id, 'user' => $row->user_id, 'course_class' => $idCourse]) . '"
                                            class="btn btn-info rounded">Buat Sertifikat</a>'. " " .
                        '<a href="' . route('getCCMH', ['user_id' => $row->user_id]) . '"
                            class="btn btn-info rounded">Riwayat</a>';
            })
            ->rawColumns(['user_name', 'user_email', 'description', 'status', 'action'])
            ->make(true);
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
        $partners = Partner::where('status', 1)->get();

        $mentors = User::where('access_group_id', '!=', 2)
            ->select('id', 'name', 'email')
            ->get();

        $jobdescriptions = MJobdesc::where('status', 1)->get();
        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->where('status', 1)->value('id');

        return view('enrollment::course_class_member.addv3', [
            'users' => $filteredUsers,
            'course_class_detail' => $course_class_detail,
            'mentors' => $mentors,
            'jobdescriptions' => $jobdescriptions,
            'partners' => $partners,
            'mbkmType' => $mbkmType
        ]);
    }

    function postAddCourseClassMember(Request $request)
    {
        $request->validate([
            'users' => 'required',
            'mentor.*' => 'required',
            'jobdesc.*' => 'required',
        ]);

        $users = $request->users;
        $mentors = $request->mentor;
        $jobdescs = $request->jobdesc; // Mengambil jobdesc dari permintaan

        foreach ($mentors as $mentor) {
            if (is_null($mentor) || $mentor === '') {
                return back()->withInput()->with('error', 'Enrollment failed. Silahkan masukkan dosen.');
            }
        }

        foreach ($jobdescs as $jobdesc) {
            if (is_null($jobdesc) || $jobdesc === '') {
                return back()->withInput()->with('error', 'Gagal Menambahkan Peserta, berikan deskripsi pekerjaan untuk setiap dosen');
            }
        }

        $courseClassId = $request->course_class;
        $courseClass = CourseClass::where('id', $courseClassId)->with(['course.type'])->first();

        foreach ($users as $user) {
            $existingUser = CourseClassMember::checkExistingCCM($user, $courseClassId);
            $alreadyLimitMbkm = CourseClassMember::checkLimitMBKM($user);

            if ($existingUser) {
                return redirect()->route('getCourseClassMember', ['id' => $courseClassId])->with('error', 'Gagal Menambahkan Peserta, peserta sudah ada');
            } else if ($alreadyLimitMbkm && $courseClass->course->type->slug == 'mbkm') {
                return redirect()->route('getCourseClassMember', ['id' => $courseClassId])->with('error', 'Gagal Menambahkan Peserta, pengguna telah mencapai batas MBKM');
            }else if ($request->partner) {
                $created = CourseClassMember::create([
                    'user_id' => $user,
                    'course_class_id' => $courseClassId,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'm_partner_id' => $request->partner,
                    'created_id' => auth()->id(),
                    'updated_id' => auth()->id(),
                ]);
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

            if ($created) {
                foreach ($mentors as $index => $mentor) {
                    if ($mentor){
                        DB::table('user_mentorships')->insert([
                            'member_id' => $user, // mentee
                            'mentor_id' => $mentor, // mentor
                            'course_class_id' => $courseClassId, // kelas yang terkait
                            'm_jobdesc_id' => $request->jobdesc[$index],
                            'created_id' => auth()->id(),
                            'updated_id' => auth()->id(),
                        ]);
                    }
                }
            }
        }

        if ($created) {
            return redirect()->route('getCourseClassMember', ['id' => $courseClassId])->with('success', 'Sukses menambahkan peserta');
        } else {
            return redirect()->route('getCourseClassMember', ['id' => $courseClassId])->with('error', 'Gagal Menambahkan Peserta, silahkan coba lagi');
        }
    }


    function getEditCourseClassMember(Request $request, CourseClassMember $courseClassMember)
    {
        $course_class_detail = CourseClass::getClassDetailByClassId($courseClassMember->course_class_id);
        $users = $courseClassMember->user_id;
        $currentMentors = DB::table('user_mentorships')
            ->where('member_id', $users)
            ->where('course_class_id', $courseClassMember->course_class_id)
            ->select('mentor_id', 'm_jobdesc_id')
            ->get();
        // dd($courseClassMember);
        $mentors = User::where('access_group_id', '!=', 2)
        ->select('id', 'name', 'email')
        ->get();

        $jobdescriptions = MJobdesc::where('status', 1)->get();
        $partners = Partner::where('status', 1)->get();
        $mbkmType = DB::table('m_course_type')->where('slug', 'mbkm')->where('status', 1)->value('id');

        return view('enrollment::course_class_member.editv3', compact('courseClassMember', 'course_class_detail', 'users', 'mentors', 'currentMentors', 'jobdescriptions', 'partners', 'mbkmType'));
    }

    function postEditCourseClassMember(Request $request)
    {
        $request->validate([
            'mentor' => 'required|array',
            'mentor.*' => 'required|exists:users,id',
            'jobdesc.*' => 'required',
        ]);

        // dd($request->all());
        $mentors = $request->mentor;
        $jobdescs = $request->jobdesc; // Mengambil jobdesc dari permintaan

        foreach ($mentors as $mentor) {
            if (is_null($mentor) || $mentor === '') {
                return back()->withInput()->with('error', 'Enrollment failed. Please enter a mentor.');
            }
        }

        foreach ($jobdescs as $jobdesc) {
            if (is_null($jobdesc) || $jobdesc === '') {
                return back()->withInput()->with('error', 'Gagal Menambahkan Peserta, please provide a job description for each mentor');
            }
        }

        if ($request->partner) {
            $update = CourseClassMember::where('id', $request->id)
            ->update([
                'daily_score' => $request->daily_score,
                'absence_score' => $request->absence_score,
                'hackathon_1_score' => $request->hackathon_1_score,
                'hackathon_2_score' => $request->hackathon_2_score,
                'internship_score' => $request->internship_score,
                'final_score' => $request->final_score,
                'm_partner_id' => $request->partner,
                'description' => $request->content,
                'status' => $request->status ? 1 : 0,
                'updated_at' => now(),
                'updated_id' => Auth::user()->id,
        ]);
        } else {
            $update = CourseClassMember::where('id', $request->id)
            ->update([
                'daily_score' => $request->daily_score,
                'absence_score' => $request->absence_score,
                'hackathon_1_score' => $request->hackathon_1_score,
                'hackathon_2_score' => $request->hackathon_2_score,
                'internship_score' => $request->internship_score,
                'final_score' => $request->final_score,
                'description' => $request->content,
                'status' => $request->status ? 1 : 0,
                'updated_at' => now(),
                'updated_id' => Auth::user()->id,
            ]);
        }

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
                            'm_jobdesc_id' => $request->jobdesc[$index],
                            'course_class_id' => $request->cc_id,
                            'created_id' => auth()->id(),
                            'updated_id' => auth()->id(),
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
