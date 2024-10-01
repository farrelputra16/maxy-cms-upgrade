<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MPartnershipType;
use Illuminate\Support\Facades\Auth;

class MPartnershipTypeController extends Controller
{
    function getPartnershipType(){
        $MPartnershipType = MPartnershipType::all();
        return view('m_partnership_type.indexv3', ['MPartnershipType' => $MPartnershipType]);
    }

    function getAddPartnershipType(){
        return view('m_partnership_type.addv3');
    }

    function postAddPartnershipType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MPartnershipType::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getPartnershipType');
            }
                return app(HelperController::class)->Negative('getPartnershipType');
        }
    }

    function getEditPartnershipType(Request $request){
        $currentData = MPartnershipType::find($request->id);
        return view('m_partnership_type.editv3', ['currentData' => $currentData]);
    }

    function postEditPartnershipType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MPartnershipType::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getPartnershipType');
            } else {
                return app(HelperController::class)->Warning('getPartnershipType');
            }
        }
    }
}
