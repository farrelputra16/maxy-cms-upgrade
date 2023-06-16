<?php

namespace App\Http\Controllers;

use App\Models\CoursePackage;
use App\Models\CoursePackageBenefit;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursePackageBenefitController extends Controller
{
    //
    function getCoursePackageBenefit(){
        $coursePackageBenefits = DB::select('SELECT
            course_package_benefit.id,
            course_package_benefit.name,
            course_package.name AS course_package_name,
            course_package.price AS course_package_price,
            course_package_benefit.description,
            course_package_benefit.status,
            course_package_benefit.created_at,
            course_package_benefit.updated_at
            FROM course_package_benefit
            JOIN course_package
            WHERE course_package_benefit.course_package_id = course_package.id;
        ');

        return view('course_package_benefit.index', ['coursePackageBenefits' => $coursePackageBenefits]);
    }

    function getAddCoursePackageBenefit(){
        $coursePackage = CoursePackage::all();
        return view('course_package_benefit.add', ['allCoursePackages' => $coursePackage]);
    }

    function postAddCoursePackageBenefit(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'course_package_id' => 'required',
            'description' => 'nullable',
        ]);

        if ($validated){
            $created = CoursePackageBenefit::create([
                'name' => $request->name,
                'course_package_id' => $request->course_package_id,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
        }

        if ($created) {
            return app(HelperController::class)->Positive('getCoursePackageBenefit');
            } 
                return app(HelperController::class)->Negative('getCoursePackageBenefit');
        }

    function getEditCoursePackageBenefit(Request $request){
        $idCoursePackageBenefit = $request->id;
        $currentData = collect(DB::select('SELECT course_package.name AS course_package_name, 
            course_package.id AS course_package_id,
            course_package_benefit.id,
            course_package_benefit.name,
            course_package_benefit.description,
            course_package_benefit.status
            FROM course_package_benefit
            JOIN course_package
            WHERE course_package_benefit.course_package_id = course_package.id
            AND course_package_benefit.id = ?
            ', [$idCoursePackageBenefit]));

        $allCoursePackages = CoursePackage::where('id', '!=', $currentData->value('course_package_id'))->get();
        
        return view('course_package_benefit.edit', [
            'currentData' => $currentData,
            'allCoursePackages' => $allCoursePackages
        ]);
    }

    function postEditCoursePackageBenefit(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'course_package_id' => 'required'
        ]);

        if ($validated){
            $updated = CoursePackageBenefit::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'course_package_id' => $request->course_package_id,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if ($updated){
                return app(HelperController::class)->Positive('getCoursePackageBenefit');
            } else {
            return app(HelperController::class)->Warning('getCoursePackageBenefit');
            }
        }
            
    }
}
