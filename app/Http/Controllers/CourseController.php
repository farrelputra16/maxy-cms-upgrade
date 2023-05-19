<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    function getCourse(){
        $courses = Course::all();
        return view('course.index', ['courses' => $courses]);
    }

    function getAddCourse(){
        return view('course.addcourse');
    }

    public function postAddCourse(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'id_m_course_type' => 'required',
        'id_m_difficulty_type' => 'required']);

        $validatedData['fake_price'] = 0;
        $validatedData['price'] = 0;
        $validatedData['discounted_price'] = 0;
        $validatedData['short_description'] = 0;
        $validatedData['image'] = 0;
        $validatedData['preview'] = 0;
        $validatedData['target'] = 0;
        $validatedData['payment_link'] = 0;
        $validatedData['status'] = 0;
        $validatedData['created_id'] = 0;
        $validatedData['discounted_price'] = 0;
    
    Course::create($validatedData);

    return redirect()->route('course.index')->with('Data ditambahkan');
    // return view('course.index');
}
public function testDatabaseConnection()
    {
        try {
            DB::table('course')->insert([
                'name' => 'Sample Course',
                'slug' => 'sample-course',
                'description' => 'Sample course description',
                'id_m_course_type' => 1,
                'id_m_difficulty_type' => 1,
            ]);

            return "Database connection and insertion successful!";
        } catch (\Exception $e) {
            return "Error: " . $e->getMessage();
        }
}

public function postAddCourse2(Request $request)
{
    $course= Course::create([
        'name' =>  $request->name, 
        'slug' => $request->slug,
        'description' => $request->description,
        'id_m_course_type' => $request->id_m_course_type,
        'id_m_difficulty_type' => $request->id_m_difficulty_type,
        'fake_price' => 0,
        'price' => 0,
        'discounted_price' => 0,
        'short_description' => 0,
        'image' => 0,
        'preview' => 0,
        'target' => 0,
        'payment_link' => 0,
        'status' => 0,
        'created_id' => 1,
        'updated_id' => 1,
        'discounted_price' => 0
    ]);

    
}
}