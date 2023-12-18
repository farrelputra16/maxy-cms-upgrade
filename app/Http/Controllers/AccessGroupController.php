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

    function getAccessGroup(){
        $accessgroups = AccessGroup::all();
        return view('accessgroup.index', ['accessgroups' => $accessgroups]);
    }

    function getAddAccessGroup(){
        $accessMasters = AccessMaster::all();
        return view('accessgroup.add', ['accessMasters' => $accessMasters]);
    }

    public function postAddAccessGroup(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'access_master' => 'required|array|min:1',
        ]);

        if ($validated){
            $create = AccessGroup::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            $access_master = $request->get('access_master');
            $create->AccessMaster()->attach($access_master);

            if ($create){
                return app(HelperController::class)->Positive('getAccessGroup');
            }
        }
    }

    function getEditAccessGroup(Request $request){
        $idaccessgroup = $request->id;
        $accessgroups = AccessGroup::find($idaccessgroup);

        $currentData = array_column(json_decode(AccessGroupDetail::CurrentAccessGroupDetail($idaccessgroup)), 'name', 'id');
        $allAccessMaster = array_column(json_decode(AccessMaster::AllAccessMaster()), 'name', 'id');

        return view('accessgroup.edit', [
            'accessgroups' => $accessgroups,
            'currentData' => $currentData,
            'allAccessMaster' => array_diff($allAccessMaster, $currentData)
        ]);
    }

    function postEditAccessGroup(Request $request){
        $idAccessGroup = $request->id;

        if ($request->access_master_old && $request->access_master_available){
            $removeUpdate = AccessGroupDetail::RemoveUpdate($request);

            $access_master = $request->get('access_master_available');
        
            $access_group = AccessGroup::find($idAccessGroup);

            AccessGroup::postEditAccessGroup($request);
            
            if ($access_group && $removeUpdate){
                $access_group->AccessMaster()->attach($access_master);
                return app(HelperController::class)->Positive('getAccessGroup');
            } else {
                return app(HelperController::class)->Negative('getAccessGroup');
            }
        } else if ($request->access_master_old){
            $removeUpdate = AccessGroupDetail::RemoveUpdate($request);

            AccessGroup::postEditAccessGroup($request);

            if ($removeUpdate){
                return app(HelperController::class)->Positive('getAccessGroup');
            } else {
                return app(HelperController::class)->Negative('getAccessGroup');
            }
        } else if ($request->access_master_available){
            $access_master = $request->get('access_master_available');
            
            $access_group = AccessGroup::find($idAccessGroup);

            AccessGroup::postEditAccessGroup($request);
            
            if ($access_group){
                $access_group->AccessMaster()->attach($access_master);
                return app(HelperController::class)->Positive('getAccessGroup');
            } else {
                return app(HelperController::class)->Negative('getAccessGroup');
            }
        } else {
            $updateOther = AccessGroupDetail::postEditAccessGroup($request);

            if ($updateOther){
                return app(HelperController::class)->Positive('getAccessGroup');
            }
            return app(HelperController::class)->Warning('getAccessGroup');
        }
    }
}