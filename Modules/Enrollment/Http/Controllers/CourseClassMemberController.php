<?php

namespace Modules\Enrollment\Http\Controllers;

use App\Http\Middleware\Users;
use App\Models\UserCertificate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

use Modules\TrackandGrade\Entities\CourseClassMemberGrading;
use Modules\Enrollment\Entities\CourseClassMember;

use App\Http\Controllers\HelperController;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Modules\Enrollment\Imports\CourseClassMemberImport;

use TCPDF as TCPDF;

use App\Models\CourseModule;
// use Modules\ClassContentManagement\Entities\CourseModule;


use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\ClassContentManagement\Entities\CourseClassModule;

class CourseClassMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCourseClassMember(Request $request)
    {
        $idCourseClass = $request->id;
        // dd($course_class_detail);
        $users = User::where('access_group_id', 2)->get();
        $course_class_detail = CourseClass::getClassDetailByClassId($idCourseClass);
        // dd($course_class_detail);
        $courseClassMembers = CourseClassMember::getCourseClassMember($request);
        // dd($courseClassMembers);

        return view('enrollment::course_class_member.index', [
            'users' => $users,
            'courseClassMembers' => $courseClassMembers,
            'course_class_detail' => $course_class_detail
        ]);
    }

    function getAddCourseClassMember(Request $request)
    {
        $course_class_id = $request->id;
        $course_class_detail = CourseClass::getClassDetailByClassId($course_class_id);
        // Get all users with access_group_id = 2
        $users = User::where('access_group_id', 2)->get();
        // Extract the 'id' values from $courseClassMembers
        $courseClassMemberIds = collect($courseClassMembers)->pluck('user_id')->toArray();
        // Filter out users with the same 'id' as in $courseClassMemberIds
        $filteredUsers = $users->whereNotIn('id', $courseClassMemberIds);
        return view('enrollment::course_class_member.add', [
            'users' => $filteredUsers,
            'course_class_detail' => $course_class_detail
        ]);
    }

    function postAddCourseClassMember(Request $request)
    {
        // dd($request->all());
        $existingUser = CourseClassMember::checkExistingCCM($request->users, $request->course_class);
        // dd($existingUser);
        if ($existingUser) {
            return redirect()->route('getCourseClassMember', ['id' => $request->course_class])->with('error', 'Failed to Enroll Member, user already exists');
        } else {
            $created = CourseClassMember::create([
                'user_id' => $userId,
                'course_class_id' => $request->course_class,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($created) {
                return redirect()->route('getCourseClassMember', ['id' => $request->course_class])->with('success', 'Enroll Member Success');
            } else {
                return redirect()->route('getCourseClassMember', ['id' => $request->course_class])->with('error', 'Failed to Enroll Member, please try again');
            }
        }
        if (!empty($createdMembers)) {
            return redirect()->route('getCourseClassMember', ['id' => $request->course_class])->with('success', 'Enroll Members Success');
        } else {
            return redirect()->route('getCourseClassMember', ['id' => $request->course_class])->with('error', 'Failed to Enroll Members, please try again');
        }
    }

    function getEditCourseClassMember(Request $request)
    {

        $currentData = CourseClassMember::getEditCourseClassMember($request);

        // return dd($currentData);

        $result = CourseClass::getEditCourseClassMemberCourseandClasses($currentData);

        $currentDataCourse = $result['currentDataCourse'];
        $allCourseClasses = $result['allCourseClasses'];

        $ccmMemberId = $currentData[0]->ccm_member_id;

        $allMembers = User::where('id', '!=', $ccmMemberId)->get();

        return view('enrollment::course_class_member.edit', [
            'currentData' => $currentData,
            'currentDataCourse' => $currentDataCourse,
            'allCourseClasses' => $allCourseClasses,
            'allMembers' => $allMembers
        ]);
    }

    function postEditCourseClassMember(Request $request)
    {
        $update = CourseClassMember::where('id', '=', $request->id)
            ->update([
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'updated_id' => Auth::user()->id
            ]);

        if ($update) {
            return redirect()->route('getCourseClassMember', ['id' => $request->course_class])->with('success', 'Update Class Member Success');
        } else {
            return redirect()->route('getCourseClassMember', ['id' => $request->course_class])->with('error', 'Failed to Enroll Member, please try again');
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
            return redirect()->route('getCourseClassMember')->with('success', 'Data berhasil diimpor dari file CSV.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            dd('Validation Exception', $e->getMessage()); // Tambahkan pesan ini
        } catch (\Exception $e) {
            dd('Exception', $e->getMessage()); // Tambahkan pesan ini
        }
    }

    public function getCertificate(Request $request, CourseClassMember $courseClassMember, CourseClassMemberGrading $courseClassMemberGrading, CourseClassModule $courseClassModule, CourseClass $courseClass, CourseModule $courseModule)
    {
        $idCourseClass = $courseClassMember->course_class_id;
        $course_class_detail = CourseClass::getClassDetailByClassId($idCourseClass);
        // dd($course_class_detail);


        $course_id = $course_class_detail->course_id;

        $courseName = $course_class_detail->course_name;
        $userName = $courseClassMember->user->name;
        $userId = $courseClassMember->user->id;
        // dd($userId);

        // $courseModulesDefKompeten = CourseModule::where('course_id', $course_id)
        //     ->where('type', 'parent')
        //     ->select('content', 'name', 'day', 'duration')
        //     ->get()
        //     ->filter(function ($item) {
        //         return isset($item->content, $item->name, $item->day, $item->duration);
        //     })
        //     ->toArray();

        $modules = $courseClassMember->courseClass->modules;
        // dd($modules);
        // $nilai = courseClassMembers
        // return view('enrollment::course_class_member.template-kompetensi', [
        //     'modules' => $modules
        // ]);
        // return view('enrollment::course_class_member.template-certificate', [
        //     'courseName' => $courseName,
        //     'userName' => $userName,

        // ]);

        // CODE DIBAWAH UDAH FIX Start

        // Cek apakah pengguna ditemukan

        if (!$userName) {
            abort(404); // Atau cara penanganan error lainnya sesuai kebutuhan Anda
        }
        // Baca template sertifikat dalam format PNG
        $templatePath = public_path('sertifikat/1.png');
        $templateImage = imagecreatefrompng($templatePath);

        // Tambahkan nama pengguna ke sertifikat
        $fontPathName = public_path('font/OpenSans-Bold.ttf');
        $fontColorName = imagecolorallocate($templateImage, 0, 0, 0); // Warna teks (hitam)
        $fontSizeName = 100; // Sesuaikan ukuran font sesuai kebutuhan

        // Tambahkan Nama Course ke sertifikat
        $fontPathCourse = public_path('font/OpenSans-Bold.ttf');
        $fontColorCourse = imagecolorallocate($templateImage, 0, 0, 0); // Warna teks (hitam)
        $fontSizeCourse = 100; // Sesuaikan ukuran font sesuai kebutuhan

        // Ukuran gambar sertifikat
        $imageWidth = imagesx($templateImage);
        $imageHeight = imagesy($templateImage);

        // Ukuran teks Nama
        $textBoundingBoxName = imagettfbbox($fontSizeName, 0, $fontPathName, $userName); // Ubah
        $textWidthName = $textBoundingBoxName[2] - $textBoundingBoxName[0];
        $textHeightName = $textBoundingBoxName[1] - $textBoundingBoxName[7];

        // Ukuran teks Course
        $textBoundingBoxCourse = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $courseName); // Ubah $courseNames sesuai dengan nama course
        $textWidthCourse = $textBoundingBoxCourse[2] - $textBoundingBoxCourse[0];
        $textHeightCourse = $textBoundingBoxCourse[1] - $textBoundingBoxCourse[7];

        // Koordinat untuk menampilkan nama teks di tengah gambar
        $xName = ($imageWidth - $textWidthName) / 2;
        $yName = ($imageHeight - $textHeightName) / 2;

        // Koordinat untuk menampilkan teks course
        $xCourse = ($imageWidth - $textWidthCourse) / 2;
        $yCourse = $yName + $textHeightCourse - 450; // Sesuaikan angka 10 sesuai kebutuhan untuk memberi jarak antara teks nama dan teks course

        // Tambahkan teks nama pengguna di tengah gambar
        imagettftext($templateImage, $fontSizeName, 0, $xName, $yName, $fontColorName, $fontPathName, \Str::title($userName));
        imagettftext($templateImage, $fontSizeCourse, 0, $xCourse, $yCourse, $fontColorCourse, $fontPathCourse, \Str::title($courseName));

        // Set header untuk respons HTTP
        header('Content-Type: image/png');

        // Simpan gambar yang telah diedit ke direktori sertifikat

        $certificateName = uniqid() . '_' . $userName;
        $outputPath = public_path('sertifikat/' . $certificateName . '_certificate.png'); // Ubah $user->name menjadi $user->user->name
        imagepng($templateImage, $outputPath);

        // Buat objek PDF
        $pdf = new TCPDF();

        // Tambahkan halaman dengan ukuran kertas
        $pdf->AddPage('L', array($imageWidth, $imageHeight));

        // Tampilkan gambar pada PDF
        $pdf->Image($outputPath, 10, 10, $imageWidth, $imageHeight, 'PNG');

        // Output ke file PDF
        $pdf->Output(public_path('sertifikat/' . $certificateName . '_certificate.pdf'), 'F');

        $urlCredential = env("APP_URL") . '/sertifikat/' . $certificateName;

        UserCertificate::create([
            'name' => $courseName,
            'company' => '',
            'id_credential' => '',
            'url_credential' => $urlCredential,
            'start_date' => now()->format('Y-m-d'),
            'end_date' => now()->format('Y-m-d'),
            'description' => '',
            'user_id' => $courseClassMember->user->id,
        ]);

        // Tampilkan gambar yang telah diedit sebagai respons langsung
        imagepng($templateImage);


        // Hapus gambar dari memori
        imagedestroy($templateImage);



        $pdf = PDF::loadView('enrollment::course_class_member.template-kompetensi', [
            'course_id' => $course_id,
            'modules' => $modules,

        ])->setPaper('a4', 'landscape');

        $kompensiName = uniqid() . '_' . $userName;
        $pdf->save(public_path('sertifikat/' . $kompensiName . '_kompetensi.pdf'));


        $urlCredential = env("APP_URL") . '/sertifikat/' . $kompensiName;

        UserCertificate::create([
            'name' => $courseName,
            'company' => '',
            'id_credential' => '',
            'url_credential' => $urlCredential,
            'start_date' => now()->format('Y-m-d'),
            'end_date' => now()->format('Y-m-d'),
            'description' => '',
            'user_id' => $courseClassMember->user->id,
        ]);
        return $kompensiName;

        // END CODE Diatas UDAH FIX
    }

    public function index()
    {
        return view('enrollment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('enrollment::create');
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
        return view('enrollment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('enrollment::edit');
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
