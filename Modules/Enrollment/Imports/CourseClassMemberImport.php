<?php

namespace Modules\Enrollment\Imports;

use Modules\Enrollment\Entities\CourseClassMember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseClassMemberImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Sesuaikan dengan kolom dalam file CSV dan model CourseClassMember
        return new CourseClassMember([
            'user_id' => $row['user_id'], // Sesuaikan dengan kolom dalam file CSV
            'course_class_id' => $row['course_class_id'], // Sesuaikan dengan kolom dalam file CSV
            'description' => $row['description'], // Sesuaikan dengan kolom dalam file CSV
            'status' => $row['status'], // Sesuaikan dengan kolom dalam file CSV
            'created_id' => $row['created_id'],
            'updated_id' => $row['updated_id'],
        ]);
    }
}
