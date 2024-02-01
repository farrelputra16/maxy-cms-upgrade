<?php

namespace Modules\TrackandGrade\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\TrackandGrade\Entities\CourseClassMemberLog;
use App\Http\Controllers\HelperController;
use App\Models\CourseClassMemberHistory;
use App\Models\CourseModule;
use Modules\ClassContentManagement\Entities\CourseClass;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseClassMemberLogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    function getCCMH()
    {
        $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
            ->leftJoin('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
            ->leftJoin('course_module', 'course_module.id', '=', 'course_class_module.course_module_id')
            ->leftJoin('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
            ->leftJoin('course', 'course.id', '=', 'course_class.course_id')
            ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.type as course_type', 'course_module.day as day', 'course_module.name as course_module_name', 'course.name as course_name', 'course_class.batch as batch')
            ->get();
        $course_name = Course::select('name')
            ->get();
        $user_name = User::where('access_group_id', 2)
            ->pluck('name');
        return view('trackandgrade::course_class_member_log.index', ['ccmh' => $ccmh, 'course_name' => $course_name, 'user_name' => $user_name]);
    }

    function getnameCCMH(Request $request)
    {

        $courseNameValue = $request->input('course_name');
        $userNameValue = $request->input('user_name');
        if ($courseNameValue == 'all') {
            if ($userNameValue == 'all') { // jika course all, member all
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->distinct()
                    ->get();
            } else { // jika course all, select member spesifik
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->where('users.name', $userNameValue)
                    ->distinct()
                    ->get();
            }
        } else { // jika course spesifik
            if ($userNameValue == 'all') { // jika course spesifik, member all
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->where('course.name', $courseNameValue)
                    ->distinct()
                    ->get();
            } else { // jika course spesifik, member spesifik
                $ccmh = CourseClassMemberLog::join('users', 'users.id', '=', 'course_class_member_log.user_id')
                    ->join('course_class_module', 'course_class_module.id', '=', 'course_class_member_log.course_class_module_id')
                    ->join('course_module', 'course_module.id', '=', 'course_class_module.id')
                    ->join('course', 'course.id', '=', 'course_module.course_id')
                    ->join('course_class', 'course_class.id', '=', 'course_class_module.course_class_id')
                    ->select('course_class_member_log.*', 'users.name as user_name', 'course_module.day as day', 'course_class.batch as batch', 'course_module.type as course_type', 'course_module.name as course_module_name', 'course.name as course_name')
                    ->where('course.name', $courseNameValue)
                    ->where('users.name', $userNameValue)
                    ->distinct()
                    ->get();
            }
        }
        // return dd($ccmh);
        $course_name = Course::select('name')
            ->get();
        $user_name = User::where('access_group_id', 2)
            ->pluck('name');

        return view('trackandgrade::course_class_member_log.index', ['ccmh' => $ccmh, 'course_name' => $course_name, 'user_name' => $user_name, 'courseNameValue' => $courseNameValue, 'userNameValue' => $userNameValue]);
    }
    public function index()
    {
        return view('trackandgrade::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('trackandgrade::create');
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
        return view('trackandgrade::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('trackandgrade::edit');
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
