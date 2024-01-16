<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\AccessMaster;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\MCourseType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Modules\ClassContentManagement\Entities\CourseClass;
use Illuminate\Foundation\Auth\User;
use Modules\ClassContentManagement\Entities\CourseClassModule;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $accessMaster = AccessMaster::count();
        $user = User::count();

        return view('dashboard.index', [
            'accessMaster' => $accessMaster,
            'user' => $user
        ]);
    }

    public function generateToken($email, $name)
    {
        $secretKey = '4D6351655468576D5A7134743777217A25432A462D4A614E645267556A586E32';
        $token = sha1($email . '|' . $secretKey);

        $response = Http::post('https://athena.gokampus.com/auth/login-register', [
            'token' => $token,
            'email' => $email,
            'name' => $name,
            'referral' => 'maxy', // maxy-academy (dev), maxy (prod)
        ]);

        session()->put('token', $response->json()['token']);

        return $response;
    }

    /**
     * @throws \Exception
     */
    public function synchronizeData()
    {
        $user = auth()->user();
        Helper::generateToken($user->email, $user->name);

        $goKampusCourses = Http::withToken(session('token'))
            ->get('https://athena.gokampus.com/tenants/maxy/courses')
            ->json();

        $goKampusCourses = $goKampusCourses['data'] ?? [];

        DB::beginTransaction();
        try {
            $courses = $this->createCourses($goKampusCourses);
            $this->createCourseClasses($courses);

            DB::commit();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function createCourses($goKampusCourses)
    {
        $courses = [];

        foreach ($goKampusCourses as $goKampusCourse) {
            $isCourseExist = Course::firstWhere('slug', $goKampusCourse['slug']);
            if ($isCourseExist) continue;

            $detail = Http::withToken(session('token'))
                ->get('https://athena.gokampus.com/courses/' . $goKampusCourse['slug'])
                ->json()['data'];

            $course = Course::create([
                'name' => $detail['name'],
                'slug' => $detail['slug'],
                'fake_price' => $detail['original_price'],
                'price' => $detail['discounted_price'],
                'short_description' => '',
                'preview' => '',
                'target' => '',
                'payment_link' => '',
                'description' => $detail['description'],
                'image' => $detail['image_cover_url'],
                'm_course_type_id' => 7, // upskilling
                'm_difficulty_type_id' => 1, // Dari GoKampus, belum ada difficulty (sehingga defaultnya Beginner)
                'status' => 1,
                'created_id' => 1,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_id' => 1,
                'updated_at' => now()->format('Y-m-d H:i:s'),
            ]);

            $course->issuer = 'gokampus';
            $course->total_learners = $detail['total_learners'];
            $course->total_duration = $detail['duration'];

            $type = MCourseType::find(7); // upskilling
            $course->setRelation('type', $type);

            $courses[] = $course;
        }

        return $courses;
    }

    private function createCourseClasses($courses = [])
    {
        $courseClasses = [];

        foreach ($courses as $courseKey => $course) {
            $content = "Di sini kami memberi Anda kursus terstruktur yang akan mengajarkan Anda semua yang perlu Anda ketahui untuk menjadi ahli dalam $course->name.\n
                        Kerjakan setiap bagian, pelajari keterampilan baru (atau tingkatkan keterampilan yang sudah ada) seiring berjalannya waktu.\n
                        Setiap bagian mencakup latihan dan penilaian untuk menguji pemahaman Anda sebelum melanjutkan.";

            $adminId = User::firstWhere('type', 'admin')->id;

            // Membuat CourseClass
            $courseClass = CourseClass::create([
                'batch' => 9,
                'start_date' => now()->format('Y-m-d'),
                'end_date' => now()->addMonths(6)->format('Y-m-d'),
                'quota' => 1000,
                'course_id' => $course->id,
                'announcement' => 'Jangan Lupa Mengerjakan Assignment',
                'content' => $content,
                'status' => 1, // active
                'created_id' => $adminId,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
                'updated_id' => $adminId,
//                'members_count' => $course->total_learners,
//                'total_duration' => $course->total_duration,
            ]);

            // Membuat Modules
            $courseClassModules = $this->createCourseModules($course, $courseClass, $courseKey);
            $courseClass->setRelation('course', $course);
            $courseClass->setRelation('modules', $courseClassModules);

            $courseClasses[] = $courseClass;
        }

        return $courseClasses;
    }

    private function createCourseModules($course, $courseClass, $courseKey)
    {
        $modules = collect();
        $adminId = User::firstWhere('type', 'admin')->id;

        $detail = Http::withToken(session('token'))
            ->get('https://athena.gokampus.com/courses/' . $course->slug)
            ->json()['data'];

        foreach ($detail['chapters'] as $day => $chapter) {
            $module = CourseModule::create([
                'name' => $detail['name'],
                'html' => '',
                'js' => '',
                'priority' => $courseKey + 1,
                'status' => 1,
                'level' => 1,
                'course_id' => $course->id,
                'day' => $day + 1,
                'created_id' => $adminId,
                'updated_id' => $adminId,
            ]);

            $module->setRelation('course', $course);

            $courseClassModule = $this->createCourseClassModules($module, $courseClass);

            $modules->push($courseClassModule);

            foreach ($chapter['lessons'] as $lesson) {
                $lessonDetail = Http::withToken(session('token'))
                    ->get('https://athena.gokampus.com/lessons/' . $lesson['slug'])
                    ->json();

                if (isset($lessonDetail['data'])) {
                    $lessonDetail = $lessonDetail['data'];

                    $submodule = CourseModule::create([
                        'name' => $lesson['name'],
                        'slug' => $lesson['slug'],
                        'html' => '',
                        'js' => '',
                        'priority' => $lesson['sort_order'],
                        'status' => 1,
                        'level' => 2,
                        'course_id' => $course->id,
                        'course_module_parent_id' => $module->id,
                        'day' => $day + 1,
                        'material' => $lessonDetail['content_url'],
                        'content' => $lessonDetail['description'],
                        'created_id' => $adminId,
                        'updated_id' => $adminId,
                    ]);

                    $submodule->videoType = $lesson['type'];
                    $submodule->imgCover = $detail['image_cover_url'];

                    if (in_array($lesson['type'], ['Video', 'AWS', 'IFrame'])) {
                        $submodule->type = 'video_pembelajaran';
                    } else if ($lesson['type'] == 'Quiz') {
                        $submodule->type = 'quiz';
                    } else {
                        $submodule->type = 3;
                    }

                    $courseClassModule = $this->createCourseClassModules($submodule, $courseClass);
                    $submodule->setRelation('course', $course);

                    $modules->push($courseClassModule);
                }
            }
        }

        return $modules;
    }

    private function createCourseClassModules($module, $courseClass)
    {
        $adminId = User::firstWhere('type', 'admin')->id;

        $courseClassModule = CourseClassModule::create([
            'course_module_id' => $module->id,
            'course_class_id' => $courseClass->id,
            'start_date' => now()->format('Y-m-d'),
            'end_date' => now()->addMonths(6)->format('Y-m-d'),
            'priority' => $module->priority,
            'level' => $module->level,
            'status' => 1,
            'created_id' => $adminId,
            'updated_id' => $adminId,
        ]);

        $courseClassModule->setRelation('courseModule', $module);

        return $courseClassModule;
    }
}
