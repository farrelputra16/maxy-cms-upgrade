<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MiscController extends Controller
{
    // this controller is used for miscellaneous functions to aid IT Support
    public function updateGKCourseImage()
    {
        ini_set('max_execution_time', 300);
        $gk_course_list = Course::where('m_course_type_id', '7')->get();

        $counter = 0;
        foreach ($gk_course_list as $course) {
            $counter++;
            // if ($counter > 405) { // untuk testing
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
        // }
    }
}
