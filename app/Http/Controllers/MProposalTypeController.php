<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MProposalType;
use Illuminate\Support\Facades\Auth;

class MProposalTypeController extends Controller
{
    function getProposalType(){
        $MProposalType = MProposalType::all();
        return view('m_proposal_type.indexv3', ['MProposalType' => $MProposalType]);
    }

    function getAddProposalType(){
        return view('m_proposal_type.addv3');
    }

    function postAddProposalType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MProposalType::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getProposalType');
            }
                return app(HelperController::class)->Negative('getProposalType');
        }
    }

    function getEditProposalType(Request $request){
        $currentData = MProposalType::find($request->id);
        return view('m_proposal_type.editv3', ['currentData' => $currentData]);
    }

    function postEditProposalType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MProposalType::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getProposalType');
            } else {
                return app(HelperController::class)->Warning('getProposalType');
            }
        }
    }
}
