<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccessMaster;
use Illuminate\Support\Facades\Auth;


class AccessMasterController extends Controller
{
    //
    public function getAccessMaster(){

        $accessmasters = AccessMaster::all();
        return view('accessmaster.indexv3', ['accessmasters' => $accessmasters]);
    }

    function getAddAccessMaster(){


        return view('accessmaster.addv3');
    }

    public function PostAddAccessMaster(Request $request){
        $validated = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
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
            'name' => 'required|regex:/^[a-zA-Z0-9\s]+$/|max:255',
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
