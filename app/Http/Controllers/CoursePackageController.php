<?php

namespace App\Http\Controllers;

use App\Models\CoursePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursePackageController extends Controller
{
    function getCoursePackage(){
        $coursePackages = CoursePackage::all();

        return view('course_package.index', [
            'coursePackages' => $coursePackages
        ]);
    }

    function getAddCoursePackage(){
        return view('course_package.add');
    }

    public function postAddCoursePackage(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'fake' => 'required',
            'price' => 'required',
        ]);

        $trim_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->fake));
        $trim_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->price));

        if($validated){
            $create = CoursePackage::create([
                'name' => $request->name,
                'fake_price' => $trim_fake_price,
                'price' => $trim_price,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
    
            if ($create){
                return app(HelperController::class)->Positive('getAccessGroup');
            }
            return app(HelperController::class)->Negative('getAccessGroup');
        }
    }

    function getEditCoursePackage(Request $request){
            $idCoursePackage = $request->id;
            $coursePackages = CoursePackage::find($idCoursePackage);
    
            return view('course_package.edit', [
                'coursePackages' => $coursePackages,
            ]);
    }

    function postEditCoursePackage(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'fake' => 'required',
            'price' => 'required',
        ]);

        $idCoursePackage = $request->id;

        if ($validated){
            if (str_contains($request->fake, "Rp.") || str_contains($request->price, "Rp.")){
                $trim_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->fake));
                $trim_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->price));

                $updateData = CoursePackage::where('id', $idCoursePackage)
                    ->update([
                        'name' => $request->name,
                        'fake_price' => $trim_fake_price,
                        'price' => $trim_price,
                        'description' => $request->description,
                        'status' => $request->status ? 1 : 0,
                        'created_id' => 1,
                        'updated_id' => 1
                    ]);

                if ($updateData){
                    return app(HelperController::class)->Positive('getCoursePackage');
                } else {
                    return app(HelperController::class)->Warning('getCoursePackage');
                }
            } else {
                $updateData = CoursePackage::where('id', $idCoursePackage)
                    ->update([
                        'name' => $request->name,
                        'fake_price' => $request->fake,
                        'price' => $request->price,
                        'description' => $request->description,
                        'status' => $request->status ? 1 : 0,
                        'created_id' => 1,
                        'updated_id' => 1
                    ]);

                if ($updateData){
                    return redirect()->route('getCoursePackage');
                } else {
                    return redirect()->route('getDashboard');
                }
            }
        }
    }
}
