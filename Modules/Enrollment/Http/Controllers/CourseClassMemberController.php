<?php

namespace Modules\Enrollment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Enrollment\Entities\CourseClassMember;

use App\Http\Controllers\HelperController;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Modules\Enrollment\Imports\CourseClassMemberImport;


use Modules\ClassContentManagement\Entities\CourseClass;

class CourseClassMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCourseClassMember(Request $request){
        $idCourseClass = $request->id; 

        $courseClassMembers = CourseClassMember::getCourseClassMember($request);

        return view('enrollment::course_class_member.index', [
            'courseClassMembers' => $courseClassMembers,
            'course_class_id' => $idCourseClass
        ]);
    }

    function getAddCourseClassMember(Request $request){
        $idCourseClass = $request->id;
        $courseClasses = CourseClass::getDuplicateCourseClass($request);
        
        $users = User::all();

        return view('enrollment::course_class_member.add', [
            'users' => $users,
            'courseClasses' => $courseClasses
        ]);
    }

    function postAddCourseClassMember(Request $request){
        // return dd($request);

        $validate = $request->validate([
            'users' => 'required',
            'course_class' => 'required',
        ]);

        // return dd($request);
        if ($validate){
            $created = CourseClassMember::create([
                'user_id' => $request->users,
                'course_class_id' => $request->course_class,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($created){
                return app(HelperController::class)->Positive('getCourseClassMember');
            } else {
                return app(HelperController::class)->Negative('getCourseClassMember');
            }
        }
    }

        function getEditCourseClassMember(Request $request){

            $currentData = CourseClassMember::getEditCourseClassMember($request);

            // return dd($currentData);

            $result = CourseClass::getEditCourseClassMemberCOURSEandCLASSES($currentData);

            $currentDataCourse = $result['currentDataCourse'];
            $allCourseClasses = $result['allCourseClasses'];

            $ccmMemberId = $currentData[0]->ccm_member_id;

            $allMembers = User::where('id', '!=', $ccmMemberId)->get();

            return view('enrollment::course_class_member.edit', [
                'currentData' => $currentData,
                'currentDataCourse' => $currentDataCourse,
                'allCourseClasses' => $allCourseClasses,
                'allMembers' => $allMembers
            ]);
        }

    function postEditCourseClassMember(Request $request){
        // dd($request->user_id);

        $update = CourseClassMember::where('id', '=', $request->id)
            ->update([
                'user_id' => $request->user_id,
                'course_class_id' => $request->course_class,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'updated_id' => Auth::user()->id
            ]);

        if ($update){
            return app(HelperController::class)->Positive('getCourseClassMember');
        } else {
            return app(HelperController::class)->Warning('getCourseClassMember');
        }
    }

    function importCSV(Request $request)
    {
    
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt', // Hanya menerima file CSV
        ]);


        try {
            // Proses impor file CSV
            $import = new CourseClassMemberImport(); // Ganti dengan nama import yang sesuai
            Excel::import($import, $request->file('csv_file'));

            // Redirect dengan pesan sukses jika berhasil
            return redirect()->route('getCourseClassMember')->with('success', 'Data berhasil diimpor dari file CSV.');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            dd('Validation Exception', $e->getMessage()); // Tambahkan pesan ini
        } catch (\Exception $e) {
            dd('Exception', $e->getMessage()); // Tambahkan pesan ini
        }
    }

    public function index()
    {
        return view('enrollment::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('enrollment::create');
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
        return view('enrollment::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('enrollment::edit');
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
