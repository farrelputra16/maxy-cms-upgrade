<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MProposalStatus;
use Illuminate\Support\Facades\Auth;

class MProposalStatusController extends Controller
{
    function getProposalStatus(){
        $MProposalStatus = MProposalStatus::all();
        return view('m_proposal_status.index', ['MProposalStatus' => $MProposalStatus]);
    }

    function getAddProposalStatus(){
        return view('m_proposal_status.add');
    }

    function postAddProposalStatus(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MProposalStatus::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getProposalStatus');
            }
                return app(HelperController::class)->Negative('getProposalStatus');
        }
    }

    function getEditProposalStatus(Request $request){
        $currentData = MProposalStatus::find($request->id);
        return view('m_proposal_status.edit', ['currentData' => $currentData]);
    }

    function postEditProposalStatus(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MProposalStatus::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getProposalStatus');
            } else {
                return app(HelperController::class)->Warning('getProposalStatus');
            }
        }
    }
}
