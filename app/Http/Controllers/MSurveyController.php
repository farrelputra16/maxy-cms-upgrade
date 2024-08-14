<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MSurvey;
use Illuminate\Support\Facades\Auth;

class MSurveyController extends Controller
{
    function getSurvey(){
        $MSurvey = MSurvey::all();
        return view('m_survey.index', ['MSurvey' => $MSurvey]);
    }

    function getAddSurvey(){
        return view('m_survey.add');
    }

    function postAddSurvey(Request $request){//dd($request->all());
        $validate = $request->validate([
            'name' => 'required',
        ]);

        if ($validate){
            $create = MSurvey::create([
                'survey' => $request->survey,
                'name' => $request->name,
                'expired_date' => date('Y-m-d H:i:s', strtotime($request->expired_date)),
                'type' => $request->type ? $request->type : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getSurvey');
            }
                return app(HelperController::class)->Negative('getSurvey');
        }
    }

    function getEditSurvey(Request $request){
        $currentData = MSurvey::find($request->id);//dd($currentData);
        return view('m_survey.edit', ['currentData' => $currentData]);
    }

    function postEditSurvey(Request $request){//dd($request->all());
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            // $update = MSurvey::where('id', '=', $request->id)
            //     ->update([
            //         'survey' => $request->survey ? $request->survey : 0,
            //         'name' => $request->name,
            //         'expired_date' => date('Y-m-d H:i:s', strtotime($request->expired_date)),
            //         'type' => $request->type ? $request->type : 0,
            //         'description' => $request->description,
            //         'status' => $request->status ? 1 : 0,
            //         'updated_id' => Auth::user()->id,
            //     ]);
            $update = MSurvey::find($request->id);
            $update->update([
                    'survey' => $request->survey ? $request->survey : $update->survey,
                    'name' => $request->name,
                    'expired_date' => date('Y-m-d H:i:s', strtotime($request->expired_date)),
                    'type' => $request->type ? $request->type : 0,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);

            if($update){
                return app(HelperController::class)->Positive('getSurvey');
            } else {
                return app(HelperController::class)->Warning('getSurvey');
            }
        }
    }
}
