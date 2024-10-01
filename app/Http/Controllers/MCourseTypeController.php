<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MCourseType;
use Illuminate\Support\Facades\Auth;

class MCourseTypeController extends Controller
{
    function getCourseType(){
        $mCourseType = MCourseType::all();
        return view('m_course_type.indexv3', ['mCourseType' => $mCourseType]);
    }

    function getAddCourseType(){
        return view('m_course_type.addv3');
    }

    function postAddCourseType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MCourseType::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getCourseType');
            }
                return app(HelperController::class)->Negative('getCourseType');
        }
    }

    function getEditCourseType(Request $request){
        $currentData = MCourseType::find($request->id);
        return view('m_course_type.editv3', ['currentData' => $currentData]);
    }

    function postEditCourseType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MCourseType::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getCourseType');
            } else {
                return app(HelperController::class)->Warning('getCourseType');
            }
        }
    }
}
