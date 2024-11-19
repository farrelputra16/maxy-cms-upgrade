<?php

namespace Modules\Enrollment\Http\Controllers;

use App\Models\Certificate;
use App\Models\UserCertificate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Intervention\Image\ImageManagerStatic as Image;
use Modules\CertificateTemplate\Entities\CertificateTemplate;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\Enrollment\Entities\CourseClassMember;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class GenerateCertificateController extends Controller
{
    public function getGenerateCertificate(Request $request, CourseClassMember $courseClassMember, User $user, CourseClass $courseClass)
    {
        $classDetail = CourseClass::getClassDetailByClassId($courseClass->id);
        $classModules = CourseClass::getClassKompByClassId($user->id, $courseClass->id);

        $certificateTemplate = CertificateTemplate::where('m_course_type_id', $courseClass->course->type->id)
                                ->where('batch', $courseClass->batch)
                                ->first();
        if (!$certificateTemplate) {
            return redirect()->back()->with('error', 'Template sertifikat tidak ditemukan');
        }
        // Buka template sertifikat
        $className = \Str::upper("$classDetail->course_type_name $classDetail->course_name MAXY ACADEMY BERSERTIFIKAT");
        $templatePath = public_path('uploads/certificate/' . $courseClass->course->type->id . "/$certificateTemplate->filename");

        // Cek apakah template sertifikat ada
        if (!file_exists($templatePath)) {
            return redirect()->back()->with('error', 'Template sertifikat tidak ditemukan');
        }

        // Cek apakah pengguna sudah memiliki sertifikat di course ini
        $existingCertificate = Certificate::where('user_id', $user->id)
            ->where('course_class_id', $courseClass->id)
            ->first();

        if ($existingCertificate) {
            return redirect("/sertifikat/{$courseClass->id}/{$existingCertificate->file}");
        } else {
            // Baca gambar template dengan Intervention Image
            $templateImage = Image::make($templatePath);

            // Ubah ukuran template ke ukuran A4 dalam piksel
            $templateImage->resize(3508, 2480);

            $openSansBoldPath = public_path("font/OpenSans-Bold.ttf");
            $timesNewRomanPath = public_path("font/Times New Roman/Times-New-Roman.ttf");

            // Tambahkan nama kelas ke sertifikat
            $templateImage->text($className, $templateImage->width() / 2, $templateImage->height() / 3.68, function ($font) use ($timesNewRomanPath) {
                $font->file($timesNewRomanPath);
                $font->size(68);
                $font->color('#000000'); // Warna hitam
                $font->align('center');
                $font->valign('middle');
            });

            // Tambahkan nama pengguna ke sertifikat
            $templateImage->text($user->name, $templateImage->width() / 2, $templateImage->height() / 2.4, function ($font) use ($openSansBoldPath) {
                $font->file($openSansBoldPath);
                $font->size(128);
                $font->color('#000000'); // Black color
                $font->align('center');
                $font->valign('middle');
            });

            // Tambahkan nama pengguna ke sertifikat
            $templateImage->text($user->name, $templateImage->width() / 2, $templateImage->height() / 2.4, function ($font) use ($openSansBoldPath) {
                $font->file($openSansBoldPath);
                $font->size(128);
                $font->color('#000000'); // Warna hitam
                $font->align('center');
                $font->valign('middle');
            });

            // Tambahkan UUID pengguna di bawah nama
            $uuidText = uniqid(); // Pastikan field UUID tersedia
            $templateImage->text("UUID:" . $uuidText, $templateImage->width() / 2, $templateImage->height() / 2.2, function ($font) use ($openSansBoldPath) {
                $font->file($openSansBoldPath);
                $font->size(64); // Ukuran lebih kecil dari nama
                $font->color('#2C2C64'); // Warna ungu
                $font->align('center');
                $font->valign('middle');
            });

            // Tambahkan konten sertifikat
            $content = "Telah berhasil menyelesaikan kegiatannya dalam Program $classDetail->course_type_name Bersertifikat di Maxy Academy\n";
            // $content .= "dengan project/kegiatan $classDetail->course_name Learning $classDetail->course_type_name";

            $templateImage->text($content, $templateImage->width() / 2, $templateImage->height() / 1.6 + 60, function ($font) use ($openSansBoldPath) {
                $font->file($openSansBoldPath);
                $font->size(40);
                $font->color('#2C2C64'); // Warna ungu
                $font->align('center');
                $font->valign('middle');
            });

            $content = "dengan project/kegiatan $classDetail->course_name Learning $classDetail->course_type_name";

            $templateImage->text($content, $templateImage->width() / 2, $templateImage->height() / 1.6 + 120, function ($font) use ($openSansBoldPath) {
                $font->file($openSansBoldPath);
                $font->size(40);
                $font->color('#2C2C64'); // Warna ungu
                $font->align('center');
                $font->valign('middle');
            });

            // $templateImage = $templateImage->sharpen(15);

            // Simpan gambar sertifikat ke file sementara
            $certificateName = uniqid() . '_' . $user->name;
            $certificateImagePath = public_path("sertifikat\\" . $certificateName . '_certificate.png');
            $templateImage->save($certificateImagePath);

            $pdfCertificate = PDF::loadView('enrollment::course_class_member.template-sertifikat', [
                'certificateImagePath' => $certificateImagePath,
            ])->setPaper('a4', 'landscape');

            $pdfCertificatePath = public_path("sertifikat\\" . $certificateName . '_certificate_page_1.pdf');
            $pdfCertificate->save($pdfCertificatePath);

            // Buat PDF kompetensi menggunakan DomPDF
            $pdfCompetencies = PDF::loadView('enrollment::course_class_member.template-kompetensi', [
                'user' => $user,
                'class_detail' => $classDetail,
                'classModules' => $classModules,
                'certificateImagePath' => $certificateImagePath,
                'courseClassMember' => $courseClassMember
            ])->setPaper('a4', 'landscape');

            $pdfCompetenciesPath = public_path("sertifikat\\" . $certificateName . '_competencies.pdf');
            $pdfCompetencies->save($pdfCompetenciesPath);

            $oMerger = PDFMerger::init();
            $oMerger->addPDF($pdfCertificatePath, 'all');
            $oMerger->addPDF($pdfCompetenciesPath, 'all');

            $userCertificateDirectory = public_path("sertifikat/{$courseClass->id}");

            // Periksa apakah direktori sudah ada, jika tidak, buat direktori baru
            if (!file_exists($userCertificateDirectory)) {
                mkdir($userCertificateDirectory, 0777, true); // Buat direktori dengan izin penuh
                }
            $oMerger->merge();
            $mergedPdfPath = public_path("sertifikat/{$courseClass->id}/{$uuidText}_{$user->id}_{$user->name}_certificate.pdf");
            $oMerger->save($mergedPdfPath);

            Certificate::create([
                'uuid' => $uuidText,
                'user_id' => $user->id,
                'course_class_id' => $courseClass->id,
                'file' => "{$uuidText}_{$user->id}_{$user->name}_certificate.pdf",
            ]);

            // Hapus file-file yang tidak diperlukan
            unlink($certificateImagePath);
            unlink($pdfCertificatePath);
            unlink($pdfCompetenciesPath);

            return redirect("/sertifikat/{$courseClass->id}/{$uuidText}_{$user->id}_{$user->name}_certificate.pdf");
        }
    }

    public function getEditCertificateTemplate(Request $request)
    {
        $classDetail = CourseClass::getClassDetailByClassId($request->id);

        $template = public_path('uploads/certificate/' . $request->id . '/template.png');
        $checkTemplate = 0;

        if (file_exists($template)) {
            $checkTemplate = 1;
        }

        return view('enrollment::course_class_member.generate_certificate.edit', ['classDetail' => $classDetail, 'checkTemplate' => $checkTemplate]);

    }

    public function postEditCertificateTemplate(Request $request)
    {
        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();

            $file->storeAs('uploads/certificate/' . $request->id, "template-$fileName");
        }

        return redirect()->route('getCourseClass')->with('success', 'Berhasil menyimpan template sertifikat');
    }
}
