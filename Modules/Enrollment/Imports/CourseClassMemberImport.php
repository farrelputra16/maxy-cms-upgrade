<?php

namespace Modules\Enrollment\Imports;
use DB;
use Modules\Enrollment\Entities\CourseClassMember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Auth;

class CourseClassMemberImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $user = DB::table('users')
            ->select('id')
            ->where('email', $row['email'])
            ->first();

        $course_class = DB::table('course_class')
            ->select('id')
            ->join('another_table', 'another_table.course_class_id', '=', 'course_class.id')
            ->where('slug', $row['course_class_slug'])
            ->first();

        // dd($course_class->id);

        // Sesuaikan dengan kolom dalam file CSV dan model CourseClassMember
        return new CourseClassMember([
            'user_id' => $user->id, // Sesuaikan dengan kolom dalam file CSV
            'course_class_id' => $course_class->id, // Sesuaikan dengan kolom dalam file CSV
            'status' => 1,
            'created_at' => now(),
            'created_id' => Auth::user()->id, // Mengisi kolom "created_id" dengan ID pengguna saat ini
            'updated_at' => now(),
            'updated_id' => Auth::user()->id, 
        ]);
    }
}
