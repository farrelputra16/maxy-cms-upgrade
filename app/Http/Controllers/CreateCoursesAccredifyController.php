<?php

namespace App\Http\Controllers;

use App\Models\CoursesAccredify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CreateCoursesAccredifyController extends Controller
{
    // GET - Menampilkan daftar kursus
    public function index()
    {
        try {
            // Ambil token dari .env
            $token = env('ACCREDIFY_API_KEY');
            session(['token' => $token]);

            // Log untuk debugging
            Log::info('Token yang disimpan di session: ' . session('token'));

            // Get Course Data via API
            $data = Http::withHeaders([
                'Authorization' =>  'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get('http://dashboard.uat.accredify.io/api/v2/courses')->json();
            dd($data);

            // Validasi nilai numerik di data
            $data = collect($data)->map(function ($course) {
                $course['pending_actions'] = is_numeric($course['pending_actions']) ? (int) $course['pending_actions'] : 0;
                $course['total_issued'] = is_numeric($course['total_issued']) ? (int) $course['total_issued'] : 0;
                return $course;
            })->toArray();

            return view('courses_accredify.index', [
                'data' => $data,
                'token' => session('token')
            ]);

        } catch (\Exception $e) {
            Log::error('Error fetching all courses: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Gagal mengambil data kursus.']);
        }
    }


    // GET - Menampilkan detail kursus berdasarkan ID
    public function show($id)
    {
        try {
            $token = env('ACCREDIFY_API_KEY');

            // Ambil detail kursus dari API
            $course = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->get("http://dashboard.uat.accredify.io/api/v2/courses/{$id}")->json();

            if ($course) {
                // Validasi nilai numerik
                $course['pending_actions'] = is_numeric($course['pending_actions']) ? (int) $course['pending_actions'] : 0;
                $course['total_issued'] = is_numeric($course['total_issued']) ? (int) $course['total_issued'] : 0;

                return view('courses_accredify.show', [
                    'course' => $course,
                    'token' => $token
                ]);
            } else {
                return redirect()->route('courses.index')->with('error', 'Course tidak ditemukan.');
            }
        } catch (\Exception $e) {
            Log::error('Error fetching course by ID: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Gagal mengambil detail kursus.']);
        }
    }


    // POST - Menyimpan kursus baru ke API
    public function store(Request $request)
    {
        // Validasi data kursus
        $validatedData = $this->validateCourseData($request);

        // Tangani file badge jika ada
        if ($request->hasFile('badge_design')) {
            try {
                $badgePath = $request->file('badge_design')->store('badges', 'public');
                $validatedData['badge_design'] = Storage::url($badgePath);  // Menambahkan path file ke data validasi
            } catch (\Exception $e) {
                Log::error('Error uploading badge design: ' . $e->getMessage());
                return redirect()->back()->withErrors(['msg' => 'Gagal mengunggah badge.']);
            }
        }

        $token = env('ACCREDIFY_API_KEY');

        try {
            // Kirim data yang telah divalidasi dan file path ke API
            $course = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->post('http://dashboard.uat.accredify.io/api/v2/courses', $validatedData)->json();

            if ($course) {
                return redirect()->route('courses.index')->with('success', 'Course berhasil dibuat!');
            } else {
                return redirect()->back()->withErrors(['msg' => 'Gagal membuat kursus.']);
            }
        } catch (\Exception $e) {
            Log::error('Error creating course: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Gagal membuat kursus.']);
        }
    }


    // PATCH - Memperbarui kursus yang ada
    public function update(Request $request, $id)
    {
        // Validasi data kursus
        $validatedData = $this->validateCourseData($request);

        // Tangani file badge jika ada
        if ($request->hasFile('badge_design')) {
            try {
                $badgePath = $request->file('badge_design')->store('badges', 'public');
                $validatedData['badge_design'] = Storage::url($badgePath);  // Menambahkan path file ke data validasi
            } catch (\Exception $e) {
                Log::error('Error uploading badge design: ' . $e->getMessage());
                return redirect()->back()->withErrors(['msg' => 'Gagal mengunggah badge.']);
            }
        }

        $token = env('ACCREDIFY_API_KEY');

        try {
            // Kirim data yang telah divalidasi dan file path ke API
            $updatedCourse = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->patch("http://dashboard.uat.accredify.io/api/v2/courses/{$id}", $validatedData)->json();

            if ($updatedCourse) {
                return redirect()->route('courses.index')->with('success', 'Course berhasil diperbarui!');
            } else {
                return redirect()->back()->withErrors(['msg' => 'Gagal memperbarui kursus.']);
            }
        } catch (\Exception $e) {
            Log::error('Error updating course: ' . $e->getMessage());
            return redirect()->back()->withErrors(['msg' => 'Gagal memperbarui kursus.']);
        }
    }


    // Validasi data kursus
    private function validateCourseData(Request $request)
    {
        return $request->validate([
            'course_code' => 'required|string|max:255',
            'course_title' => 'required|string|max:255',
            'course_url' => 'nullable|url|max:255',
            'course_description' => 'required|string|max:5000',
            'badge_design' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'criteria_narrative' => 'nullable|string|max:5000',
            'tags' => 'nullable|string|max:255',
            'enable_sharing' => 'nullable|boolean',
        ]);
    }
}
