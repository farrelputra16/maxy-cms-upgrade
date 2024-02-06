<?php

namespace Modules\Enrollment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseClassMemberRequest extends FormRequest
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
            'daily_score' => 'nullable|numeric',
            'absence_score' => 'nullable|numeric',
            'hackathon_1_score' => 'nullable|numeric',
            'hackathon_2_score' => 'nullable|numeric',
            'internship_score' => 'nullable|numeric',
            'final_score' => 'nullable|numeric',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'daily_score.numeric' => 'Nilai harian harus berupa angka',
            'absence_score.numeric' => 'Nilai absensi harus berupa angka',
            'hackathon_1_score.numeric' => 'Nilai hackathon 1 harus berupa angka',
            'hackathon_2_score.numeric' => 'Nilai hackathon 2 harus berupa angka',
            'internship_score.numeric' => 'Nilai internship harus berupa angka',
            'final_score.numeric' => 'Nilai akhir harus berupa angka',
            'description.string' => 'Deskripsi harus berupa teks',
            'status.boolean' => 'Status harus berupa boolean',
        ];
    }
}
