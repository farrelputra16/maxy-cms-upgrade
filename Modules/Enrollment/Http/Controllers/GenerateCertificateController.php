<?php

namespace Modules\Enrollment\Http\Controllers;

use App\Models\UserCertificate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\Snappy\Facades\SnappyImage;
use App\Models\User;
use Modules\ClassContentManagement\Entities\CourseClass;

class GenerateCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function getGenerateCertificate(Request $request)
    // {
    //     $userId = $request->user_id;
    //     $classId = $request->course_class_id;

    //     $user = User::find($userId);
    //     $class_detail = CourseClass::getClassDetailByClassId($classId);
    //     $classModules = CourseClass::getClassKompByClassId($userId, $classId);

    //     $class_name = $class_detail->course_type_name . ' ' . $class_detail->course_name . ' Batch ' . $class_detail->batch;

    //     $templatePath = public_path('uploads/certificate/' . $request->course_class_id . '/template.png');

    //     if (!file_exists($templatePath)) {
    //         // Jika template tidak ada, handle sesuai kebutuhan Anda
    //         // Misalnya, redirect dengan pesan kesalahan
    //         return redirect()->back()->with('error', 'Template sertifikat tidak ditemukan');
    //     }

    //     // baca template sertifikat dalam format PNG
    //     $templateImage = imagecreatefrompng($templatePath);

    //     // ukuran gambar sertifikat
    //     $imageWidth = imagesx($templateImage);
    //     $imageHeight = imagesy($templateImage);

    //     // Scale the image to A4 landscape dimensions
    //     $newWidth = 297; // A4 width in millimeters for landscape orientation
    //     $newHeight = 210; // A4 height in millimeters for landscape orientation

    //     $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
    //     imagecopyresampled($resizedImage, $templateImage, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);

    //     // ## NAMA KELAS
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPathCourse = public_path('font/OpenSans-Bold.ttf');
    //     $fontColorCourse = imagecolorallocate($templateImage, 0, 0, 0); // warna teks (hitam)
    //     $fontSizeCourse = 18; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $class_name);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y = ($imageHeight - $textHeight) / 3.5;

    //     // tambahkan teks nama pengguna di tengah gambar
    //     imagettftext($templateImage, $fontSizeCourse, 0, $x, $y, $fontColorCourse, $fontPathCourse, $class_name);

    //     // ## NAMA USER
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPathName = public_path('font/OpenSans-Bold.ttf');
    //     $fontColorName = imagecolorallocate($templateImage, 0, 0, 0); // warna teks (hitam)
    //     $fontSizeName = 34; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSizeName, 0, $fontPathName, $user->name);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y = ($imageHeight - $textHeight) / 2.3;

    //     // tambahkan teks nama pengguna di tengah gambar
    //     imagettftext($templateImage, $fontSizeName, 0, $x, $y, $fontColorName, $fontPathName, $user->name);

    //     // ## NAMA PESERTA
    //     $text = 'Peserta ' . $class_detail->course_type_name . ' ' . $class_detail->course_name . ' Batch ' . $class_detail->batch;
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPath = public_path('font/OpenSans-Bold.ttf');
    //     $fontColor = imagecolorallocate($templateImage, 40, 44, 100); // warna teks (ungu)
    //     $fontSize = 16; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $text);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y = ($imageHeight - $textHeight) / 1.67;

    //     // tambahkan teks nama pengguna di tengah gambar
    //     imagettftext($templateImage, $fontSize, 0, $x, $y, $fontColor, $fontPath, $text);

    //     // ## KONTEN SERTIF
    //     $teks1 = 'Telah berhasil menyelesaikan kegiatannya dalam Program ' . $class_detail->course_type_name . ' Bersertifikat di Maxy Academy';
    //     $teks2 = 'dengan project/kegiatan ' . $class_detail->course_name . ' Learning ' . $class_detail->course_type_name;
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPath = public_path('font/OpenSans-Bold.ttf');
    //     $fontColor = imagecolorallocate($templateImage, 40, 44, 100); // warna teks (ungu)
    //     $fontSize = 11; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $teks1);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y1 = ($imageHeight - $textHeight) / 1.5;
    //     imagettftext($templateImage, $fontSize, 0, $x, $y1, $fontColor, $fontPath, $teks1);

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $teks2);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y2 = $y1 + $textHeight + 10;

    //     imagettftext($templateImage, $fontSize, 0, $x, $y2, $fontColor, $fontPath, $teks2);

    //     // set header untuk respons HTTP
    //     header('Content-Type: image/png');

    //     // Simpan gambar yang telah diedit ke direktori sertifikat
    //     $certificateName = uniqid() . '_' . $user->name;
    //     $outputImagePath = public_path('sertifikat/' . $certificateName . '_certificate.png');
    //     imagepng($templateImage, $outputImagePath);

    //     // Buat objek PDF
    //     $tcpdf = new TCPDF();

    //     // Tambahkan halaman dengan ukuran kertas
    //     $tcpdf->AddPage('S', [297, 210]);
    //     // $tcpdf->AddPage('L', array($imageWidth, $imageHeight));

    //     // Tampilkan gambar pada PDF
    //     $tcpdf->Image($outputImagePath, 18, 10, 297, 210, 'PNG');
    //     // $tcpdf->Image($outputImagePath, 18, 10, $imageWidth, $imageHeight, 'PNG');

    //     // Output ke file PDF
    //     $pdfPath = public_path('sertifikat/' . $certificateName . '_certificate.pdf');
    //     $tcpdf->Output($pdfPath, 'F');

    //     // URL untuk sertifikat
    //     // $urlCredential = env("APP_URL") . '/sertifikat/' . $certificateName;

    //     // Simpan informasi sertifikat ke database
    //     // UserCertificate::create([
    //     //     'name' => $class_name,
    //     //     'company' => '',
    //     //     'id_credential' => '',
    //     //     'url_credential' => $urlCredential,
    //     //     'start_date' => now()->format('Y-m-d'),
    //     //     'end_date' => now()->format('Y-m-d'),
    //     //     'description' => '',
    //     //     'user_id' => $user->id,
    //     // ]);

    //     // Tampilkan gambar yang telah diedit sebagai respons langsung
    //     imagepng($templateImage);

    //     // Hapus gambar dari memori
    //     imagedestroy($templateImage);

    //     $pdf = PDF::loadView('enrollment::course_class_member.template-kompetensi', [
    //         'user' => $user,
    //         'class_detail' => $class_detail,
    //         'classModules' => $classModules,

    //     ])->setPaper('a4', 'landscape');

    //     $kompensiName = uniqid() . '_' . $user->name;
    //     $competencesPath = public_path('sertifikat/' . $kompensiName . '_kompetensi.pdf');
    //     $pdf->save($competencesPath);

    //     $urlCredentialkom = env("APP_URL") . '/sertifikat/' . $kompensiName;

    //     $oMerger = PDFMerger::init();

    //     $oMerger->addPDF($pdfPath, 'all');
    //     $oMerger->addPDF($competencesPath, 'all');

    //     $oMerger->merge();
    //     $oMerger->save(public_path('sertifikat/' . "certificate-$user->name.pdf"));

    //     $urlCredential = env("APP_URL") . '/sertifikat/' . "certificate-$user->name.pdf";

    //     // Simpan informasi sertifikat ke database
    //     UserCertificate::create([
    //         'name' => $class_name,
    //         'company' => '',
    //         'id_credential' => '',
    //         'url_credential' => $urlCredential,
    //         'start_date' => now()->format('Y-m-d'),
    //         'end_date' => now()->format('Y-m-d'),
    //         'description' => '',
    //         'user_id' => $user->id,
    //     ]);


    //     // UserCertificate::create([
    //     //     'name' => $class_name,
    //     //     'company' => '',
    //     //     'id_credential' => '',
    //     //     'url_credential' => $urlCredentialkom,
    //     //     'start_date' => now()->format('Y-m-d'),
    //     //     'end_date' => now()->format('Y-m-d'),
    //     //     'description' => '',
    //     //     'user_id' => $user->id,
    //     // ]);

    //     return $kompensiName;
    // }
    // public function getGenerateCertificate(Request $request)
    // {
    //     $userId = $request->user_id;
    //     $classId = $request->course_class_id;

    //     $user = User::find($userId);
    //     $class_detail = CourseClass::getClassDetailByClassId($classId);
    //     $classModules = CourseClass::getClassKompByClassId($userId, $classId);

    //     $class_name = $class_detail->course_type_name . ' ' . $class_detail->course_name . ' Batch ' . $class_detail->batch;

    //     $templatePath = public_path('uploads/certificate/' . $request->course_class_id . '/template.png');

    //     if (!file_exists($templatePath)) {
    //         // Jika template tidak ada, handle sesuai kebutuhan Anda
    //         // Misalnya, redirect dengan pesan kesalahan
    //         return redirect()->back()->with('error', 'Template sertifikat tidak ditemukan');
    //     }

    //     // baca template sertifikat dalam format PNG
    //     $templateImage = imagecreatefrompng($templatePath);

    //     // ukuran gambar sertifikat
    //     $imageWidth = imagesx($templateImage);
    //     $imageHeight = imagesy($templateImage);

    //     // Scale the image to A4 landscape dimensions
    //     $newWidth = 297; // A4 width in millimeters for landscape orientation
    //     $newHeight = 210; // A4 height in millimeters for landscape orientation

    //     $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
    //     imagecopyresampled($resizedImage, $templateImage, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);

    //     // ## NAMA KELAS
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPathCourse = public_path('font/OpenSans-Bold.ttf');
    //     $fontColorCourse = imagecolorallocate($templateImage, 0, 0, 0); // warna teks (hitam)
    //     $fontSizeCourse = 18; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $class_name);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y = ($imageHeight - $textHeight) / 3.5;

    //     // tambahkan teks nama pengguna di tengah gambar
    //     imagettftext($templateImage, $fontSizeCourse, 0, $x, $y, $fontColorCourse, $fontPathCourse, $class_name);

    //     // ## NAMA USER
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPathName = public_path('font/OpenSans-Bold.ttf');
    //     $fontColorName = imagecolorallocate($templateImage, 0, 0, 0); // warna teks (hitam)
    //     $fontSizeName = 34; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSizeName, 0, $fontPathName, $user->name);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y = ($imageHeight - $textHeight) / 2.3;

    //     // tambahkan teks nama pengguna di tengah gambar
    //     imagettftext($templateImage, $fontSizeName, 0, $x, $y, $fontColorName, $fontPathName, $user->name);

    //     // ## NAMA PESERTA
    //     $text = 'Peserta ' . $class_detail->course_type_name . ' ' . $class_detail->course_name . ' Batch ' . $class_detail->batch;
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPath = public_path('font/OpenSans-Bold.ttf');
    //     $fontColor = imagecolorallocate($templateImage, 40, 44, 100); // warna teks (ungu)
    //     $fontSize = 16; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $text);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y = ($imageHeight - $textHeight) / 1.67;

    //     // tambahkan teks nama pengguna di tengah gambar
    //     imagettftext($templateImage, $fontSize, 0, $x, $y, $fontColor, $fontPath, $text);

    //     // ## KONTEN SERTIF
    //     $teks1 = 'Telah berhasil menyelesaikan kegiatannya dalam Program ' . $class_detail->course_type_name . ' Bersertifikat di Maxy Academy';
    //     $teks2 = 'dengan project/kegiatan ' . $class_detail->course_name . ' Learning ' . $class_detail->course_type_name;
    //     // tambahkan nama pengguna ke sertifikat
    //     $fontPath = public_path('font/OpenSans-Bold.ttf');
    //     $fontColor = imagecolorallocate($templateImage, 40, 44, 100); // warna teks (ungu)
    //     $fontSize = 11; // sesuaikan ukuran font sesuai kebutuhan

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $teks1);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     // koordinat untuk menampilkan teks di tengah gambar
    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y1 = ($imageHeight - $textHeight) / 1.5;
    //     imagettftext($templateImage, $fontSize, 0, $x, $y1, $fontColor, $fontPath, $teks1);

    //     // ukuran teks
    //     $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $teks2);
    //     $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
    //     $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

    //     $x = ($imageWidth - $textWidth) / 2;
    //     $y2 = $y1 + $textHeight + 10;

    //     imagettftext($templateImage, $fontSize, 0, $x, $y2, $fontColor, $fontPath, $teks2);

    //     // set header untuk respons HTTP
    //     header('Content-Type: image/png');

    //     // Simpan gambar yang telah diedit ke direktori sertifikat
    //     $certificateName = uniqid() . '_' . $user->name;
    //     $outputImagePath = public_path('sertifikat/' . $certificateName . '_certificate.png');
    //     imagepng($templateImage, $outputImagePath);

    //     // Tampilkan gambar yang telah diedit sebagai respons langsung
    //     imagepng($templateImage);

    //     // Hapus gambar dari memori
    //     imagedestroy($templateImage);

    //     $pdf = PDF::loadView('enrollment::course_class_member.template-kompetensi', [
    //         'user' => $user,
    //         'class_detail' => $class_detail,
    //         'classModules' => $classModules,

    //     ])->setPaper('a4', 'landscape');

    //     $kompensiName = uniqid() . '_' . $user->name;
    //     $competencesPath = public_path('sertifikat/' . $kompensiName . '_kompetensi.pdf');
    //     $pdf->save($competencesPath);

    //     $urlCredentialkom = env("APP_URL") . '/sertifikat/' . $kompensiName;


    //     return $kompensiName;
    // }
    public function getGenerateCertificate(Request $request)
    {
        $userId = $request->user_id;
        $classId = $request->course_class_id;

        $user = User::find($userId);
        $class_detail = CourseClass::getClassDetailByClassId($classId);
        $classModules = CourseClass::getClassKompByClassId($userId, $classId);

        $class_name = $class_detail->course_type_name . ' ' . $class_detail->course_name . ' Batch ' . $class_detail->batch;

        $templatePath = public_path('uploads/certificate/' . $request->course_class_id . '/template.png');

        if (!file_exists($templatePath)) {
            // Jika template tidak ada, handle sesuai kebutuhan Anda
            // Misalnya, redirect dengan pesan kesalahan
            return redirect()->back()->with('error', 'Template sertifikat tidak ditemukan');
        }

        // baca template sertifikat dalam format PNG
        $templateImage = imagecreatefrompng($templatePath);

        // ukuran gambar sertifikat
        $imageWidth = imagesx($templateImage);
        $imageHeight = imagesy($templateImage);

        // Scale the image to A4 landscape dimensions
        $newWidth = 297; // A4 width in millimeters for landscape orientation
        $newHeight = 210; // A4 height in millimeters for landscape orientation

        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resizedImage, $templateImage, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);

        // ## NAMA KELAS
        // tambahkan nama pengguna ke sertifikat
        $fontPathCourse = public_path('font/OpenSans-Bold.ttf');
        $fontColorCourse = imagecolorallocate($templateImage, 0, 0, 0); // warna teks (hitam)
        $fontSizeCourse = 18; // sesuaikan ukuran font sesuai kebutuhan

        // ukuran teks
        $textBoundingBox = imagettfbbox($fontSizeCourse, 0, $fontPathCourse, $class_name);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

        // koordinat untuk menampilkan teks di tengah gambar
        $x = ($imageWidth - $textWidth) / 2;
        $y = ($imageHeight - $textHeight) / 3.5;

        // tambahkan teks nama pengguna di tengah gambar
        imagettftext($templateImage, $fontSizeCourse, 0, $x, $y, $fontColorCourse, $fontPathCourse, $class_name);

        // ## NAMA USER
        // tambahkan nama pengguna ke sertifikat
        $fontPathName = public_path('font/OpenSans-Bold.ttf');
        $fontColorName = imagecolorallocate($templateImage, 0, 0, 0); // warna teks (hitam)
        $fontSizeName = 34; // sesuaikan ukuran font sesuai kebutuhan

        // ukuran teks
        $textBoundingBox = imagettfbbox($fontSizeName, 0, $fontPathName, $user->name);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

        // koordinat untuk menampilkan teks di tengah gambar
        $x = ($imageWidth - $textWidth) / 2;
        $y = ($imageHeight - $textHeight) / 2.3;

        // tambahkan teks nama pengguna di tengah gambar
        imagettftext($templateImage, $fontSizeName, 0, $x, $y, $fontColorName, $fontPathName, $user->name);

        // ## NAMA PESERTA
        $text = 'Peserta ' . $class_detail->course_type_name . ' ' . $class_detail->course_name . ' Batch ' . $class_detail->batch;
        // tambahkan nama pengguna ke sertifikat
        $fontPath = public_path('font/OpenSans-Bold.ttf');
        $fontColor = imagecolorallocate($templateImage, 40, 44, 100); // warna teks (ungu)
        $fontSize = 16; // sesuaikan ukuran font sesuai kebutuhan

        // ukuran teks
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $text);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

        // koordinat untuk menampilkan teks di tengah gambar
        $x = ($imageWidth - $textWidth) / 2;
        $y = ($imageHeight - $textHeight) / 1.67;

        // tambahkan teks nama pengguna di tengah gambar
        imagettftext($templateImage, $fontSize, 0, $x, $y, $fontColor, $fontPath, $text);

        // ## KONTEN SERTIF
        $teks1 = 'Telah berhasil menyelesaikan kegiatannya dalam Program ' . $class_detail->course_type_name . ' Bersertifikat di Maxy Academy';
        $teks2 = 'dengan project/kegiatan ' . $class_detail->course_name . ' Learning ' . $class_detail->course_type_name;
        // tambahkan nama pengguna ke sertifikat
        $fontPath = public_path('font/OpenSans-Bold.ttf');
        $fontColor = imagecolorallocate($templateImage, 40, 44, 100); // warna teks (ungu)
        $fontSize = 11; // sesuaikan ukuran font sesuai kebutuhan

        // ukuran teks
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $teks1);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

        // koordinat untuk menampilkan teks di tengah gambar
        $x = ($imageWidth - $textWidth) / 2;
        $y1 = ($imageHeight - $textHeight) / 1.5;
        imagettftext($templateImage, $fontSize, 0, $x, $y1, $fontColor, $fontPath, $teks1);

        // ukuran teks
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $teks2);
        $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
        $textHeight = $textBoundingBox[1] - $textBoundingBox[7];

        $x = ($imageWidth - $textWidth) / 2;
        $y2 = $y1 + $textHeight + 10;

        imagettftext($templateImage, $fontSize, 0, $x, $y2, $fontColor, $fontPath, $teks2);

        // // set header untuk respons HTTP
        // header('Content-Type: image/png');

        // // Simpan gambar yang telah diedit ke direktori sertifikat
        $certificateName = uniqid() . '_' . $user->name;
        // $outputImagePath = public_path('sertifikat/' . $certificateName . '_certificate.png');
        // imagepng($templateImage, $outputImagePath);

        // // Tampilkan gambar yang telah diedit sebagai respons langsung
        // imagepng($templateImage);

        // // Hapus gambar dari memori
        // imagedestroy($templateImage);

        // $pdf = PDF::loadView('enrollment::course_class_member.template-kompetensi', [
        //     'user' => $user,
        //     'class_detail' => $class_detail,
        //     'classModules' => $classModules,

        // ])->setPaper('a4', 'landscape');

        $kompensiName = uniqid() . '_' . $user->name;
        // $competencesPath = public_path('sertifikat/' . $kompensiName . '_kompetensi.pdf');
        // $pdf->save($competencesPath);

        // $urlCredentialkom = env("APP_URL") . '/sertifikat/' . $kompensiName;


        // return $kompensiName;
        // Set header for HTTP response
    header('Content-Type: application/pdf');

    // Save certificate image to a temporary file
    $certificateImagePath = public_path('sertifikat/' . $certificateName . '_certificate.png');
    imagepng($templateImage, $certificateImagePath);

    // Generate competence PDF using SnappyPdf
    $pdf = SnappyPdf::loadView('enrollment::course_class_member.template-kompetensi', [
        'user' => $user,
        'class_detail' => $class_detail,
        'classModules' => $classModules,
    ])->setPaper('a4', 'landscape');

    // Save competence PDF to a temporary file
    $competencesPath = public_path('sertifikat/' . $kompensiName . '_kompetensi.pdf');
    $pdf->save($competencesPath);

    // Merge certificate image and competence PDF into one PDF
    $mergedPdfPath = public_path('sertifikat/' . $kompensiName . '_merged.pdf');
    SnappyImage::loadImages([$certificateImagePath])->setOption('zoom', 1.33)
        ->setOption('viewport-size', '1366x768')
        ->setOption('disable-smart-shrinking', true)
        ->setOption('no-images', false)
        ->setOption('page-width', 297)
        ->setOption('page-height', 210)
        ->setOption('dpi', 300)
        ->save($mergedPdfPath);

    // Return the merged PDF path or URL
    return $mergedPdfPath;
    }
    public function getEditCertificateTemplate(Request $request)
    {
        // dd($request->all()); // course_class_id
        $class_detail = CourseClass::getClassDetailByClassId($request->id);

        $template = public_path('uploads/certificate/' . $request->id . '/template.png');
        $check_template = 0;
        if (file_exists($template)) {
            $check_template = 1;
        }

        return view('enrollment::course_class_member.generate_certificate.edit', ['class_detail' => $class_detail, 'check_template' => $check_template]);

    }


    public function postEditCertificateTemplate(Request $request)
    {
        // ...

        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $fileName = 'template' . '.' . $ext;

            $dir_path = public_path('/uploads/certificate/' . $request->id);
            if (!file_exists($dir_path)) {
                mkdir($dir_path, 0777, true);
            }

            // Resize and save the image
            // $image = Image::make($file)->resize(297, 210); // Adjust the dimensions as needed
            $image->save($dir_path . '/' . $fileName);
        }

        // ...

        if (file_exists($dir_path . '/' . $fileName)) {
            return redirect()->route('getCourseClass')->with('success', 'Berhasil menyimpan template sertifikat');
        } else {
            return redirect()->route('getCourseClass')->with('error', 'Gagal menyimpan template sertifikat');
        }
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
        return view('course_class_member.generate_certificate.edit');
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