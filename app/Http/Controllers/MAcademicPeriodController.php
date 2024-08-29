<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MAcademicPeriod;
use Illuminate\Support\Facades\Auth;

class MAcademicPeriodController extends Controller
{
    function getAcademicPeriod(){
        $MAcademicPeriod = MAcademicPeriod::all();
        return view('m_academic_period.index', ['MAcademicPeriod' => $MAcademicPeriod]);
    }

    function getAddAcademicPeriod(){
        return view('m_academic_period.add');
    }

    function postAddAcademicPeriod(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MAcademicPeriod::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getAcademicPeriod');
            }
                return app(HelperController::class)->Negative('getAcademicPeriod');
        }
    }

    function getEditAcademicPeriod(Request $request){
        $currentData = MAcademicPeriod::find($request->id);
        return view('m_academic_period.edit', ['currentData' => $currentData]);
    }

    function postEditAcademicPeriod(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MAcademicPeriod::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getAcademicPeriod');
            } else {
                return app(HelperController::class)->Warning('getAcademicPeriod');
            }
        }
    }
}
