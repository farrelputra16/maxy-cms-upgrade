<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MPartnerType;
use Illuminate\Support\Facades\Auth;

class MPartnerTypeController extends Controller
{
    function getPartnerType(){
        $MPartnerType = MPartnerType::all();
        return view('m_partner_type.indexv3', ['MPartnerType' => $MPartnerType]);
    }

    function getAddPartnerType(){
        return view('m_partner_type.addv3');
    }

    function postAddPartnerType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MPartnerType::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getPartnerType');
            }
                return app(HelperController::class)->Negative('getPartnerType');
        }
    }

    function getEditPartnerType(Request $request){
        $currentData = MPartnerType::find($request->id);
        return view('m_partner_type.editv3', ['currentData' => $currentData]);
    }

    function postEditPartnerType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MPartnerType::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getPartnerType');
            } else {
                return app(HelperController::class)->Warning('getPartnerType');
            }
        }
    }
}
