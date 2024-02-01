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
    function getCoursePackageBenefit(Request $request)
    {
        $idPackage = $request->id;
        $Packagenama = CoursePackage::select('name')->where('id', $idPackage)->first();

        // dd($coursenama);

        if (!$request->filled('id')) {
            $coursePackageBenefits = CoursePackageBenefit::getCoursePackageBenefit();
            return view('course_package_benefit.index', ['coursePackageBenefits' => $coursePackageBenefits , 'Packagenama' => $Packagenama]);
        } else {
            $idCPB = $request->id;
            // $coursePackageBenefits = CoursePackageBenefit::where('course_package_id', $idCPB)->get();
            $coursePackageBenefits = CoursePackageBenefit::getCoursePackageBenefit($idCPB);
            return view('course_package_benefit.index', ['coursePackageBenefits' => $coursePackageBenefits, 'idCPB' => $idCPB, 'Packagenama' => $Packagenama]);
        }

    }

    function getAddCoursePackageBenefit(Request $request)
    {

        if (!$request->filled('idCPB')) {
            $coursePackage = CoursePackage::all();
            return view('course_package_benefit.add', ['allCoursePackages' => $coursePackage]);
        } else {
            $idCPB = $request->idCPB;
            $coursePackage = CoursePackage::where('id', $idCPB)->get();

            return view('course_package_benefit.add', ['allCoursePackages' => $coursePackage, 'idCPB' => $idCPB]);
        }

    }

    function postAddCoursePackageBenefit(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'name' => 'required',
            'course_package_id' => 'required',
            'description' => 'nullable',
        ]);

        if ($validated) {
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

            if ($request->filled('idCPB')) {
                app(HelperController::class)->Positive('getCoursePackageBenefit', $request->idCPB);
                return redirect()->route('getCoursePackageBenefit', ['id' => $request->idCPB]);
            } else {
                return app(HelperController::class)->Positive('getCoursePackageBenefit');
            }

        } else {
            if ($request->filled('idCPB')) {
                app(HelperController::class)->Negative('getCoursePackageBenefit', $request->idCPB);
                return redirect()->route('getCoursePackageBenefit', ['id' => $request->idCPB]);
            } else {
                return app(HelperController::class)->Negative('getCoursePackageBenefit');
            }
        }

    }

    function getEditCoursePackageBenefit(Request $request)
    {

        $idCoursePackageBenefit = $request->id;
        $idCPB = $request->idCPB;
        // dd($idCPB);
        $currentData = CoursePackageBenefit::getEditCoursePackageBenefit($request);

        // return dd($currentData);
        $allCoursePackages = CoursePackage::where('id', '!=', $currentData->course_package_id)->get();

        return view('course_package_benefit.edit', [
            'currentData' => $currentData,
            'allCoursePackages' => $allCoursePackages,
            'idCPB' => $idCPB,
        ]);
    }

    function postEditCoursePackageBenefit(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'course_package_id' => 'required'
        ]);

        if ($validated) {
            $updated = CoursePackageBenefit::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'course_package_id' => $request->course_package_id,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            // if ($updated){
            //     return app(HelperController::class)->Positive('getCoursePackageBenefit');
            // } else {
            // return app(HelperController::class)->Warning('getCoursePackageBenefit');
            // }

            if ($updated) {

                if ($request->filled('idCPB')) {
                    app(HelperController::class)->Positive('getCoursePackageBenefit', $request->idCPB);
                    return redirect()->route('getCoursePackageBenefit', ['id' => $request->idCPB]);
                } else {
                    return app(HelperController::class)->Positive('getCoursePackageBenefit');
                }

            } else {
                if ($request->filled('idCPB')) {
                    app(HelperController::class)->Negative('getCoursePackageBenefit', $request->idCPB);
                    return redirect()->route('getCoursePackageBenefit', ['id' => $request->idCPB]);
                } else {
                    return app(HelperController::class)->Negative('getCoursePackageBenefit');
                }
            }
        }

    }
    function deleteCoursePackageBenefit(Request $request, $id)
    {
        $coursePackageBenefit = CoursePackageBenefit::find($id);

        if ($coursePackageBenefit) {
            $deleted = $coursePackageBenefit->delete();

            if ($deleted) {
                if ($request->filled('idCPB')) {
                    app(HelperController::class)->Positive('getCoursePackageBenefit', $request->idCPB);
                    return redirect()->route('getCoursePackageBenefit', ['id' => $request->idCPB])->with('success', 'Course Package Benefit deleted successfully.');
                } else {
                    return app(HelperController::class)->Positive('getCoursePackageBenefit')->with('success', 'Course Package Benefit deleted successfully.');
                }
            } else {
                if ($request->filled('idCPB')) {
                    app(HelperController::class)->Negative('getCoursePackageBenefit', $request->idCPB);
                    return redirect()->route('getCoursePackageBenefit', ['id' => $request->idCPB])->with('error', 'Failed to delete Course Package Benefit.');
                } else {
                    return app(HelperController::class)->Negative('getCoursePackageBenefit')->with('error', 'Failed to delete Course Package Benefit.');
                }
            }
        } else {
            // Course Package Benefit not found
            if ($request->filled('idCPB')) {
                app(HelperController::class)->Negative('getCoursePackageBenefit', $request->idCPB);
                return redirect()->route('getCoursePackageBenefit', ['id' => $request->idCPB])->with('error', 'Course Package Benefit not found.');
            } else {
                return app(HelperController::class)->Negative('getCoursePackageBenefit')->with('error', 'Course Package Benefit not found.');
            }
        }
    }
}
