<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MJobdesc;
use Illuminate\Support\Facades\Auth;

class MJobdescController extends Controller
{
    function getJobdesc(){
        $MJobdesc = MJobdesc::all();
        return view('m_jobdesc.indexv3', ['MJobdesc' => $MJobdesc]);
    }

    function getAddJobdesc(){
        return view('m_jobdesc.addv3');
    }

    function postAddJobdesc(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MJobdesc::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getJobdesc');
            }
                return app(HelperController::class)->Negative('getJobdesc');
        }
    }

    function getEditJobdesc(Request $request){
        $currentData = MJobdesc::find($request->id);
        return view('m_jobdesc.editv3', ['currentData' => $currentData]);
    }

    function postEditJobdesc(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MJobdesc::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getJobdesc');
            } else {
                return app(HelperController::class)->Warning('getJobdesc');
            }
        }
    }
}
