<?php

namespace Modules\DonationTracker\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\DonationTracker\Entities\Donation;
use Modules\DonationTracker\Entities\FundAllocation;
use Yajra\DataTables\Facades\DataTables;

class SponsoredListController extends Controller
{
    public function index(Request $request)
    {
        try {
            $id = $request->id;
            $user = User::findOrFail($id);

            $totalDonation = Donation::where('donator_id', $id)->sum('value');
            $totalAllocated = FundAllocation::whereIn('donation_id', function ($query) use ($id) {
                $query->select('id')
                    ->from('donation')
                    ->where('donator_id', $id);
            })->sum('value');

            $remainingFund = $totalDonation - $totalAllocated;

            return view('donationtracker::pages.donator.sponsored-list.index', compact('id', 'user', 'totalDonation', 'totalAllocated', 'remainingFund'));
        } catch (\Exception $e) {
            dd('Error occured: ' . $e->getMessage());
        }
    }
    public function getData(Request $request)
    {
        // Base query: users whose group has the donation_manage permission
        $query = User::query()
            ->select([
                'users.id',
                'users.name',
                'fund_allocation.id as fund_allocation_id',
                'fund_allocation.value'
            ])
            ->join('fund_allocation', 'fund_allocation.user_id', '=', 'users.id')
            ->join('donation', 'donation.id', '=', 'fund_allocation.donation_id')
            ->where('donation.donator_id', $request->id);
        $query = FundAllocation::query()
            ->select([
                'fund_allocation.*',
                'users.id as user_id',
                'users.name as user_name',
                'donation.donator_id as donator_id',
            ])
            ->join('users', 'users.id', '=', 'fund_allocation.user_id')
            ->join('donation', 'donation.id', '=', 'fund_allocation.donation_id')
            ->where('donation.donator_id', $request->id);

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('name', function ($row) {
                return $row->user_name . '<small><strong> (#' . $row->user_id . ')</strong></small>';
            })
            ->addColumn('value', function ($row) {
                return 'IDR ' . number_format($row->value ?? 0, 0, ',', '.');
            })
            ->addColumn('description', function ($row) {
                if ($row->description) {
                    return $row->description;
                } else {
                    return '-';
                }
            })
            ->addColumn('created_at', function ($row) {
                return date('d M Y H:i', strtotime($row->created_at));
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return date('d M Y H:i', strtotime($row->updated_at));
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '">' . ($row->status == 1 ? 'Active' : 'Disabled') . '</button>';
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('donator.sponsored-list.getEdit', ['id' => $row->id, 'donatorId' => $row->donator_id]) . '"class="btn btn-primary rounded me-1">Edit</a>';
                return $btn;
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson();
    }


    public function getAdd(Request $request)
    {
        // dd($request->all());

        // donator's  user id
        $id = $request->id;
        $studentList = User::whereNotIn('access_group_id', function ($query) {
            $query->select('users.id')
                ->from('access_group_detail')
                ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
                ->where('access_master.name', 'access_cms');
        })->get();

        $donationList = Donation::where('donator_id', $id)->get();
        foreach($donationList as $item){
            $item->usedFunds = FundAllocation::where('donation_id', $item->id)->sum('value');
            $item->remainingFunds = $item->value - $item->usedFunds;
        }

        return view('donationtracker::pages.donator.sponsored-list.manage', compact(['id', 'studentList', 'donationList']));
    }
    public function postAdd(Request $request)
    {
        // dd($request->all());

        $create = FundAllocation::create([
            'user_id' => $request->studentId,
            'donation_id' => $request->donationId,
            'value' => $request->value,
            'description' => $request->description,
            'status' => $request->status == '' ? 0 : 1,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id
        ]);

        // return redirect()->route('getCourse')->with('success', 'Course created successfully!');
        return redirect()->route('donator.sponsored-list.index', ['id' => $request->donator_id])->with('success', 'Data created successfully!');;
    }
    public function getEdit(Request $request)
    {
        try {
            // dd($request->all());
            $data = FundAllocation::where('fund_allocation.id', $request->id)
                ->select([
                    'fund_allocation.*',
                    'users.id as user_id',
                    'users.name as user_name',
                ])
                ->join('users', 'users.id', '=', 'fund_allocation.user_id')
                ->first();

            $studentList = User::whereNotIn('access_group_id', function ($query) {
                $query->select('users.id')
                    ->from('access_group_detail')
                    ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
                    ->where('access_master.name', 'access_cms');
            })->get();

            $donationList = Donation::where('donator_id', $request->donatorId)->get();
            foreach($donationList as $item){
                $item->usedFunds = FundAllocation::where('donation_id', $item->id)->sum('value');
                $item->remainingFunds = $item->value - $item->usedFunds;
            }

            return view('donationtracker::pages.donator.sponsored-list.manage', compact(['data', 'studentList', 'donationList']));
        } catch (\Exception $e) {
            dd('An Error Occured: ' . $e->getMessage());
        }
    }
    public function postEdit(Request $request)
    {
        try {
            $update = FundAllocation::where('id', $request->id)
                ->update([
                    'user_id' => $request->studentId,
                    'value' => $request->value,
                    'description' => $request->description,
                    'status' => $request->status,
                    'updated_id' => auth()->user()->id
                ]);

            $data = FundAllocation::where('fund_allocation.id', $request->id)
                ->join('donation', 'donation.id', '=', 'fund_allocation.donation_id')
                ->select('donation.donator_id')
                ->first();
            $id = $data->donator_id;

            return redirect()->route('donator.sponsored-list.index', compact('id'))->with('success', 'Data updated successfully!');
        } catch (\Exception $e) {
            dd('An Error Occured: ' . $e->getMessage());
        }
    }
}
