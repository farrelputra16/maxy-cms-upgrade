<?php

namespace App\Http\Controllers;

use App\Models\AccessMaster;
use Illuminate\Http\Request;
use App\Models\AccessGroup;
use App\Models\AccessGroupDetail;
use DB;
use Illuminate\Support\Facades\Auth;


class AccessGroupController extends Controller
{
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/******  00ed2cb6-076e-4b7b-9f3f-77fec8966bae  *******/
    function getAccessGroup()
    {
        $accessgroups = AccessGroup::all();
        return view('accessgroup.indexv3', ['accessgroups' => $accessgroups]);
    }

    function getAddAccessGroup()
    {
        $accessMasters = AccessMaster::all();
        return view('accessgroup.addv3', ['accessMasters' => $accessMasters]);
    }

    public function postAddAccessGroup(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
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
            'name' => 'required',
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
