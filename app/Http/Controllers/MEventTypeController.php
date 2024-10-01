<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MEventType;
use Illuminate\Support\Facades\Auth;

class MEventTypeController extends Controller
{
    function getEventType(){
        $MEventType = MEventType::all();
        return view('m_event_type.indexv3', ['MEventType' => $MEventType]);
    }

    function getAddEventType(){
        return view('m_event_type.addv3');
    }

    function postAddEventType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MEventType::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getEventType');
            }
                return app(HelperController::class)->Negative('getEventType');
        }
    }

    function getEditEventType(Request $request){
        $currentData = MEventType::find($request->id);
        return view('m_event_type.editv3', ['currentData' => $currentData]);
    }

    function postEditEventType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MEventType::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getEventType');
            } else {
                return app(HelperController::class)->Warning('getEventType');
            }
        }
    }
}
