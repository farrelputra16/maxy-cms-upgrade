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
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

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

    function getProposalData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];
        
        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        // Get user and access details similar to getProposal logic
        $user = DB::table('users')
            ->leftJoin('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->where('users.id', Auth::user()->id)
            ->select('users.id', 'users.name', 'access_group.id as access_group_id')
            ->first();

        $proposals = DB::table('proposal')
            ->leftJoin('users', 'proposal.student_id', '=', 'users.id')
            ->leftJoin('m_proposal_status', 'proposal.m_proposal_status_id', '=', 'm_proposal_status.id')
            ->leftJoin('m_proposal_type', 'proposal.m_proposal_type_id', '=', 'm_proposal_type.id')
            ->select('proposal.*', 
                    'users.id as user_id', 
                    'users.name as user_name', 
                    'm_proposal_status.name as proposal_status', 
                    'm_proposal_status.id as proposal_status_id',
                    'm_proposal_type.name as type');

        // If not admin, filter proposals
        if ($user->access_group_id != 1) {
            $mentorMemberIds = DB::table('user_mentorships')
                ->where('mentor_id', $user->id)
                ->pluck('member_id');
            
            $proposals->whereIn('student_id', $mentorMemberIds);
        }

        // Column-specific filtering
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            }

            // Special handling for status
            if ($columnName == 'proposal_status') {
                $proposals->where('m_proposal_status.name', 'like', "%{$columnSearchValue}%");
            } elseif ($columnName == 'user_name') {
                $proposals->where('users.name', 'like', "%{$columnSearchValue}%");
            } else {
                $proposals->where('proposal.' . $columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        // Order the results
        $proposals->orderBy($finalOrderColumn, $orderDirection);

        return DataTables::of($proposals)
            ->addIndexColumn()
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('user_name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->user_name) . '">'
                    . \Str::limit(e($row->user_name), 30)
                    . '</span>';
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('proposal', function ($row) {
                return '<a href="' . asset('/uploads/proposal/proposal/' . $row->student_id . '/proposal/' . $row->proposal) . '" target="_blank">' . $row->proposal . '</a>';
            })
            ->addColumn('proposal_status', function ($row) {
                $badgeClass = 'bg-info';
                if ($row->proposal_status_id == 6) $badgeClass = 'bg-danger';
                elseif ($row->proposal_status_id == 7) $badgeClass = 'bg-success';
                elseif ($row->proposal_status_id == 8) $badgeClass = 'bg-warning';
                elseif ($row->proposal_status_id == 9) $badgeClass = 'bg-primary';

                return '<span class="badge ' . $badgeClass . '" style="pointer-events: none;">' . $row->proposal_status . '</span>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditProposal', ['id' => $row->id]) . '" class="btn btn-primary rounded">Ubah</a>';
            })
            ->rawColumns(['user_name', 'name', 'proposal', 'proposal_status', 'action'])
            ->make(true);
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
