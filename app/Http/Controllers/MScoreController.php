<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MScore;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MScoreController extends Controller
{
    function getScore(){
        $MScore = MScore::all();
        return view('m_score.index', ['data' => $MScore]);
    }

    function getScoreData(Request $request){
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $mScore = MScore::select('id', 'name', 'range_start', 'range_end', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($orderColumn, $orderDirection);

        // global search datatable
        // if (!empty($searchValue)) {
        //     $partners->where(function ($q) use ($searchValue, $columns) {
        //         foreach ($columns as $column) {
        //             $columnName = $column['data'];

        //             if (in_array($columnName, ['DT_RowIndex', 'action'])) {
        //                 continue;
        //             } else if ($columnName === 'm_partner_type') {
        //                 $q->orWhereHas('MPartnerType', function ($query) use ($searchValue) {
        //                     $query->where('name', 'like', "%{$searchValue}%");
        //                 });
        //             } else {
        //                 $q->orWhere($columnName, 'like', "%{$searchValue}%");
        //             }
        //         }
        //     });
        // }

        // Filter kolom
        foreach ($columns as $column) {
            $columnSearchValue = $column['search']['value'] ?? null;
            $columnName = $column['data'];
            if (empty($columnSearchValue) || in_array($columnName, ['DT_RowIndex', 'action'])) {
                continue;
            } else if ($columnName == 'status') {
                if (strpos(strtolower($columnSearchValue), 'non') !== false)
                    $mScore->where('status', '=', 0);
                else
                    $mScore->where('status', '=', 1);
            } else {
                $mScore->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($mScore)
            ->addIndexColumn() // Adds DT_RowIndex for serial number
            ->addColumn('id', function ($row) {
                return $row->id;
            })
            ->addColumn('name', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' . e($row->name) . '">'
                    . \Str::limit(e($row->name), 30)
                    . '</span>';
            })
            ->addColumn('description', function ($row) {
                return '<span class="data-medium" data-toggle="tooltip" data-placement="top" title="' 
                    . e(strip_tags($row->description)) . '">' 
                    . (!empty($row->description) ? \Str::limit(strip_tags($row->description), 30) : '-') 
                    . '</span>';
            })
            ->addColumn('range_start', function ($row) {
                return $row->range_start;
            })
            ->addColumn('range_end', function ($row) {
                return $row->range_end;
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
                    data-model="MScore">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditScore', ['id' => $row->id]) . '" 
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'slug', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddScore(){
        return view('m_score.add');
    }

    function postAddScore(Request $request){
        $validate = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'range_start' => 'required|numeric|max:100',
            'range_end' => 'required|numeric|max:100|gt:range_start',
            'description' => 'nullable|string|max:65535',
        ], [
            'range_end.gt' => 'The range end must be greater than the range start.',
        ]);        

        if ($validate){
            $create = MScore::create([
                'name' => $request->name,
                'range_start' => $request->range_start,
                'range_end' => $request->range_end,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getScore');
            }
                return app(HelperController::class)->Negative('getScore');
        }
    }

    function getEditScore(Request $request){
        $currentData = MScore::find($request->id);
        return view('m_score.edit', ['data' => $currentData]);
    }

    function postEditScore(Request $request){
        $validate = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'range_start' => 'required|numeric|max:100',
            'range_end' => 'required|numeric|max:100|gt:range_start',
            'description' => 'nullable|string|max:65535',
        ], [
            'range_end.gt' => 'The range end must be greater than the range start.',
        ]);

        if($validate){
            $update = MScore::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'range_start' => $request->range_start,
                    'range_end' => $request->range_end,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getScore');
            } else {
                return app(HelperController::class)->Warning('getScore');
            }
        }
    }
}
