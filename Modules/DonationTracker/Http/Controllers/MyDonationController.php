<?php

namespace Modules\DonationTracker\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\DonationTracker\Entities\Donation;
use Modules\DonationTracker\Entities\FundAllocation;
use Yajra\DataTables\Facades\DataTables;

class MyDonationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $id = Auth::user()->id;
            $totalDonation = Donation::where('donator_id', $id)->sum('value');
            $totalAllocatedFund = FundAllocation::join('donation', 'donation.id', '=', 'fund_allocation.donation_id')
                ->where('donation.donator_id', $id)
                ->sum('fund_allocation.value');
            $remainingFund = $totalDonation - $totalAllocatedFund;

            return view('donationtracker::pages.my-donation.index', compact(['id', 'totalDonation', 'totalAllocatedFund', 'remainingFund']));
        } catch (\Exception $e) {
            dd('Error occured: ' . $e->getMessage());
        }
    }
    public function getData(Request $request)
    {
        $query = FundAllocation::query()
            ->select([
                'fund_allocation.*',
                'users.id as user_id',
                'users.name as user_name',
                'donation.donator_id as donator_id',
            ])
            ->join('users', 'users.id', '=', 'fund_allocation.user_id')
            ->join('donation', 'donation.id', '=', 'fund_allocation.donation_id')
            ->where('donation.donator_id', Auth::user()->id);

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
                $btn = '-';
                return $btn;
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson();
    }
}
