<?php

namespace Modules\RedeemCode\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\RedeemCode\Entities\RedeemCode;
use Modules\RedeemCode\Entities\RedeemCodeClassList;
use Yajra\DataTables\Facades\DataTables;

class RedeemCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            return view('redeemcode::redeem_code.index');
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }
    public function getData(Request $request)
    {
        $orderColumnIndex = $request->input('draw') == 1 ? -6 : $request->input('order.0.column');
        $orderDirection = $request->input('draw') == 1 ? 'desc' : $request->input('order.0.dir');
        $columns = $request->input('columns');

        $orderColumn = 'created_at';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        // Mapping for column ordering
        $finalOrderColumn = $orderColumn;

        $data = RedeemCode::orderBy($finalOrderColumn, $orderDirection)
            ->select('id', 'name', 'code', 'quota', 'expired_date', 'description',  'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->where('type', 'bootcamp');

        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if ($columnSearchValue == 'active')
                    $data->where('status', '=', 1);
                else
                    $data->where('status', '=', 0);
            } else {
                $data->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($data)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('code', function ($row) {
                return $row->code;
            })
            ->addColumn('quota', function ($row) {
                return $row->quota;
            })
            ->addColumn('expired_date', function ($row) {
                return $row->expired_date;
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="'
                    . e(strip_tags($row->description)) . '">'
                    . (!empty($row->description) ? Str::limit(strip_tags($row->description), 30) : '-')
                    . '</span>';
            })
            ->addColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('created_id', function ($row) {
                return $row->created_id;
            })
            ->addColumn('updated_at', function ($row) {
                return $row->updated_at;
            })
            ->addColumn('updated_id', function ($row) {
                return $row->updated_id;
            })
            ->addColumn('status', function ($row) {
                return '<button
                        class="btn btn-status ' . ($row->status == 1 ? 'btn-success' : 'btn-danger') . '"
                        data-id="' . $row->id . '"
                        data-status="' . $row->status . '"
                        data-model="Course">
                        ' . ($row->status == 1 ? 'Active' : 'Disabled') . '
                    </button>';
            })
            ->addColumn('action', function ($row) {
                return '<div class="btn-group"><a href="' . route('redeemCode.getEdit', ['id' => $row->id]) . '"
                                class="btn btn-primary">Edit</a>
                            <a href="' . route('redeemCode.class.index', ['id' => $row->id]) . '"
                                class="btn btn-info">Class List</a></div>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'description', 'status', 'action'])
            ->make(true);
    }

    function getAdd()
    {
        try {
            return view('redeemcode::redeem_code.manage');
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    function postAdd(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-zA-Z0-9\s]+$/'
                ],
                'code' => [
                    'required',
                    'string',
                    'unique:redeem_code,code',
                    'max:100'
                ],
                'quota' => [
                    'required',
                    'numeric',
                    'min:1'
                ],
                'expired_date' => [
                    'nullable',
                    'date',
                    'after:now'
                ],
                'description' => [
                    'nullable',
                    'string'
                ]
            ], [
                'name.regex' => 'The name may only contain letters, numbers, and spaces.',
                'code.unique' => 'This redeem code already exists.',
                'quota.min' => 'Quota must be at least 1.',
                'expired_date.after' => 'Expiration date must be in the future.',
            ]);

            if ($validated) {
                $create = RedeemCode::create([
                    'name' => $request->name,
                    'code' => $request->code,
                    'quota' => $request->quota,
                    'type' => 'bootcamp',
                    'expired_date' => $request->expired_date,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id
                ]);

                return redirect()->route('redeemCode.index')->with('success', 'Redeem Code created successfully!');
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid input data, please check again.');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    function getEdit(Request $request)
    {
        try {
            $data = RedeemCode::where('id', '=', $request->id)->first();
            return view('redeemcode::redeem_code.manage', compact('data'));
        } catch (\Exception $e) {
            return dd($e->getMessage());
        }
    }

    function postEdit(Request $request)
    {
        try {
            // dd($request->all());

            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    'regex:/^[a-zA-Z0-9\s]+$/'
                ],
                'code' => [
                    'required',
                    'string',
                    'unique:redeem_code,code,' . $request->id,
                    'max:100'
                ],
                'quota' => [
                    'required',
                    'numeric',
                    'min:1'
                ],
                'expired_date' => [
                    'nullable',
                    'date_format:Y-m-d\TH:i',
                    'after:now'
                ],
                'description' => [
                    'nullable',
                    'string'
                ]
            ], [
                'name.regex' => 'The name may only contain letters, numbers, and spaces.',
                'code.unique' => 'This redeem code already exists.',
                'quota.min' => 'Quota must be at least 1.',
                'expired_date.after' => 'Expiration date must be in the future.',
            ]);

            // Format date properly
            if ($request->has('expired_date')) {
                $validated['expired_date'] = Carbon::createFromFormat(
                    'Y-m-d\TH:i',
                    $request->expired_date
                )->format('Y-m-d H:i:s');
            }

            // Update data redeem code
            RedeemCode::where('id', $request->id)
                ->update([
                    'name' => $validated['name'],
                    'code' => $validated['code'],
                    'quota' => $validated['quota'],
                    'expired_date' => $validated['expired_date'] ?? null,
                    'description' => $validated['description'],
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            return redirect()->route('redeemCode.index')->with('success', 'Redeem Code updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
