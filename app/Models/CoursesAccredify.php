<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CoursesAccredify extends Model
{
    // Base URL untuk API Accredify
    protected static $baseUrl = 'http://dashboard.uat.accredify.io/api/v2/courses';

    // Fillable fields
    protected $fillable = [
        'course_code',
        'course_title',
        'course_url',
        'course_description',
        'badge_design',
        'tags',
        'criteria_narrative',
        'enable_sharing',
    ];

    // GET - Ambil daftar kursus
    public static function fetchAllCourses()
    {
        try {
            $token = env('ACCREDIFY_API_KEY'); // Ambil token dari .env

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->get(self::$baseUrl);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to fetch all courses: ' . $response->body());
                return [];
            }
        } catch (\Exception $e) {
            Log::error('Error fetching all courses: ' . $e->getMessage());
            return [];
        }
    }

    // GET - Ambil kursus berdasarkan ID
    public static function fetchCourseById($id)
    {
        try {
            $token = env('ACCREDIFY_API_KEY'); // Ambil token dari .env

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->get(self::$baseUrl . "/{$id}");

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to fetch course by ID: ' . $response->body());
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Error fetching course by ID: ' . $e->getMessage());
            return null;
        }
    }

    // POST - Tambah kursus baru
    public static function createCourse($data)
    {
        try {
            $token = env('ACCREDIFY_API_KEY'); // Ambil token dari .env

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->post(self::$baseUrl, $data);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to create course: ' . $response->body());
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Error creating course: ' . $e->getMessage());
            return null;
        }
    }

    // PATCH - Update kursus yang ada
    public static function updateCourse($id, $data)
    {
        try {
            $token = env('ACCREDIFY_API_KEY'); // Ambil token dari .env

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ])->patch(self::$baseUrl . "/{$id}", $data);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to update course: ' . $response->body());
                return null;
            }
        } catch (\Exception $e) {
            Log::error('Error updating course: ' . $e->getMessage());
            return null;
        }
    }
}
