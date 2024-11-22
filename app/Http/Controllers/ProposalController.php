<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\ProposalBimbingan;
use App\Models\MProposalStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use DB;
use illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    function getProposal()
    {
        // $proposals = Proposal::with(['User', 'MProposalStatus', 'MProposalType'])->get();

        $user = DB::table('users')
            ->leftJoin('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->where('users.id', Auth::user()->id)
            ->select('users.id', 'users.name', 'access_group.id as access_group_id')
            ->first();

        if ($user) {
            $user->member = DB::table('user_mentorships')
                ->where('mentor_id', $user->id)
                ->get();
        }

        $proposals = collect();
        if ($user->access_group_id == 1) {
            $proposals = DB::table('proposal')
                ->leftJoin('users', 'proposal.student_id', '=', 'users.id')
                ->leftJoin('m_proposal_status', 'proposal.m_proposal_status_id', '=', 'm_proposal_status.id')
                ->leftJoin('m_proposal_type', 'proposal.m_proposal_type_id', '=', 'm_proposal_type.id')
                ->select('proposal.*', 'users.id as user_id', 'users.name as user_name', 'm_proposal_status.name as status', 'm_proposal_type.name as type')
                ->get();
        } else {
            foreach ($user->member as $member) {
                $item = DB::table('proposal')
                    ->leftJoin('users', 'proposal.student_id', '=', 'users.id')
                    ->leftJoin('m_proposal_status', 'proposal.m_proposal_status_id', '=', 'm_proposal_status.id')
                    ->leftJoin('m_proposal_type', 'proposal.m_proposal_type_id', '=', 'm_proposal_type.id')
                    ->where('student_id', $member->member_id)
                    ->select('proposal.*', 'users.id as user_id', 'users.name as user_name', 'm_proposal_status.name as status', 'm_proposal_type.name as type')
                    ->get();
                $proposals = $proposals->merge($item);
            }
        }

        return view('proposal.indexv3', compact('proposals'));
    }

    function getEditProposal(Request $request)
    {
        $currentData = Proposal::with('User')->where('id', $request->id)->first();
        $member = User::find($currentData->student_id);

        $status = MProposalStatus::where('status', 1)->get();

        $proposal_bimbingan = ProposalBimbingan::with('User')
                ->where('proposal_id', $currentData->id)
                ->where('priority', 1)
                ->whereNotNull('description')
                ->orderBy('level', 'ASC')
                ->get();
            foreach ($proposal_bimbingan as $bimbingan) {
                $bimbingan->diff = Carbon::parse($bimbingan->created_at)->diffForHumans();
                $bimbingan->child = ProposalBimbingan::where('proposal_id', $currentData->id)
                    ->where('level', $bimbingan->level)
                    ->where('priority', '<>', 1)
                    ->orderBy('priority', 'ASC')
                    ->get();
                foreach ($bimbingan->child as $child) {
                    $child->diff = Carbon::parse($child->created_at)->diffForHumans();
                }
            }

        //dd($currentData);
        // dd($current_course_class_proposal);
        return view('proposal.editv3', [
            'currentData' => $currentData,
            'status' => $status,
            'proposal_bimbingan' => $proposal_bimbingan,
            'member' => $member
        ]);
    }

    function postEditProposal(Request $request)
    {
        // Validasi input
        $validate = $request->validate([
            'status' => 'required', // Field status harus diisi
            'proposal_grade' => 'required|numeric', // Field grade harus diisi dan berupa angka
        ]);

        if ($validate) {
            $idProposal = $request->id;

            $updateData = Proposal::where('id', $idProposal)
                ->update([
                    'm_proposal_status_id' => $request->status,
                    'proposal_grade' => $request->proposal_grade,
                    // 'description' => $request->description,
                    'status' => 1,
                    'updated_id' => Auth::user()->id
                ]);

            if ($updateData) {
                $level = ProposalBimbingan::where('proposal_id', $request->id)
                    ->where('user_id', auth()->id())
                    ->count();

                $create = ProposalBimbingan::create([
                    'proposal_id' => $request->id,
                    'user_id' => auth()->id(),
                    'm_proposal_status_id' => $request->status,
                    'level' => $level + 1,
                    'priority' => 1,
                    'description' => $request->comment,
                    'created_id' => auth()->id(),
                    'updated_id' => auth()->id(),
                ]);

                if ($create) {
                    return app(HelperController::class)->Positive('getProposal');
                }

                return app(HelperController::class)->Negative('getProposal');
            } else {
                return app(HelperController::class)->Warning('getProposal');
            }
        }
    }

}
