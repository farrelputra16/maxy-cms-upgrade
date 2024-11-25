<?php

namespace Modules\Enrollment\Imports;

use App\Models\UserMentorship;
use Modules\Enrollment\Entities\CourseClassMember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseClassMemberImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (env('APP_ENV')=='local') {
            if (!filter_var($row['email_mahasiswa'], FILTER_VALIDATE_EMAIL)) {
                // Jika format email tidak valid, Anda bisa mengabaikan baris ini atau memberikan notifikasi
                // session()->flash('error', 'Format email ' . $row['email'] . ' tidak valid.');
                return null;
            }

            $user = DB::table('users')
                ->select('id')
                ->where('email', $row['email_mahasiswa'])
                ->first();
        } else {
            if (!filter_var($row['email'], FILTER_VALIDATE_EMAIL)) {
                // Jika format email tidak valid, Anda bisa mengabaikan baris ini atau memberikan notifikasi
                // session()->flash('error', 'Format email ' . $row['email'] . ' tidak valid.');
                return null;
            }

            $user = DB::table('users')
                ->select('id')
                ->where('email', $row['email'])
                ->first();
        }

        if (env('APP_ENV')=='local') {
            if (!filter_var($row['email_dosen'], FILTER_VALIDATE_EMAIL)) {
                // Jika format email tidak valid, Anda bisa mengabaikan baris ini atau memberikan notifikasi
                // session()->flash('error', 'Format email ' . $row['email'] . ' tidak valid.');
                return null;
            }

            $mentor = DB::table('users')
                ->select('id')
                ->where('email', $row['email_dosen'])
                ->first();
        } else {
            if (!filter_var($row['mentor_email'], FILTER_VALIDATE_EMAIL)) {
                // Jika format email tidak valid, Anda bisa mengabaikan baris ini atau memberikan notifikasi
                // session()->flash('error', 'Format email ' . $row['email'] . ' tidak valid.');
                return null;
            }

            $mentor = DB::table('users')
                ->select('id')
                ->where('email', $row['mentor_email'])
                ->first();
        }

        $course_class = DB::table('course_class')
            ->select('id')
            ->where('slug', $row['course_class_slug'])
            ->first();

        $jobdesc = DB::table('m_jobdesc')
            ->select('id')
            ->where('id', $row['jobdesc_id'])
            ->first();

        if (!$user || !$course_class || !$mentor || !$jobdesc) {
            return null;
        }

        // Periksa apakah data course class member sudah ada
        $existing_course_class_member = DB::table('course_class_member')
            ->where('user_id', $user->id)
            ->where('course_class_id', $course_class->id)
            ->first();

        $existing_user_mentorship = DB::table('user_mentorships')
            ->where('member_id', $user->id)
            ->where('mentor_id', $mentor->id)
            ->where('course_class_id', $course_class->id)
            ->where('m_jobdesc_id', $jobdesc->id)
            ->first();

        // Jika data sudah ada, abaikan
        if ($existing_course_class_member && $existing_user_mentorship) {
            return null;
        }

        // Sesuaikan dengan kolom dalam file CSV dan model CourseClassMember
        // return new CourseClassMember([
        //     'user_id' => $user->id, // Sesuaikan dengan kolom dalam file CSV
        //     'course_class_id' => $course_class->id, // Sesuaikan dengan kolom dalam file CSV
        //     'status' => 1,
        //     'created_at' => now(),
        //     'created_id' => Auth::user()->id, // Mengisi kolom "created_id" dengan ID pengguna saat ini
        //     'updated_at' => now(),
        //     'updated_id' => Auth::user()->id,
        // ]);

        DB::transaction(function () use ($user, $course_class, $mentor, $jobdesc, $existing_course_class_member, $existing_user_mentorship) {
            // Tambahkan ke tabel CourseClassMember jika belum ada
            if (!$existing_course_class_member) {
                CourseClassMember::create([
                    'user_id' => $user->id,
                    'course_class_id' => $course_class->id,
                    'status' => 1,
                    'created_at' => now(),
                    'created_id' => Auth::id(),
                    'updated_at' => now(),
                    'updated_id' => Auth::id(),
                ]);
            }

            // Tambahkan ke tabel UserMentorship jika belum ada
            if (!$existing_user_mentorship) {
                UserMentorship::create([
                    'member_id' => $user->id,
                    'mentor_id' => $mentor->id,
                    'course_class_id' => $course_class->id,
                    'm_jobdesc_id' => $jobdesc->id,
                    'status' => 1,
                    'created_at' => now(),
                    'created_id' => Auth::id(),
                    'updated_at' => now(),
                    'updated_id' => Auth::id(),
                ]);
            }
        });

        return null; // Tidak perlu mengembalikan model
    }
}
