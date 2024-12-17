<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccessGroup;
use App\Models\MProvince;
use App\Models\Partner;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Imports\UserImport;
use App\Models\CourseClass;
use App\Models\CourseClassMember;
use Illuminate\Support\Facades\DB;
use Modules\Enrollment\Entities\Jobdesc;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    //
    function getUser()
    {
        // $userlist = User::all();
        // return view('userlist.index',['userlist' => $userlist]);

        // $users = User::getAllUserWithAccessGroup();

        return view('user.indexv3');
    }

    function getUserData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];

        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $user = User::select('users.*', 'access_group.name AS accessgroup')
            ->join('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->orderBy($finalOrderColumn, $orderDirection);

        // global search datatable
        // if (!empty($searchValue)) {
        //     $partners->where(function ($q) use ($searchValue, $columns) {
        //         foreach ($columns as $column) {
        //             $columnName = $column['data'];

        //             if (in_array($columnName, ['DT_RowIndex', 'action'])) {
        //                 continue;
        //             } else if ($columnName === 'm_partner_type') {
        //                 $q->orWhereHas('MPartnerType', function ($query) use ($searchValue) {
        //                     $query->where('name', 'like', "%{$searchValue}%");
        //                 });
        //             } else {
        //                 $q->orWhere($columnName, 'like', "%{$searchValue}%");
        //             }
        //         }
        //     });
        // }

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'accessgroup') {
                $user->where('access_group.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $user->where('status', '=', 0);
                else
                    $user->where('user.status', '=', 1);
            } else if ($columnName == 'name') {
                $user->where('users.name', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'description') {
                $user->where('users.description', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'id') {
                $user->where('users.id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_at') {
                $user->where('users.created_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'created_id') {
                $user->where('users.created_id', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_at') {
                $user->where('users.updated_at', 'like', "%{$columnSearchValue}%");
            } else if ($columnName == 'updated_id') {
                $user->where('users.updated_id', 'like', "%{$columnSearchValue}%");
            } else {
                $user->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($user)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('email', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->email), 30)
                    . '</span>';
            })
            ->addColumn('accessgroup', function ($row) {
                return $row->accessgroup;
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->description)) . '">'
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-')
                    . '</span>';
            })
            ->addColumn('date_of_birth', function ($row) {
                return !empty($row->date_of_birth) ? \Str::limit($row->date_of_birth, 30) : '-';
            })
            ->addColumn('phone', function ($row) {
                return $row->phone;
            })
            ->addColumn('address', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->address)) . '">'
                    . (!empty($row->address) ? \Str::limit(strip_tags($row->address), 30) : '-')
                    . '</span>';
            })
            ->addColumn('university', function ($row) {
                return !empty($row->university) ? \Str::limit($row->university, 30) : '-';
            })
            ->addColumn('major', function ($row) {
                return !empty($row->major) ? \Str::limit($row->major, 30) : '-';
            })
            ->addColumn('semester', function ($row) {
                return !empty($row->semester) ? \Str::limit($row->semester, 30) : '-';
            })
            ->addColumn('city', function ($row) {
                return !empty($row->city) ? \Str::limit($row->city, 30) : '-';
            })
            ->addColumn('country', function ($row) {
                return !empty($row->country) ? \Str::limit($row->country, 30) : '-';
            })
            ->addColumn('level', function ($row) {
                return $row->level;
            })
            ->addColumn('supervisor_name', function ($row) {
                return !empty($row->supervisor_name) ? \Str::limit($row->supervisor_name, 30) : '-';
            })
            ->addColumn('supervisor_email', function ($row) {
                return !empty($row->supervisor_email) ? \Str::limit($row->supervisor_email, 30) : '-';
            })
            ->addColumn('ipk', function ($row) {
                return !empty($row->ipk) ? \Str::limit($row->ipk, 30) : '-';
            })
            ->addColumn('religion', function ($row) {
                return !empty($row->religion) ? \Str::limit($row->religion, 30) : '-';
            })
            ->addColumn('hobby', function ($row) {
                return !empty($row->hobby) ? \Str::limit($row->hobby, 30) : '-';
            })
            ->addColumn('citizenship_status', function ($row) {
                return !empty($row->citizenship_status) ? \Str::limit($row->citizenship_status, 30) : '-';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button
                    class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                    data-id="' . $row->id . '"
                    data-status="' . $row->status . '"
                    data-model="User">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditUser', ['id' => $row->id]) . '"
                            class="btn btn-primary rounded">Ubah</a>' . " " .
                        '<a href="' . route('getProfileUser', ['id' => $row->id]) . '"
                            class="btn btn-outline-primary rounded">Profil</a>'. " " .
                        '<a href="' . route('getCCMH', ['user_id' => $row->id]) . '"
                            class="btn btn-info rounded">Riwayat</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'email', 'description', 'address','status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getProfileUser(Request $request)
    {
        // $users = User::with(['UserCertificate', 'UserEducation', 'UserPortofolio', 'MProvince', 'UserExperience', 'UserLanguage', 'UserLanguage.MLanguage', 'courseClassMembers.courseClass'])
        //     ->find($request->id);

        $users = User::with([
            'UserCertificate',
            'UserEducation',
            'UserPortofolio',
            'MProvince',
            'UserExperience',
            'UserLanguage',
            'UserLanguage.MLanguage',
            'courseClassMembers.courseClass' => function ($query) {
                $query->where('status_ongoing', '>', 0);
            }
        ])
            ->find($request->id);
        $father = DB::table('user_parent')
            ->where('user_id', $request->id)
            ->where('type', 'ayah')
            ->first();
        $mother = DB::table('user_parent')
            ->where('user_id', $request->id)
            ->where('type', 'ibu')
            ->first();
        $members = CourseClassMember::with('courseClass.course')
            ->where('user_id', $request->id)
            ->get();

        $courseData = []; // Initialize an array to store course and category data
        $categoryIds = []; // Initialize an array to track category IDs that have been added

        foreach ($members as $member) {
            $courseId = $member->courseClass->course->id;
            $categoryData = DB::table('course_category')
                ->where('course_id', $courseId)
                ->select('category_id')
                ->get();

            foreach ($categoryData as $category) {
                $categoryName = DB::table('m_category_course')
                    ->where('id', $category->category_id)
                    ->value('name'); // Get category name based on category_id

                if (!array_key_exists($categoryName, $courseData)) {
                    // Initialize a new category entry with the category name
                    $courseData[$categoryName] = [
                        'category_id' => $category->category_id,
                        'category_name' => $categoryName,
                        'course_names' => [] // Initialize an array for course names
                    ];
                }

                // Add the course name to the respective category
                if (!in_array($member->courseClass->course->name, $courseData[$categoryName]['course_names'])) {
                    $courseData[$categoryName]['course_names'][] = $member->courseClass->course->name; // Add the course name if it's not already added
                }
            }
        }
        // dd($users);
        $portfolios = DB::table("user_portfolio")
            ->where("user_id", $request->id)
            ->get();

        $courses = $this->getCourseData($request);
        $bimbinganData = $this->getBimbinganData($request);

        return view('user.profilev3', ['currentData' => $users, 'father' => $father, 'mother' => $mother, 'courseData' => $courseData, 'portfolios' => $portfolios, 'bimbinganData' => $bimbinganData, 'courses' => $courses]);
    }

    private function getCourseData($user)
    {
        // Ambil data CourseClassMember dengan relasi courseClass
        $members = CourseClassMember::with('courseClass.course')
            ->where('user_id', $user->id)
            ->get();

        $courseData = []; // Inisialisasi array untuk menyimpan data mata kuliah dan kategori

        foreach ($members as $member) {
            // Ambil course_id dari course_class
            $courseId = $member->courseClass->course->id;

            $schedule = DB::table('schedule')
                ->where('course_class_id', $member->course_class_id)
                ->value('m_academic_period_id');

            $periode = DB::table('m_academic_period')
                ->where('id', $schedule)
                ->value('name');

            // Query ke tabel course_category untuk mendapatkan category_id berdasarkan course_id
            $categoryData = DB::table('course_category')
                ->where('course_id', $courseId)
                ->select('category_id')
                ->get();

            // Ambil nama kategori berdasarkan category_id
            foreach ($categoryData as $category) {
                $categoryName = DB::table('m_category_course')
                    ->where('id', $category->category_id)
                    ->value('name'); // Ambil nama kategori berdasarkan category_id

                $courseData[] = [
                    'course_name' => $member->courseClass->slug,
                    'category_id' => $category->category_id,
                    'category_name' => $categoryName,
                    'sks' => $member->courseClass->course->sks,
                    'periode' => $periode
                ];
            }
        }

        return $courseData;
    }

    private function getBimbinganData($user)
    {
        $members = DB::table('user_mentorships')
            ->where('mentor_id', $user->id)
            ->get();

        // dd($members);

        $bimbinganData = []; // Inisialisasi array bimbinganData

        foreach ($members as $member) {
            $courseName = CourseClass::where('id', $member->course_class_id)->value('slug');

            $mentorJob = DB::table('jobdesc')
                ->where('id', $member->m_jobdesc_id)
                ->value('jobdesc');

            $courseId = CourseClass::where('id', $member->course_class_id)->value('course_id');

            // Query ke tabel course_category untuk mendapatkan category_id berdasarkan course_id
            $categoryData = DB::table('course_category')
                ->where('course_id', $courseId)
                ->value('category_id');

            $categoryName = DB::table('m_category_course')
                ->where('id', $categoryData)
                ->value('name'); // Ambil nama kategori berdasarkan category_id

            $schedule = DB::table('schedule')
                ->where('course_class_id', $member->course_class_id)
                ->value('m_academic_period_id');

            $periode = DB::table('m_academic_period')
                ->where('id', $schedule)
                ->value('name');

            // Buat kombinasi key dari course_name, category_name, dan jobdesc
            $courseCategory = $courseName . '_' . $categoryName . '_' . $mentorJob;

            // Cek apakah courseCategory sudah ada di $bimbinganData
            if (!isset($bimbinganData[$courseCategory])) {
                // Jika belum ada, inisialisasi data dengan jumlah mahasiswa 1
                $bimbinganData[$courseCategory] = [
                    'category_name' => $categoryName,
                    'course_name' => $courseName,
                    'course_id' => $courseId,
                    'mentor_id' => $member->mentor_id,
                    'jobdesc' => $mentorJob,
                    'user_id' => $member->member_id,
                    'jumlah_mahasiswa' => 1,
                    'periode' => $periode
                ];
            } else {
                // Jika course_name sudah ada, tambahkan jumlah mahasiswa
                $bimbinganData[$courseCategory]['jumlah_mahasiswa']++;
            }
        }

        // Mengubah array bimbinganData dari associative array menjadi indexed array
        $bimbinganData = array_values($bimbinganData);

        // dd($bimbinganData);

        return $bimbinganData;
    }

    function getAddUser()
    {
        $allAccessGroups = AccessGroup::where('status', 1)->get();
        $allProvince = MProvince::all();
        $allPartner = Partner::where('status', 1)->get();

        return view('user.addv3', [
            'allAccessGroups' => $allAccessGroups,
            'allProvince' => $allProvince,
            'allPartner' => $allPartner
        ]);
    }

    function postAddUser(Request $request)
    {
        // dd($request->province);
        $fileName = ''; // Inisialisasi variabel $fileName


        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'password' => 'required|min:6',
            'access_group' => 'required',
        ]);

        // Sanitasi input dengan strip_tags
        $name = strip_tags($request->input('name'));

        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/user_profile_pic'), $fileName);
        }

        if ($validated) {
            $passwordcrpyt = bcrypt($validated['password']);
            $create = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => $passwordcrpyt,
                'access_group_id' => $request->access_group,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
                'nickname' => $request->nickname,
                'referal' => $request->referal,
                'date_of_birth' => $request->birth,
                'university' => $request->university,
                'major' => $request->major,
                'semester' => $request->semester,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'm_province_id' => $request->province,
                'linked_in' => $request->linkedin,
                'request' => $request->user_request,
                'profile_picture' => $fileName,
                'm_partner_id' => $request->partner,
                'phone' => $request->phone,
                'address' => $request->address,
                'supervisor_name' => $request->supervisor_name,
                'supervisor_email' => $request->supervisor_email
            ]);
            if ($create) {
                return app(HelperController::class)->Positive('getUser');
            }
            return app(HelperController::class)->Negative('getUser');
        }
    }

    function getEditUser(Request $request)
    {

        $currentData = User::select(
            'users.*',
            'access_group.id AS access_group_id',
            'access_group.name AS access_group_name'
        )
            ->join('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->where('users.id', $request->id)
            ->first();

        // return dd($currentData);

        $allAccessGroups = AccessGroup::where('id', '<>', $currentData->access_group_id)
            ->where('status', 1)
            ->get();
        $allProvince = MProvince::all();
        $allPartner = Partner::where('status', 1)->get();

        return view('user.editv3', [
            'currentData' => $currentData,
            'allAccessGroups' => $allAccessGroups,
            'allProvince' => $allProvince,
            'allPartner' => $allPartner
        ]);
    }

    function postEditUser(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'nickname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'password' => 'nullable|min:6',
            'access_group' => 'required',
        ]);

        // return dd($request);

        // Sanitasi input dengan strip_tags
        $name = strip_tags($request->input('name'));

        if ($validate) {
            $users = User::where('id', $request->id)->first();
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/user_profile_pic'), $fileName);

                $update = User::where('id', $request->id)
                    ->update([
                        'name' => $name,
                        'email' => $request->email,
                        'password' => $request->password ? bcrypt($request->password) : $users->password,
                        'access_group_id' => $request->access_group,
                        'description' => $request->description,
                        'status' => $request->status ? 1 : 0,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id,
                        'nickname' => $request->nickname,
                        'referal' => $request->referal,
                        'date_of_birth' => $request->birth,
                        'university' => $request->university,
                        'major' => $request->major,
                        'semester' => $request->semester,
                        'city' => $request->city,
                        'country' => $request->country,
                        'postal_code' => $request->postal_code,
                        'm_province_id' => $request->province,
                        'linked_in' => $request->linkedin,
                        'request' => $request->user_request,
                        'profile_picture' => $fileName,
                        'm_partner_id' => $request->partner,
                        'phone' => $request->phone,
                        'address' => $request->address
                    ]);
            } else {
                $update = User::where('id', $request->id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => $request->password ? bcrypt($request->password) : $users->password,
                        'access_group_id' => $request->access_group,
                        'description' => $request->description,
                        'status' => $request->status ? 1 : 0,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id,
                        'nickname' => $request->nickname,
                        'referal' => $request->referal,
                        'date_of_birth' => $request->birth,
                        'university' => $request->university,
                        'major' => $request->major,
                        'semester' => $request->semester,
                        'city' => $request->city,
                        'country' => $request->country,
                        'postal_code' => $request->postal_code,
                        'm_province_id' => $request->province,
                        'linked_in' => $request->linkedin,
                        'request' => $request->user_request,
                        'm_partner_id' => $request->partner,
                        'phone' => $request->phone,
                        'address' => $request->address
                    ]);
            }
        }

        if ($update) {
            return app(HelperController::class)->Positive('getUser');
        } else {
            return app(HelperController::class)->Warning('getUser');
        }

        // Perbarui password hanya jika diisi
        if ($request->filled('password')) {
            $currentData->password = bcrypt($request->password);
        }

        // Simpan perubahan
        $currentData->save();
    }

    function importCSV(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt', // Hanya menerima file CSV
        ]);

        try {
            // Proses impor file CSV
            $import = new UserImport(); // Ganti dengan nama import yang sesuai
            Excel::import($import, $request->file('file'));

            // Redirect dengan pesan sukses jika berhasil
            return redirect()->route('getUser')->with('success', 'Data berhasil diimpor dari file CSV.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            dd('Validation Exception', $e->getMessage()); // Tambahkan pesan ini
        } catch (\Exception $e) {
            dd('Exception', $e->getMessage()); // Tambahkan pesan ini
        }
    }
}
