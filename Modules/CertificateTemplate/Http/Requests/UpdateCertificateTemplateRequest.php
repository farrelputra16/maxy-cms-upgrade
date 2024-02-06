<?php

namespace Modules\CertificateTemplate\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCertificateTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'm_course_type_id' => 'required|exists:m_course_type,id',
            'filename' => 'nullable|mimes:png|max:10240',
            'batch' => 'required|integer|min:0',
            'template_content' => 'nullable|string',
            'description' => 'nullable|string',
            'marker_state' => 'nullable|json'
        ];
    }

    public function messages()
    {
        return [
            'm_course_type_id.required' => 'Tipe kursus tidak boleh kosong',
            'm_course_type_id.exists' => 'Tipe kursus tidak ditemukan',
            'batch.required' => 'Batch tidak boleh kosong',
            'batch.integer' => 'Batch harus berupa angka',
            'batch.min' => 'Batch tidak boleh kurang dari 0',
            'filename.mimes' => 'File template sertifikat harus berupa file gambar dengan format PNG',
            'filename.max' => 'File template sertifikat tidak boleh lebih dari 10MB',
            'template_content.string' => 'Konten template harus berupa teks',
            'description.string' => 'Deskripsi harus berupa teks',
            'marker_state.json' => 'Marker state harus berupa JSON'
        ];
    }
}
