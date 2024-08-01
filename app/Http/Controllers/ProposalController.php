<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\ProposalBimbingan;
use App\Models\MProposalStatus;
use Illuminate\Http\Request;

use DB;
use illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    function getProposal()
    {
        $proposals = Proposal::with(['User', 'MProposalStatus', 'MProposalType'])->get();
        return view('proposal.index', compact('proposals'));
    }

    function getEditProposal(Request $request){
        $currentData = Proposal::with('User')->where('id', $request->id)->first();
        $status = MProposalStatus::where('status', 1)->get();
        //dd($currentData);
        // dd($current_course_class_proposal);
        return view('proposal.edit', [
            'currentData' => $currentData,
            'status' => $status,
        ]);
    }

    function postEditProposal(Request $request){
        $idProposal = $request->id;
    
        $updateData = Proposal::where('id', $idProposal)
            ->update([
                'm_proposal_status_id' => $request->status,
                'proposal_grade' => $request->proposal_grade,
                'status' => 1,
                'updated_id' => Auth::user()->id
            ]);
            if ($updateData){
                $sequence = ProposalBimbingan::where('proposal_id', $request->id)->where('user_id', auth()->id())->count();
                $create = ProposalBimbingan::create([
                    'proposal_id' => $request->id,
                    'user_id' => auth()->id(),
                    'm_proposal_status_id' => $request->status,
                    'sequence' => $sequence+1,
                    'description' => $request->description,
                    'created_id' => auth()->id(),
                    'updated_id' => auth()->id(),
                ]);
                if ($create){
                    return app(HelperController::class)->Positive('getProposal');
                }
                    return app(HelperController::class)->Negative('getProposal');
            } else {
                return app(HelperController::class)->Warning('getProposal');
            }
    }
}
