<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MPartnerType;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class MPartnerTypeController extends Controller
{
    function getPartnerType(){
        // $MPartnerType = MPartnerType::all();
        return view('m_partner_type.indexv3');
    }

    function getPartnerTypeData(Request $request){
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $orderColumnMapping = [
            'DT_RowIndex' => 'id',
        ];

        // Gunakan mapping untuk menentukan kolom pengurutan
        $finalOrderColumn = $orderColumnMapping[$orderColumn] ?? $orderColumn;

        $mPartnerType = MPartnerType::select('id', 'name', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
            ->orderBy($finalOrderColumn, $orderDirection);

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
                if ($columnSearchValue == 'active')
                    $mPartnerType->where('status', '=', 1);
                else
                    $mPartnerType->where('status', '=', 0);
            } else {
                $mPartnerType->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($mPartnerType)
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
                    data-model="MPartnerType">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditPartnerType', ['id' => $row->id, 'access' => 'm_Partner_type_update']) . '"
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'slug', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddPartnerType(){
        return view('m_partner_type.addv3');
    }

    function postAddPartnerType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MPartnerType::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getPartnerType');
            }
                return app(HelperController::class)->Negative('getPartnerType');
        }
    }

    function getEditPartnerType(Request $request){
        $currentData = MPartnerType::find($request->id);
        return view('m_partner_type.editv3', ['currentData' => $currentData]);
    }

    function postEditPartnerType(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MPartnerType::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getPartnerType');
            } else {
                return app(HelperController::class)->Warning('getPartnerType');
            }
        }
    }
}
