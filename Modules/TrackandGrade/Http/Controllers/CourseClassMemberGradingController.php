<?php

namespace Modules\TrackandGrade\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\TrackandGrade\Entities\CourseClassMemberGrading;
use Modules\TrackandGrade\Entities\CourseClassMemberLog;

use App\Http\Controllers\HelperController;
use App\Models\CourseModule;
use App\Models\Course;
use Carbon\Carbon;
use app\models\User;

class CourseClassMemberGradingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    function getCCMHGrade()
    {
        $ccmh = CourseClassMemberGrading::distinct()
            ->orderByDesc('created_at')
            ->get();

        $courseNames = Course::select('name')->get();

        dd($ccmh);

        $day = CourseModule::select('day')
            ->where('day', '!=', '')
            ->whereNotNull('day')
            ->groupBy('day')
            ->get();

        return view('trackandgrade::course_class_member_grading.index', compact('ccmh', 'courseNames', 'day'));
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
        return view('course_class_member_grading.edit', compact('courseClassMemberGrading'));
    }

    function postEditCCMH(Request $request, CourseClassMemberGrading $courseClassMemberGrading)
    {
        $waktuSaatIni = Carbon::now();
        $waktuSaatIni->setTimezone('Asia/Jakarta');

        // Mengambil jam dalam zona waktu yang telah diatur di .env
        $jamDiZonaWaktuAnda = $waktuSaatIni->format('Y-m-d H:i:s');

        $updateData = $courseClassMemberGrading
            ->update([
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

    // function getCertificate(Request $request, $userId){
    //     $user = CourseClassMemberGrading::all();
    //     // $userName = $user->name;
    //     // $userName = $user->user_Id;
    // $courseNames = Course::select('name')->get();
    //     // $user = CourseClassMemberGrading::find($userId); 
    //     // dd($courseNames);
    //     // $ccmh = CourseClassMemberGrading::distinct()
    //     //     ->orderByDesc('created_at')
    //     //     ->get();
    //     // dd($user);
    //     // dd($ccmh->user->name);
    //     // dd($ccmh->user_id);
    //     // dd($ccmh->user_id->name);
    //     // dd($courseNames);
    //     // dd($userName);
    //     // dd($user->user_Id);

    //     // if ($courseNames === 'Bootcamp') {
    //     //     $templatePath = public_path('sertifikat/template_sertifikat_bootcamp.png');
    //     //     $templateImage = imagecreatefrompng($templatePath);
    //     // } else {

    //     // }
    // }

    public function getCertificate(CourseClassMemberGrading $courseClassMemberGrading)
    {
        // Dapatkan data pengguna dari database berdasarkan $userId
        // dd($courseClassMemberGrading);

        // dump($courseClassMemberGrading->courseClassModule->courseModule->course->name);
        // dump($courseClassMemberGrading->user->name);    
        // $userName = $courseClassMemberGrading->user->name;
        // $courseNames= $courseClassMemberGrading->courseClassModule->courseModule->course->name;
        // $courseType = $courseClassMemberGrading->courseClassModule->courseModule->course;
        $type = $courseClassMemberGrading->courseClassModule->courseModule->course->type->name;
        // dd($type);
        // dd($courseType);
        // $type = 'Mini Bootcamp';

        if ($type === 'Bootcamp') {
            $this->getCertifBootcamp($courseClassMemberGrading);
            // $this->getCertifKompetensi($courseClassMemberGrading);
        } elseif ($type === 'Mini Bootcamp') {
            $this->getCertifMiniBootcamp($courseClassMemberGrading);
        } elseif ($type === 'Prakerja') {
            $this->getCertifPrakerja($courseClassMemberGrading);
        } elseif ($type === 'Upskilling') {
            $this->getCertifUpskilling($courseClassMemberGrading);
        }
    }

    private function getCertifBootcamp(CourseClassMemberGrading $courseClassMemberGrading)
    {
        $userName = $courseClassMemberGrading->user->name;
        $courseNames = $courseClassMemberGrading->courseClassModule->courseModule->course->name;
        $COBA='Implement Social OAuth, Two Factor Authentication, and SEO Management';
        // Cek apakah pengguna ditemukan
        if (!$userName) {
            abort(404); // Atau cara penanganan error lainnya sesuai kebutuhan Anda
        }
        // Baca template sertifikat dalam format PNG
        $templatePath = public_path('sertifikat/template_sertifikat.png');
        $templatePathKompetensi = public_path('sertifikat/template_sertifikat1.png');
        $templateImage = imagecreatefrompng($templatePath);
        $templateImageKompetensi = imagecreatefrompng($templatePathKompetensi);

        // Tambahkan nama pengguna ke sertifikat
        $fontPathName = public_path('font/OpenSans-Bold.ttf');
        $fontColorName = imagecolorallocate($templateImage, 0, 0, 0); // Warna teks (hitam)
        $fontSizeName = 100; // Sesuaikan ukuran font sesuai kebutuhan

        // Tambahkan Nama Course Course ke sertifikat
        $fontPathCourse = public_path('font/OpenSans-Bold.ttf');
        $fontColorCourse = imagecolorallocate($templateImage, 0, 0, 0); // Warna teks (hitam)
        $fontSizeCourse = 100; // Sesuaikan ukuran font sesuai kebutuhan

        // Tambahkan Kompetensi Course ke sertifikat
        $fontPathKompetensi = public_path('font/OpenSans-Bold.ttf');
        $fontColorKompetensi = imagecolorallocate($templateImageKompetensi, 0, 0, 0); // Warna teks (hitam)
        $fontSizeKompetensi = 50; // Sesuaikan ukuran font sesuai kebutuhan

        // Ukuran gambar sertifikat
        $imageWidth = imagesx($templateImage);
        $imageHeight = imagesy($templateImage);
        $imageWidthKompetensi = imagesx($templateImageKompetensi);
        $imageHeightKompetensi = imagesy($templateImageKompetensi);

        // Ukuran teks Nama
        $textBoundingBoxName = imagettfbbox($fontSizeName, 0, $fontPathName, $userName); // Ubah 
        $textWidthName = $textBoundingBoxName[2] - $textBoundingBoxName[0];
        $textHeightName = $textBoundingBoxName[1] - $textBoundingBoxName[7];

        // Ukuran teks Course
        $textBoundingBoxCourse = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $courseNames); // Ubah $courseNames sesuai dengan nama course
        $textWidthCourse = $textBoundingBoxCourse[2] - $textBoundingBoxCourse[0];
        $textHeightCourse = $textBoundingBoxCourse[1] - $textBoundingBoxCourse[7];

        // Ukuran teks Kompetensi
        $textBoundingBoxKompetensi = imagettfbbox($fontSizeKompetensi, 0, $fontPathKompetensi, $courseNames); // Ubah $courseNames sesuai dengan nama course
        $textWidthKompetensi = $textBoundingBoxKompetensi[2] - $textBoundingBoxKompetensi[0];
        $textHeightKompetensi = $textBoundingBoxCourse[1] - $textBoundingBoxCourse[7];

        // Koordinat untuk menampilkan nama teks di tengah gambar
        $xName = ($imageWidth - $textWidthName) / 2;
        $yName = ($imageHeight - $textHeightName) / 2;

        // Koordinat untuk menampilkan teks course
        $xCourse = ($imageWidth - $textWidthCourse) / 2;
        $yCourse = $yName + $textHeightCourse - 450; // Sesuaikan angka 10 sesuai kebutuhan untuk memberi jarak antara teks nama dan teks course

        // Koordinat untuk menampilkan teks kompetensi
        $xKompetensi = 200;
        $yKompetensi = 700;

        // Tambahkan teks nama pengguna di tengah gambar
        imagettftext($templateImage, $fontSizeName, 0, $xName, $yName, $fontColorName, $fontPathName, \Str::title($userName));
        imagettftext($templateImage, $fontSizeCourse, 0, $xCourse, $yCourse, $fontColorCourse, $fontPathCourse, \Str::title($courseNames));

        // Tambahkan teks kompetensi pengguna di tengah gambar
        imagettftext($templateImageKompetensi, $fontSizeKompetensi, 0, $xKompetensi, $yKompetensi, $fontColorKompetensi, $fontPathKompetensi, \Str::title($COBA));


        // Set header untuk respons HTTP
        header('Content-Type: image/png');

        // Simpan gambar yang telah diedit ke direktori sertifikat
        $outputPath = public_path('sertifikat/' . $userName . '_certificate.png'); // Ubah $user->name menjadi $user->user->name
        imagepng($templateImage, $outputPath);
        $outputPathKompetensi = public_path('sertifikat/' . $userName . '_certificate_kompetensi.png'); // Ubah $user->name menjadi $user->user->name
        imagepng($templateImageKompetensi, $outputPathKompetensi);

        // Lokasi file gambar
        $templateImagePath = public_path('sertifikat/' . $userName . '_certificate.png');
        $templateImageKompetensiPath = public_path('sertifikat/' . $userName . '_certificate_kompetensi.png');

        // Buat objek gambar dari file
        $templateImage = imagecreatefrompng($templateImagePath);
        $templateImageKompetensi = imagecreatefrompng($templateImageKompetensiPath);

        // Ambil lebar dan tinggi dari gambar pertama (templateImage)
        $width = imagesx($templateImage);
        $height = imagesy($templateImage);

        // Buat gambar kosong untuk menggabungkan kedua gambar
        $combinedImage = imagecreatetruecolor($width * 2, $height);

        // Salin gambar pertama (templateImage) ke gambar gabungan
        imagecopy($combinedImage, $templateImage, 0, 0, 0, 0, $width, $height);

        // Salin gambar kedua (templateImageKompetensi) ke gambar gabungan
        imagecopy($combinedImage, $templateImageKompetensi, $width, 0, 0, 0, $width, $height);

        // Tampilkan gambar gabungan
        header('Content-Type: image/png');
        imagepng($combinedImage);

        // Hapus objek gambar dari memori
        imagedestroy($templateImage);
        imagedestroy($templateImageKompetensi);
        imagedestroy($combinedImage);

        // // Tampilkan gambar yang telah diedit sebagai respons langsung
        // imagepng($templateImage);
        // imagepng($templateImageKompetensi);

        // // Hapus gambar dari memori
        // imagedestroy($templateImage);
        // imagedestroy($templateImageKompetensi);
    }

    private function getCertifMiniBootcamp(CourseClassMemberGrading $courseClassMemberGrading)
    {
        $userName = $courseClassMemberGrading->user->name;
        $courseNames = $courseClassMemberGrading->courseClassModule->courseModule->course->name;
        // Cek apakah pengguna ditemukan
        if (!$userName) {
            abort(404); // Atau cara penanganan error lainnya sesuai kebutuhan Anda
        }
        // Baca template sertifikat dalam format PNG
        $templatePath = public_path('sertifikat/template_sertifikat.png');
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
        $textBoundingBoxCourse = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $courseNames); // Ubah $courseNames sesuai dengan nama course
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
        imagettftext($templateImage, $fontSizeCourse, 0, $xCourse, $yCourse, $fontColorCourse, $fontPathCourse, \Str::title($courseNames));

        // Set header untuk respons HTTP
        header('Content-Type: image/png');

        // Simpan gambar yang telah diedit ke direktori sertifikat
        $outputPath = public_path('sertifikat/' . $userName . '_certificate.png'); // Ubah $user->name menjadi $user->user->name
        imagepng($templateImage, $outputPath);

        // Tampilkan gambar yang telah diedit sebagai respons langsung
        imagepng($templateImage);

        // Hapus gambar dari memori
        imagedestroy($templateImage);
    }

    private function getCertifPrakerja(CourseClassMemberGrading $courseClassMemberGrading)
    {
        $userName = $courseClassMemberGrading->user->name;
        $courseNames = $courseClassMemberGrading->courseClassModule->courseModule->course->name;
        // Cek apakah pengguna ditemukan
        if (!$userName) {
            abort(404); // Atau cara penanganan error lainnya sesuai kebutuhan Anda
        }
        // Baca template sertifikat dalam format PNG
        $templatePath = public_path('sertifikat/template_sertifikat.png');
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
        $textBoundingBoxCourse = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $courseNames); // Ubah $courseNames sesuai dengan nama course
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
        imagettftext($templateImage, $fontSizeCourse, 0, $xCourse, $yCourse, $fontColorCourse, $fontPathCourse, \Str::title($courseNames));

        // Set header untuk respons HTTP
        header('Content-Type: image/png');

        // Simpan gambar yang telah diedit ke direktori sertifikat
        $outputPath = public_path('sertifikat/' . $userName . '_certificate.png'); // Ubah $user->name menjadi $user->user->name
        imagepng($templateImage, $outputPath);

        // Tampilkan gambar yang telah diedit sebagai respons langsung
        imagepng($templateImage);

        // Hapus gambar dari memori
        imagedestroy($templateImage);
    }

    private function getCertifUpskilling(CourseClassMemberGrading $courseClassMemberGrading)
    {
        $userName = $courseClassMemberGrading->user->name;
        $courseNames = $courseClassMemberGrading->courseClassModule->courseModule->course->name;
        // Cek apakah pengguna ditemukan
        if (!$userName) {
            abort(404); // Atau cara penanganan error lainnya sesuai kebutuhan Anda
        }
        // Baca template sertifikat dalam format PNG
        $templatePath = public_path('sertifikat/template_sertifikat.png');
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
        $textBoundingBoxCourse = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $courseNames); // Ubah $courseNames sesuai dengan nama course
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
        imagettftext($templateImage, $fontSizeCourse, 0, $xCourse, $yCourse, $fontColorCourse, $fontPathCourse, \Str::title($courseNames));

        // Set header untuk respons HTTP
        header('Content-Type: image/png');

        // Simpan gambar yang telah diedit ke direktori sertifikat
        $outputPath = public_path('sertifikat/' . $userName . '_certificate.png'); // Ubah $user->name menjadi $user->user->name
        imagepng($templateImage, $outputPath);

        // Tampilkan gambar yang telah diedit sebagai respons langsung
        imagepng($templateImage);

        // Hapus gambar dari memori
        imagedestroy($templateImage);
    }

    private function getCertifKompetensi(CourseClassMemberGrading $courseClassMemberGrading)
    {
        // $userName = $courseClassMemberGrading->user->name;
        $userName = 'sulthan';
        $courseNames = $courseClassMemberGrading->courseClassModule->courseModule->course->name;
        // Cek apakah pengguna ditemukan
        if (!$userName) {
            abort(404); // Atau cara penanganan error lainnya sesuai kebutuhan Anda
        }
        // Baca template sertifikat kopetensi dalam format PNG
        $templatePathKompetensi = public_path('sertifikat/template_sertifikat1.png');
        $templateImageKompetensi = imagecreatefrompng($templatePathKompetensi);

        // Tambahkan nama pengguna ke sertifikat
        $fontPathName = public_path('font/OpenSans-Bold.ttf');
        $fontColorName = imagecolorallocate($templateImageKompetensi, 0, 0, 0); // Warna teks (hitam)
        $fontSizeName = 100; // Sesuaikan ukuran font sesuai kebutuhan

        /// Ukuran gambar sertifikat
        $imageWidth = imagesx($templateImageKompetensi);
        $imageHeight = imagesy($templateImageKompetensi);

        // Ukuran teks Nama
        $textBoundingBoxName = imagettfbbox($fontSizeName, 0, $fontPathName, $userName); // Ubah 
        $textWidthName = $textBoundingBoxName[2] - $textBoundingBoxName[0];
        $textHeightName = $textBoundingBoxName[1] - $textBoundingBoxName[7];

        // Koordinat untuk menampilkan nama teks di tengah gambar
        $xName = ($imageWidth - $textWidthName) / 2;
        $yName = ($imageHeight - $textHeightName) / 2;

        // Tambahkan teks nama pengguna di tengah gambar
        imagettftext($templateImageKompetensi, $fontSizeName, 0, $xName, $yName, $fontColorName, $fontPathName, \Str::title($userName));

        // Set header untuk respons HTTP
        header('Content-Type: image/png');

        // Simpan gambar yang telah diedit ke direktori sertifikat
        $outputPath = public_path('sertifikat/' . $userName . '_kompetensi.png'); // Ubah $user->name menjadi $user->user->name
        imagepng($templateImageKompetensi, $outputPath);

        // Tampilkan gambar yang telah diedit sebagai respons langsung
        imagepng($templateImageKompetensi);

        // Hapus gambar dari memori
        imagedestroy($templateImageKompetensi);

    }
    public function index()
    {
        return view('trackandgrade::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('trackandgrade::create');
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
        return view('trackandgrade::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('trackandgrade::edit');
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
