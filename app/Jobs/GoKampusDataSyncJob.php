<?php

namespace App\Jobs;

use App\Helper;
use App\Models\Course;
use App\Models\CourseModule;
use App\Models\MCourseType;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Modules\ClassContentManagement\Entities\CourseClass;
use Modules\ClassContentManagement\Entities\CourseClassModule;

class GoKampusDataSyncJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->synchronizeData();
    }

    /**
     * @throws \Exception
     */
    public function synchronizeData()
    {
        ini_set('max_execution_time', 3600);

        Helper::generateToken($this->user->email, $this->user->name);

        try {
            DB::beginTransaction();

            $goKampusCourses = Http::withToken(session('token'))
                ->get('https://athena.gokampus.com/tenants/maxy/courses?page=1')
                ->json();

            $perPage = isset($goKampusCourses['meta']) ? $goKampusCourses['meta']['per_page'] : 0;
            $lastPage = isset($goKampusCourses['meta']) ? $goKampusCourses['meta']['last_page'] : 0;
            // last page = 15

            for ($i = 81; $i <= $lastPage; $i++) {
                for ($j = 1; $j <= $perPage; $j++) {
                    $goKampusCourses = Http::withToken(session('token'))
                        ->get('https://athena.gokampus.com/tenants/maxy/courses?page=' . $i)
                        ->json();

                    $goKampusCourses = $goKampusCourses['data'] ?? [];

                    $courses = $this->createCourses($goKampusCourses);
                    $this->createCourseClasses($courses);
                }
            }

            DB::commit();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function failed(\Throwable $e)
    {
        info($e->getMessage());
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

//            $course->issuer = 'gokampus';
//            $course->total_learners = $detail['total_learners'];
//            $course->total_duration = $detail['duration'];

            $type = MCourseType::find(7); // upskilling
//            $course->setRelation('type', $type);

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
                'created_id' => $this->user->id,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),
                'updated_id' => $this->user->id,
//                'members_count' => $course->total_learners,
//                'total_duration' => $course->total_duration,
            ]);

            // Membuat Modules
            $courseClassModules = $this->createCourseModules($course, $courseClass, $courseKey);
//            $courseClass->setRelation('course', $course);
//            $courseClass->setRelation('modules', $courseClassModules);

            $courseClasses[] = $courseClass;
        }

        return $courseClasses;
    }

    private function createCourseModules($course, $courseClass, $courseKey)
    {
        $modules = collect();

        $detail = Http::withToken(session('token'))
            ->get('https://athena.gokampus.com/courses/' . $course->slug)
            ->json()['data'];

        foreach ($detail['chapters'] as $day => $chapter) {
            $module = CourseModule::make([
                'name' => $chapter['name'] ?? 'Tidak ada nama',
                'html' => '',
                'js' => '',
                'priority' => $courseKey + 1,
                'status' => 1,
                'level' => 1,
                'course_id' => $course->id,
                'day' => $day + 1,
                'created_id' => $this->user->id,
                'updated_id' => $this->user->id,
            ]);

//            $module->setRelation('course', $course);
            $isModuleAlreadySaved = false;

            foreach ($chapter['lessons'] as $lessonKey => $lesson) {
                $lessonDetail = Http::withToken(session('token'))
                    ->get('https://athena.gokampus.com/lessons/' . $lesson['slug'])
                    ->json();

                if (isset($lessonDetail['data']) && $lesson['is_free'] === true) {
                    if (!$isModuleAlreadySaved) {
                        // Buat parent module ketika child module/lessonsnya gratis
                        $module->save();
                        $courseClassModule = $this->createCourseClassModules($module, $courseClass);
                        $modules->push($courseClassModule);
                        $isModuleAlreadySaved = true;

                        info('Log Module: ', $module->toArray());
                        info('Log Course Class Module: ', $courseClassModule->toArray());
                    }

                    $lessonDetail = $lessonDetail['data'];

                    if (in_array($lesson['type'], ['Video', 'AWS', 'IFrame'])) {
                        $type = 'video_pembelajaran';
                    } else if ($lesson['type'] == 'Quiz') {
                        $type = 'quiz';
                    } else {
                        $type = null;
                    }

                    $submodule = CourseModule::create([
                        'name' => $lessonDetail['name'] ?? $chapter['name'],
                        'slug' => $lessonDetail['slug'],
                        'html' => '',
                        'js' => '',
                        'priority' => $lessonKey + 1,
                        'status' => 1,
                        'level' => 2,
                        'course_id' => $course->id,
                        'course_module_parent_id' => $module->id,
                        'day' => $day + 1,
                        'type' => $type,
                        'material' => $lessonDetail['content_url'],
                        'content' => $lessonDetail['description'],
                        'duration' => $lessonDetail['duration'],
                        'created_id' => $this->user->id,
                        'updated_id' => $this->user->id,
                    ]);

                    $submodule->imgCover = $detail['image_cover_url'];
                    $submodule->videoType = $lesson['type'];

                    $courseClassSubModule = $this->createCourseClassModules($submodule, $courseClass);
//                    $submodule->setRelation('course', $course);

                    $modules->push($courseClassSubModule);
                }
            }
        }

        return $modules;
    }

    private function createCourseClassModules($module, $courseClass)
    {
        $courseClassModule = CourseClassModule::create([
            'course_module_id' => $module->id,
            'course_class_id' => $courseClass->id,
            'start_date' => now()->format('Y-m-d'),
            'end_date' => now()->addMonths(6)->format('Y-m-d'),
            'priority' => $module->priority,
            'level' => $module->level,
            'status' => 1,
            'created_id' => $this->user->id,
            'updated_id' => $this->user->id,
        ]);

//        $courseClassModule->setRelation('courseModule', $module);

        return $courseClassModule;
    }
}
