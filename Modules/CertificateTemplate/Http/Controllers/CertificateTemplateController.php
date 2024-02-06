<?php

namespace Modules\CertificateTemplate\Http\Controllers;

use App\Models\MCourseType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CertificateTemplate\Entities\CertificateTemplate;
use Modules\CertificateTemplate\Http\Requests\StoreCertificateTemplateRequest;
use Modules\CertificateTemplate\Http\Requests\UpdateCertificateTemplateRequest;

class CertificateTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $certificateTemplates = CertificateTemplate::all();
        return view('certificatetemplate::index', compact('certificateTemplates'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $courseTypes = MCourseType::all();
        return view('certificatetemplate::create', compact('courseTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @param StoreCertificateTemplateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCertificateTemplateRequest $request)
    {
        $data = $request->except('filename');

        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $fileName = \Str::replace(" ", "-", $file->getClientOriginalName());
            $data['filename'] = "template-$fileName";

            Storage::disk("public_uploads")->putFileAs(
                'certificate/' . $request->m_course_type_id,
                $file,
                $data['filename']
            );
        }

        CertificateTemplate::create($data);

        return redirect()->route('certificate-templates.index')->with('success', 'Berhasil menyimpan template sertifikat');
    }

    /**
     * Show the specified resource.
     * @param CertificateTemplate $certificateTemplate
     * @return Renderable
     */
    public function show(CertificateTemplate $certificateTemplate)
    {
        return view('certificatetemplate::show', compact('certificateTemplate'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param CertificateTemplate $certificateTemplate
     * @return Renderable
     */
    public function edit(CertificateTemplate $certificateTemplate)
    {
        $courseTypes = MCourseType::all();
        return view('certificatetemplate::edit', compact('certificateTemplate', 'courseTypes'));
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCertificateTemplateRequest $request
     * @param CertificateTemplate $certificateTemplate
     * @return RedirectResponse
     */
    public function update(UpdateCertificateTemplateRequest $request, CertificateTemplate $certificateTemplate)
    {
        $data = $request->except('filename');

        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $fileName = \Str::replace(" ", "-", $file->getClientOriginalName());
            $data['filename'] = "template-$fileName";

            Storage::disk("public_uploads")->putFileAs(
                'certificate/' . $request->m_course_type_id,
                $file,
                $data['filename']
            );
        }

        $certificateTemplate->update($data);

        return redirect()->route('certificate-templates.index')->with('success', 'Berhasil mengubah template sertifikat');
    }

    /**
     * Remove the specified resource from storage.
     * @param CertificateTemplate $certificateTemplate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CertificateTemplate $certificateTemplate)
    {
        Storage::disk("public_uploads")->delete('certificate/' . $certificateTemplate->m_course_type_id . '/' . $certificateTemplate->filename);
        $certificateTemplate->delete();
        return redirect()->route('certificate-templates.index')->with('success', 'Berhasil menghapus template sertifikat');
    }
}
