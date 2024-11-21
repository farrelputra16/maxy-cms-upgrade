<?php

namespace Modules\Enrollment\Http\Controllers;

use App\Models\Certificate;
use App\Models\UserCertificate;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
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

        $className = \Str::upper("$classDetail->course_type_name $classDetail->course_name MAXY ACADEMY BERSERTIFIKAT");
        $templatePath = public_path('uploads/certificate/' . $courseClass->course->type->id . "/$certificateTemplate->filename");

        if (!file_exists($templatePath)) {
            return redirect()->back()->with('error', 'Template sertifikat tidak ditemukan');
        }

        $existingCertificate = Certificate::where('user_id', $user->id)
            ->where('course_class_id', $courseClass->id)
            ->first();

        $uuidText = $existingCertificate ? $existingCertificate->uuid : uniqid();

        // Proses pembuatan gambar sertifikat
        $templateImage = Image::make($templatePath);
        $templateImage->resize(3508, 2480);

        $openSansBoldPath = public_path("font/OpenSans-Bold.ttf");
        $timesNewRomanPath = public_path("font/Times New Roman/Times-New-Roman.ttf");

        $templateImage->text($className, $templateImage->width() / 2, $templateImage->height() / 3.68, function ($font) use ($timesNewRomanPath) {
            $font->file($timesNewRomanPath);
            $font->size(68);
            $font->color('#000000');
            $font->align('center');
            $font->valign('middle');
        });

        $templateImage->text($user->name, $templateImage->width() / 2, $templateImage->height() / 2.4, function ($font) use ($openSansBoldPath) {
            $font->file($openSansBoldPath);
            $font->size(128);
            $font->color('#000000');
            $font->align('center');
            $font->valign('middle');
        });

        $templateImage->text("UUID:" . $uuidText, $templateImage->width() / 2, $templateImage->height() / 2.2, function ($font) use ($openSansBoldPath) {
            $font->file($openSansBoldPath);
            $font->size(64);
            $font->color('#2C2C64');
            $font->align('center');
            $font->valign('middle');
        });

        $content = "Telah berhasil menyelesaikan kegiatannya dalam Program $classDetail->course_type_name Bersertifikat di Maxy Academy\n";
        $templateImage->text($content, $templateImage->width() / 2, $templateImage->height() / 1.6 + 60, function ($font) use ($openSansBoldPath) {
            $font->file($openSansBoldPath);
            $font->size(40);
            $font->color('#2C2C64');
            $font->align('center');
            $font->valign('middle');
        });

        $content = "dengan project/kegiatan $classDetail->course_name Learning $classDetail->course_type_name";
        $templateImage->text($content, $templateImage->width() / 2, $templateImage->height() / 1.6 + 120, function ($font) use ($openSansBoldPath) {
            $font->file($openSansBoldPath);
            $font->size(40);
            $font->color('#2C2C64');
            $font->align('center');
            $font->valign('middle');
        });

        $certificateName = $uuidText . '_' . $user->name;
        $certificateImagePath = public_path("sertifikat\\" . $certificateName . '_certificate.png');
        $templateImage->save($certificateImagePath, 100);

        $pdfCertificate = PDF::loadView('enrollment::course_class_member.template-sertifikat', [
            'certificateImagePath' => $certificateImagePath,
        ])->setPaper('a4', 'landscape');

        $pdfCertificatePath = public_path("sertifikat\\" . $certificateName . '_certificate_page_1.pdf');
        $pdfCertificate->save($pdfCertificatePath);

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

        if (!file_exists($userCertificateDirectory)) {
            mkdir($userCertificateDirectory, 0777, true);
        }

        $mergedPdfPath = public_path("sertifikat/{$courseClass->id}/{$uuidText}_{$user->id}_{$user->name}_certificate.pdf");

        // Jika sertifikat sudah ada, hapus file lama
        if ($existingCertificate) {
            $existingFilePath = public_path("sertifikat/{$courseClass->id}/{$existingCertificate->file}");
            if (file_exists($existingFilePath)) {
                unlink($existingFilePath);
            }
            // Update nama file di database
            $existingCertificate->update([
                'file' => "{$uuidText}_{$user->id}_{$user->name}_certificate.pdf",
            ]);
        } else {
            Certificate::create([
                'uuid' => $uuidText,
                'user_id' => $user->id,
                'course_class_id' => $courseClass->id,
                'file' => "{$uuidText}_{$user->id}_{$user->name}_certificate.pdf",
            ]);
        }

        $oMerger->merge();
        $oMerger->save($mergedPdfPath);

        unlink($certificateImagePath);
        unlink($pdfCertificatePath);
        unlink($pdfCompetenciesPath);

        return redirect("/sertifikat/{$courseClass->id}/{$uuidText}_{$user->id}_{$user->name}_certificate.pdf");
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
