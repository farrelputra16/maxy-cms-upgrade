<?php

namespace Modules\ClassContentManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use Modules\ClassContentManagement\Entities\CourseClassModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Http\Controllers\HelperController;



use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use DB;


class CourseClassController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCourseClass(){
        $course_list = CourseClass::getCourseClass();
        return view('classcontentmanagement::courseclass.index', ['course_list' => $course_list]);
    }

    function getAddCourseClass(){
        $allCourses = Course::all();

        return view('classcontentmanagement::courseclass.add', [
            'allCourses' => $allCourses
        ]);
    }

    function getDuplicateCourseClass(){
        $classes = CourseClass::all();
        $class_list = [];
        foreach($classes as $c){
            $class_detail = CourseClass::getClassDetailByClassId($c->id);
            $class_list[] = $class_detail;
        }
        $course_list = Course::all();

        // dd($allCourseClasses);

        return view('classcontentmanagement::courseclass.duplicate', [
            'course_list' => $course_list,
            'class_list' => $class_list
        ]);
    }

    public function postAddCourseClass(Request $request){
        $validated = $request->validate([
            'batch' => 'required',
            'start' => 'required',
            'end' => 'required',
            'quota' => 'required|integer|gte:1'
        ]);

        if ($validated){
            $create = CourseClass::create([
                'batch' => $request->batch,
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'course_id' => $request->course_id,
                'announcement' => $request->announcement,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getCourseClass');
            }
        }
    }

    public function postDuplicateCourseClass(Request $request){
        // dd($request->all());
        $course_class = CourseClass::where('id', $request->course_class_id)->first();
        $course_class->batch = $request->batch;
        $course_class->course_id = $request->course_id;

        // insert course class yang telah diubah
        $newCourseClass = $course_class->replicate();

        // Memeriksa jika start_date tidak valid dan menggantinya dengan tanggal hari ini
        if ($newCourseClass->start_date == '0000-00-00') {
            $currentDate = date('Y-m-d');
            $newCourseClass->start_date = $currentDate;
        }
        // Memeriksa jika end_date tidak valid dan menggantinya dengan tanggal hari ini
        if ($newCourseClass->end_date == '0000-00-00') {
            $currentDate = date('Y-m-d');
            $newCourseClass->end_date = $currentDate;
        }
        // mengubah status dari class baru
        if ($request->status == null) {
            $newCourseClass->status = 0;
        } else {
            $newCourseClass->status = 1;
        }

        $newCourseClass->save();

        // mengambil id course class yang barusan dibuat
        $last_course_class_id = CourseClass::orderBy('id', 'desc')->first();

        // mengambil id course class module yang ingin di duplicate
        $course_class_modules = CourseClassModule::where('course_class_id', $request->course_class_id)->get();

        // Duplicate setiap course class module
        foreach ($course_class_modules as $module) {
            $newModule = $module->replicate();
            $newModule->course_class_id = $last_course_class_id->id;

            // Memeriksa jika start_date tidak valid dan menggantinya dengan waktu hari ini
            if ($newModule->start_date == '0000-00-00 00:00:00') {
                $newModule->start_date = now();
            }
            // Memeriksa jika end_date tidak valid dan menggantinya dengan waktu hari ini
            if ($newModule->end_date == '0000-00-00 00:00:00') {
                $newModule->end_date = now();
            }

            $newModule->save();
        }
        return app(HelperController::class)->Positive('getCourseClass');
    }

    function getEditCourseClass(Request $request){
        $course_class_id = $request->id;
        $course_class_detail = CourseClass::getClassDetailByClassId($course_class_id);
    
        // $currentData = CourseClass::getCurrentDataCourseClass($request);
        // dd($course_class_detail);

        $course_list = Course::get(); // Access the attribute directly
    
        return view('classcontentmanagement::courseclass.edit', [
            'course_class_detail' => $course_class_detail,
            'course_list' => $course_list
        ]);
    }
    

    function postEditCourseClass(Request $request){
        $course_class_id = $request->id;
        
        $updateData = CourseClass::where('id', $course_class_id)
            ->update([
                'batch' => $request->batch,
                'start_date' => $request->start,
                'end_date' => $request->end,
                'quota' => $request->quota,
                'course_id' => $request->course_id,
                'announcement' => $request->announcement,
                'content' => $request->content,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => auth()->user()->id,
                'updated_id' => auth()->user()->id
            ]);

        if ($updateData){
            return app(HelperController::class)->Positive('getCourseClass');
        } else {
            return app(HelperController::class)->Warning('getCourseClass');
        }
        
    }





    public function index()
    {
        return view('classcontentmanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('classcontentmanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('classcontentmanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('classcontentmanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
