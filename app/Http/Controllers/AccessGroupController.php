<?php

namespace App\Http\Controllers;

use App\Models\AccessMaster;
use Illuminate\Http\Request;
use App\Models\AccessGroup;
use App\Models\AccessGroupDetail;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class AccessGroupController extends Controller
{
    function getAccessGroup()
    {
        // $accessgroups = AccessGroup::all();
        return view('accessgroup.indexv3');
    }

    function getAccessGroupData(Request $request)
    {
        $searchValue = $request->input('search.value');
        $orderColumnIndex = $request->input('order.1.column');
        $orderDirection = $request->input('order.1.dir', 'asc');
        $columns = $request->input('columns');//dd($orderDirection);

        $orderColumn = 'id';
        if ($orderColumnIndex !== null && isset($columns[$orderColumnIndex])) {
            $orderColumn = $columns[$orderColumnIndex]['data'];
        }

        $accessGroup = AccessGroup::select('id', 'name', 'description', 'created_at', 'created_id', 'updated_at', 'updated_id', 'status')
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
                    $accessGroup->where('status', '=', 0);
                else
                    $accessGroup->where('status', '=', 1);
            } else {
                $accessGroup->where($columnName, 'like', "%{$columnSearchValue}%");
            }
        }

        return DataTables::of($accessGroup)
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
                    data-model="AccessGroup">
                    ' . ($row->status == 1 ? 'Aktif' : 'Non aktif') . '
                </button>';
            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('getEditAccessGroup', ['id' => $row->id]) . '" 
                            class="btn btn-primary rounded">Ubah</a>';
            })
            ->orderColumn('id', 'id $1')
            ->rawColumns(['name', 'slug', 'description', 'status', 'action']) // Allow HTML rendering
            ->make(true);
    }

    function getAddAccessGroup()
    {
        $accessMasters = AccessMaster::all();
        return view('accessgroup.addv3', ['accessMasters' => $accessMasters]);
    }

    public function postAddAccessGroup(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'description' => 'nullable|string|max:65535',
            'access_master' => 'required|array|min:1',
        ]);

        if ($validated) {
            $create = AccessGroup::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            $access_master = $request->get('access_master');
            $create->AccessMaster()->attach($access_master);

            if ($create) {
                return app(HelperController::class)->Positive('getAccessGroup');
            }
        }
    }

    function getEditAccessGroup(Request $request)
    {
        $idaccessgroup = $request->id;
        $accessgroups = AccessGroup::find($idaccessgroup);

        $currentData = array_column(json_decode(AccessGroupDetail::CurrentAccessGroupDetail($idaccessgroup)), 'name', 'id');
        $allAccessMaster = AccessMaster::AllAccessMaster();

        return view('accessgroup.editv3', [
            'accessgroups' => $accessgroups,
            'currentData' => $currentData,
            'allAccessMaster' => array_diff($allAccessMaster, $currentData)
        ]);
    }

    function postEditAccessGroup(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
            'description' => 'nullable|string|max:65535',
        ]);
        
        $idAccessGroup = $request->id;
        $access_group = AccessGroup::find($idAccessGroup);

        $currentAccess = $access_group->AccessMaster()->pluck('access_master_id')->toArray();
        $oldAccess = $request->access_master_old ?? [];

        if (array_diff($currentAccess, $oldAccess) !== [] && $request->access_master_available) {
            // $removeUpdate = AccessGroupDetail::RemoveUpdate($request);
            $removedAccess = array_diff($currentAccess, $oldAccess);
            $removeUpdate = $access_group->AccessMaster()->detach($removedAccess);

            $access_master = $request->get('access_master_available');

            // $access_group = AccessGroup::find($idAccessGroup);

            AccessGroup::postEditAccessGroup($request);

            if ($access_group && $removeUpdate) {
                $access_group->AccessMaster()->attach($access_master);
                return app(HelperController::class)->Positive('getAccessGroup');
            } else {
                return app(HelperController::class)->Negative('getAccessGroup');
            }
        } else if (array_diff($currentAccess, $oldAccess) !== []) {
            $removedAccess = array_diff($currentAccess, $oldAccess);
            $removeUpdate = $access_group->AccessMaster()->detach($removedAccess);
            // $removeUpdate = AccessGroupDetail::RemoveUpdate($request);

            AccessGroup::postEditAccessGroup($request);

            if ($removeUpdate) {
                return app(HelperController::class)->Positive('getAccessGroup');
            } else {
                return app(HelperController::class)->Negative('getAccessGroup');
            }
        } else if ($request->access_master_available) {
            $access_master = $request->get('access_master_available');
            // $access_group = AccessGroup::find($idAccessGroup);
            AccessGroup::postEditAccessGroup($request);
            if ($access_group) {
                $access_group->AccessMaster()->attach($access_master);
                return app(HelperController::class)->Positive('getAccessGroup');
            } else {
                return app(HelperController::class)->Negative('getAccessGroup');
            }
        } else {
            $updateOther = AccessGroup::postEditAccessGroup($request);
            if ($updateOther) {
                return app(HelperController::class)->Positive('getAccessGroup');
            }
            return app(HelperController::class)->Warning('getAccessGroup');
        }
    }
}
