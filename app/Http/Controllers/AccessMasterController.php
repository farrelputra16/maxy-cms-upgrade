<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessMaster;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class AccessMasterController extends Controller
{
    //
    public function getAccessMaster(){

        // $accessmasters = AccessMaster::all();
        return view('accessmaster.indexv3');
    }

    function getAccessMasterData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $accessMaster = AccessMaster::select('id', 'name', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
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
                    $accessMaster->where('status', '=', 0);
                else
                    $accessMaster->where('status', '=', 1);
            } else {
                $accessMaster->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($accessMaster)
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
                    data-model="AccessMaster">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditAccessMaster', ['id' => $row->id]) . '" 
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'slug', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddAccessMaster(){


        return view('accessmaster.addv3');
    }

    public function PostAddAccessMaster(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:65535'
        ]);

        if ($validated){
            $create = AccessMaster::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getAccessMaster');
            }
            return app(HelperController::class)->Negative('getAccessMaster');
        }
    }

    function getEditAccessMaster(Request $request){
        $idaccessmaster = $request->id;
        $accessmasters = AccessMaster::find($idaccessmaster);

        return view('accessmaster.editv3', [
            'accessmasters' => $accessmasters
        ]);
    }

    function postEditAccessMaster(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:65535'
        ]);
        $idaccessmaster = $request->id;

        $updateData = AccessMaster::postEditAccessMaster($request);

        if ($updateData){
            return app(HelperController::class)->Positive('getAccessMaster');
        } else {
            return app(HelperController::class)->Warning('getAccessMaster');
        }
    }
}
