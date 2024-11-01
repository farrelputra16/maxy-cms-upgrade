<?php

namespace App\Http\Controllers;

use App\Models\CoursePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CoursePackageController extends Controller
{
    function getCoursePackage()
    {
        $coursePackages = CoursePackage::all();

        return view('course_package.indexv3', [
            'coursePackages' => $coursePackages
        ]);
    }

    function getAddCoursePackage()
    {
        return view('course_package.addv3');
    }

    public function postAddCoursePackage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'fake' => 'required',
            'price' => 'required',
            'payment_link' => ['nullable', 'url', 'regex:/^https:\/\/.+$/'],
        ]);

        $trim_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->fake));
        $trim_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->price));

        // Check if the fake price exceeds 10 digits
        if (strlen($trim_fake_price) > 10) {
            // Throw a validation error
            return back()->withErrors([
                'fake' => 'Fake Price cannot exceed 10 digits.'
            ])->withInput();
        }

        // Check if the price exceeds 10 digits
        if (strlen($trim_price) > 15) {
            return back()->withErrors([
                'price' => 'Price cannot exceed 15 digits.'
            ])->withInput();
        }

        if ($validated) {
            $create = CoursePackage::create([
                'name' => $request->name,
                'fake_price' => $trim_fake_price,
                'price' => $trim_price,
                'description' => $request->description,
                'payment_link' => $request->payment_link,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create) {
                return app(HelperController::class)->Positive('getCoursePackage');
            }
            return app(HelperController::class)->Negative('getAddCoursePackage');
        }
    }

    function getEditCoursePackage(Request $request)
    {
        $idCoursePackage = $request->id;
        $coursePackages = CoursePackage::find($idCoursePackage);

        return view('course_package.editv3', [
            'coursePackages' => $coursePackages,
        ]);
    }

    function postEditCoursePackage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'fake' => 'required',
            'price' => 'required',
            'payment_link' => ['nullable', 'url', 'regex:/^https:\/\/.+$/'],
        ]);

        $idCoursePackage = $request->id;

        if ($validated) {
            if (str_contains($request->fake, "Rp.") || str_contains($request->price, "Rp.")) {
                $trim_fake_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->fake));
                $trim_price = preg_replace('/\s+/', '', str_replace(array("Rp.", "."), " ", $request->price));

                // Check if the fake price exceeds 10 digits
                if (strlen($trim_fake_price) > 10) {
                    // Throw a validation error
                    return back()->withErrors([
                        'fake' => 'Fake Price cannot exceed 10 digits.'
                    ])->withInput();
                }

                // Check if the price exceeds 10 digits
                if (strlen($trim_price) > 15) {
                    return back()->withErrors([
                        'price' => 'Price cannot exceed 15 digits.'
                    ])->withInput();
                }

                $updateData = CoursePackage::where('id', $idCoursePackage)
                    ->update([
                        'name' => $request->name,
                        'fake_price' => $trim_fake_price,
                        'price' => $trim_price,
                        'payment_link' => $request->payment_link,
                        'description' => $request->description,
                        'status' => $request->status ? 1 : 0,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id
                    ]);

                if ($updateData) {
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
                        'payment_link' => $request->payment_link,
                        'status' => $request->status ? 1 : 0,
                        'created_id' => Auth::user()->id,
                        'updated_id' => Auth::user()->id
                    ]);

                if ($updateData) {
                    return redirect()->route('getCoursePackage');
                } else {
                    return redirect()->route('getDashboard');
                }
            }
        }
    }
}
