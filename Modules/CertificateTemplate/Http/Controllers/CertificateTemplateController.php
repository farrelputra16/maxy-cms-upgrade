<?php

namespace Modules\CertificateTemplate\Http\Controllers;

use App\Models\MCourseType;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\CertificateTemplate\Entities\CertificateTemplate;
use Modules\CertificateTemplate\Http\Requests\StoreCertificateTemplateRequest;
use Modules\CertificateTemplate\Http\Requests\UpdateCertificateTemplateRequest;
use Yajra\DataTables\Facades\DataTables;

class CertificateTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $certificateTemplates = CertificateTemplate::all();
        return view('certificatetemplate::indexv3', compact('certificateTemplates'));
    }

    public function getCertificateTemplateData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Tambahkan mapping kolom yang dapat diurutkan
        $sortableColumns = [
            'id' => 'certificate_template.id', // Tambahkan nama tabel
            'type_mata_kuliah' => 'type.name',
            'template_content' => 'certificate_template.template_content',
            'created_at' => 'certificate_template.created_at',
            'updated_at' => 'certificate_template.updated_at'
        ];

        // Pastikan kolom yang diminta untuk diurutkan valid
        $orderColumn = $sortableColumns[$orderColumn] ?? 'certificate_template.id';

        $certificateTemplates = CertificateTemplate::select(
            'certificate_template.id', 
            'certificate_template.m_course_type_id', 
            'certificate_template.batch', 
            'certificate_template.filename', 
            'certificate_template.template_content', 
            'certificate_template.created_at',
            'certificate_template.updated_at',
            'm_course_type.name as type_name' // Tambahkan nama tipe kuliah
        )
        ->leftJoin('m_course_type', 'm_course_type.id', '=', 'certificate_template.m_course_type_id')
        ->with('type');

        // Jika kolom pengurutan adalah nama tipe
        if ($orderColumn === 'type.name') {
            $certificateTemplates->orderBy('m_course_type.name', $orderDirection);
        } else {
            $certificateTemplates->orderBy($orderColumn, $orderDirection);
        }

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action', 'id_pembuat', 'id_pembaruan'])) {
                continue;
            }

            // Special handling for specific columns
            switch ($columnName) {
                case 'type_mata_kuliah':
                    $certificateTemplates->where(function ($query) use ($columnSearchValue) {
                        $query->whereHas('type', function ($q) use ($columnSearchValue) {
                            $q->where('name', 'like', "%{$columnSearchValue}%");
                        })->orWhere('batch', 'like', "%{$columnSearchValue}%");
                    });
                    break;
                default:
                    $certificateTemplates->where('certificate_template.'.$columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($certificateTemplates)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('type_mata_kuliah', function ($row) {
                return $row->type->name . ' - ' . "Kelas Paralel $row->batch" ?? '-';
            })
            ->addColumn('filename', function ($row) {
                $imagePath = asset('uploads/certificate/' . $row->type->id . '/' . $row->filename);
                return '<img src="' . $imagePath . '" alt="' . $row->filename . '" width="225">';
            })
            ->addColumn('template_content', function ($row) {
                $content = !empty($row->template_content) ? \Str::limit(strip_tags($row->template_content)) : '-';
                return '<span data-toggle="tooltip" data-placement="top" title="' . e($row->template_content) . '">' . $content . '</span>';
            })
            ->addColumn('dibuat_pada', function ($row) {
                return $row->created_at;
            })
            ->addColumn('id_pembuat', function ($row) {
                return $row->created_id;
            })
            ->addColumn('diperbarui_pada', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('id_pembaruan', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('action', function ($row) {
                $editRoute = route('certificate-templates.edit', $row->id);
                $deleteRoute = route('certificate-templates.destroy', $row->id);
                
                return '
                    <a href="' . $editRoute . '" class="btn btn-primary">Ubah</a>
                    <form action="' . $deleteRoute . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus template ini?\')">Hapus</button>
                    </form>
                ';
            })
            ->rawColumns(['filename', 'template_content', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $courseTypes = MCourseType::all();
        return view('certificatetemplate::createv3', compact('courseTypes'));
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
        return view('certificatetemplate::editv3', compact('certificateTemplate', 'courseTypes'));
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
