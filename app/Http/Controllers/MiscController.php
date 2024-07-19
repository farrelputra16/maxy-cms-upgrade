<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class MiscController extends Controller
{
    // this controller is used for miscellaneous functions to aid IT Support
    public function updateGKCourseImage()
    {
        ini_set('max_execution_time', 300);
        $gk_course_list = Course::where('m_course_type_id', '7')
            ->where('image', 'like', '%https%')
            ->get();

        $counter = 0;
        foreach ($gk_course_list as $course) {
            $counter++;
            echo '=============================== <br>';
            echo 'counter : ' . $counter . '<br>';
            echo 'course_id : ' . $course->id . '<br>';
            echo 'course_name : ' . $course->name . '<br>';
            echo 'course_image : ' . $course->image . '<br>';

            $image = file_get_contents($course->image);
            $path_info = pathinfo($course->image);
            $ext = $path_info['extension'];
            $save_path = public_path('uploads/course_img/' . Str::slug($course->name) . '.' . $ext);

            // file_put_contents disini otomatis dijalankan, tidak hanya dicek saja

            if (file_put_contents($save_path, $image) !== false) {
                echo 'Save Image Attempt : ' . $counter . ' - success <br>';

                $update = Course::where('id', $course->id)->update(['image' => Str::slug($course->name) . '.' . $ext]);
                if ($update) {
                    echo 'Update Image Attempt : ' . $counter . ' - success <br>';
                } else {
                    echo 'Update Image Attempt : ' . $counter . ' - failed <br>';
                }
            } else {
                echo 'Save Image Attempt : ' . $counter . ' - failed <br>';
            }
            echo '=============================== <br>';
        }
    }

    public function reorderUpskillingPriority()
    {
        $gk_class_list = DB::table('course_class as cc')
            ->select('cc.*', 'c.name as course_name')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->where('c.m_course_type_id', '7')
            // ->where('cc.id', 36)
            ->get();

        // dd($gk_class_list);


        foreach ($gk_class_list as $class) {
            // if ($class->id == 36) {
            // get parent class module
            $parent_modules = DB::table('course_class_module')
                ->where('course_class_id', $class->id)
                ->where('level', 1)
                ->get();

            // dd($parent_modules);

            $counter = 0;
            foreach ($parent_modules as $parent) {
                $counter++;
                echo '=============================== <br>';
                echo 'parent id : ' . $parent->id . '<br>';
                echo 'counter : ' . $counter . '<br>';

                $update = DB::table('course_class_module')
                    ->where('id', $parent->id)
                    ->update([
                        'priority' => $counter,
                    ]);

                if ($update) {
                    echo 'Update parent : ' . $counter . ' - success <br>';
                } else {
                    if ($counter == $parent->priority) {
                        echo 'Update parent : ' . $counter . ' - skipped because already correct <br>';
                    } else {
                        echo 'Update parent : ' . $counter . ' - failed <br>';
                    }
                }
            }
            // }
        }
    }

    public function updateSlugCourseClass()
    {
        $course_class = DB::table('course_class as cc')
            ->select('c.slug', 'cc.batch', 'cc.id')
            ->join('course as c', 'c.id', '=', 'cc.course_id')
            ->whereNull('cc.slug')
            // ->where('cc.id', 36)
            ->get();

        // dd($course_class);


        foreach ($course_class as $class) {
            $update = DB::table('course_class')
                ->where('id', $class->id)
                ->update([
                    'slug' => $class->slug.'-'.$class->batch,
                ]);

            if ($update) {
                echo 'Update course_class : ' . $class->id . ' - success <br>';
            } else {
                echo 'Update course_class : ' . $class->id . ' - failed <br>';
            }
        }
    }
}
