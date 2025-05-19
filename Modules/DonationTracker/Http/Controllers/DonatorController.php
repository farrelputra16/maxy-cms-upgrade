<?php

namespace Modules\DonationTracker\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DonatorController extends Controller
{
    public function index()
    {
        try {
            return view('donationtracker::pages.donator.index');
        } catch (\Exception $e) {
            dd('Error occured: ' . $e->getMessage());
        }
    }
    public function getData(Request $request)
    {
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'desc');

        $columns = $request->input('columns');

        $orderColumn = 'id';

        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = ['DT_RowIndex' => 'id'];
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $data = User::select([
            'users.id',
            'users.name',
            DB::raw('COALESCE(SUM(DISTINCT donation.value), 0) AS total_donation'),
            DB::raw('COALESCE(SUM(fund_allocation.value), 0) AS total_allocated'),
            DB::raw('COALESCE(SUM(DISTINCT donation.value), 0) - COALESCE(SUM(fund_allocation.value), 0) AS remaining_fund'),
            DB::raw('GREATEST(COALESCE(MAX(donation.updated_at), "1970-01-01"), COALESCE(MAX(fund_allocation.updated_at), "1970-01-01")) AS last_activity')
        ])
        ->join('access_group', 'users.access_group_id', '=', 'access_group.id')
        ->join('access_group_detail', 'access_group.id', '=', 'access_group_detail.access_group_id')
        ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
        ->where('access_master.name', 'donation_manage')
        ->leftJoin('donation', 'donation.donator_id', '=', 'users.id')
        ->leftJoin('fund_allocation', 'fund_allocation.donation_id', '=', 'donation.id')
        ->groupBy('users.id', 'users.name')
        ->orderBy('last_activity', $orderDirection)
        ->get();

        // Apply column filters
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) continue;

            if ($columnName === 'status') {
                $status = stripos($columnSearchValue, 'non') !== false ? 0 : 1;
                $data->where('users.status', $status);
            } else {
                $data->where("users.{$columnName}", 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('total_donation', function ($row) {
                return 'IDR ' . number_format($row->total_donation ?? 0, 0, ',', '.');
            })
            ->addColumn('allocated_funds', function ($row) {
                return 'IDR ' . number_format($row->total_allocated ?? 0, 0, ',', '.');
            })
            ->addColumn('remaining_funds', function ($row) {
                return 'IDR ' . number_format($row->remaining_fund ?? 0, 0, ',', '.');
            })
            ->addColumn('updated_at', function ($row) {
                return $row->last_activity ? date('d M Y H:i', strtotime($row->last_activity)) : '-';
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('donator.sponsored-list.index', ['id' => $row->id]) . '"class="btn btn-primary rounded me-1">Sponsored Students</a>';
                return $btn;
            })
            ->rawColumns(['action', 'total_donation'])
            ->toJson();
    }
}
