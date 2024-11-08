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

class UserController extends Controller
{
    //
    function getUser()
    {
        // $userlist = User::all();
        // return view('userlist.index',['userlist' => $userlist]);

        $users = User::getAllUserWithAccessGroup();

        return view('user.indexv3', ['users' => $users]);
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

        $courseData = []; // Inisialisasi array untuk menyimpan data kursus dan kategori

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

            $mentorJob = Jobdesc::where('id', $member->jobdesc_id)->value('jobdesc');

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
        $allAccessGroups = AccessGroup::all();
        $allProvince = MProvince::all();
        $allPartner = Partner::all();

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
            'password' => 'required|min:5',
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

        $allAccessGroups = AccessGroup::where('id', '<>', $currentData->access_group_id)->get();
        $allProvince = MProvince::all();
        $allPartner = Partner::all();

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
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
            'password' => 'required',
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
                        'password' => $request->password != $users->password ? bcrypt($request->password) : $request->password,
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
                        'password' => $request->password != $users->password ? bcrypt($request->password) : $request->password,
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
