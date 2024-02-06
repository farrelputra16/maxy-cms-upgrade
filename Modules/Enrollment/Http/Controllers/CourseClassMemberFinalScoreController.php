<?php

namespace Modules\Enrollment\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Enrollment\Entities\CourseClassMember;

class CourseClassMemberFinalScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getFinalScore(Request $request, CourseClassMember $courseClassMember)
    {
        return view('enrollment::course_class_member.final_score.index', compact('courseClassMember'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function getAddFinalScore(CourseClassMember $courseClassMember)
    {
        return view('enrollment::course_class_member.final_score.create', compact('courseClassMember'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function postAddFinalScore(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function getShowFinalScore($id)
    {
        return view('enrollment::course_class_member.final_score.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function getEditFinalScore($id)
    {
        return view('enrollment::course_class_member.final_score.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function postEditFinalScore(Request $request, $id)
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
