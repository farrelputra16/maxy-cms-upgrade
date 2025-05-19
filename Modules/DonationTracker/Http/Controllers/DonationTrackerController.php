<?php

namespace Modules\DonationTracker\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Modules\DonationTracker\Entities\Donation;

class DonationTrackerController extends Controller
{
    public function index()
    {
        try {
            return view('donationtracker::pages.donation.index');
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

        $data = Donation::with('donator')
            ->withSum('fundAllocations', 'value')
            ->orderBy($finalOrderColumn, $orderDirection)
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
            ->addColumn('DT_RowIndex', function ($row) {
                static $count = 0;
                return ++$count;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('value', function ($row) {
                return 'IDR ' . number_format($row->value, 0, ',', '.');
            })
            ->addColumn('allocated_funds', function ($row) {
                return 'IDR ' . number_format($row->fund_allocations_sum_value ?? 0, 0, ',', '.');
            })
            ->addColumn('remaining_funds', function ($row) {
                return 'IDR ' . number_format(($row->value - $row->fund_allocations_sum_value) ?? 0, 0, ',', '.');
            })
            ->addColumn('donated_by', function ($row) {
                $donator = $row->donator->name . ' <small><strong>[#' . $row->donator->id . ']</strong></small>';
                return $donator;
            })
            ->addColumn('description', function ($row) {
                if (!$row->description) {
                    return '-';
                }
                return $row->description;
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
                $btn = '';
                if ((Session::has('access_master') && Session::get('access_master')->contains('access_master_name', 'donation_all_funds_update'))) {
                    $btn .= '<a href="' . route('donation.getEdit', ['id' => $row->id]) . '"class="btn btn-primary rounded">Edit</a>';
                }
                return $btn;
            })
            ->rawColumns(['name', 'value', 'allocated_funds', 'donated_by', 'status', 'action'])
            ->make(true);
    }
    public function getAdd()
    {
        try {
            $donators = DB::table('users')
                ->join('access_group', 'access_group.id', '=', 'users.access_group_id')
                ->join('access_group_detail', 'access_group_detail.access_group_id', '=', 'access_group.id')
                ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
                ->where('access_master.name', 'donation_donator_sponsored_list_manage')
                ->select('users.*')
                ->distinct()
                ->get();

            return view('donationtracker::pages.donation.manage', compact(['donators']));
        } catch (\Exception $e) {
            dd('Error occured: ' . $e->getMessage());
        }
    }
    public function postAdd(Request $request)
    {
        try {
            $create = Donation::create([
                'name' => $request->name,
                'donator_id' => $request->donatorId,
                'value' => $request->value,
                'description' => $request->description,
                'status' => $request->status == '' ? 0 : 1,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            return redirect()->route('donation.index')->with('success', 'Data created successfully!');
        } catch (\Exception $e) {
            dd('Error occured: ' . $e->getMessage());
        }
    }
    public function getEdit(Request $request)
    {
        try {
            $data = Donation::find($request->id);

            $donators = DB::table('users')
                ->join('access_group', 'access_group.id', '=', 'users.access_group_id')
                ->join('access_group_detail', 'access_group_detail.access_group_id', '=', 'access_group.id')
                ->join('access_master', 'access_group_detail.access_master_id', '=', 'access_master.id')
                ->where('access_master.name', 'donation_donator_sponsored_list_manage')
                ->select('users.*')
                ->distinct()
                ->get();

            return view('donationtracker::pages.donation.manage', compact(['data', 'donators']));
        } catch (\Exception $e) {
            dd('Error occured: ' . $e->getMessage());
        }
    }
    public function postEdit(Request $request)
    {
        try {
            // dd($request->all());

            $update = Donation::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'donator_id' => $request->donatorId,
                    'value' => $request->value,
                    'description' => $request->description,
                    'status' => $request->status == '' ? 0 : 1,
                    'updated_id' => Auth::user()->id,
                ]);

            return redirect()->route('donation.index')->with('success', 'Data updated successfully!');
        } catch (\Exception $e) {
            dd('Error occured: ' . $e->getMessage());
        }
    }
}
