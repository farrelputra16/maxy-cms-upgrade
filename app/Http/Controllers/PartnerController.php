<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Auth;
use DB;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    //
    function getPartner(){
        $partners = Partner::all();
        return view('partner.index', ['partners' => $partners]);
    }

    function getAddPartner(){
        return view('partner.add');
    }

    function postAddPartner(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'url' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required|int',
            'contact_person' => 'required|int',
        ]);

        if ($validate){
            $create = Partner::create([
                'name' => $request->name,
                'type' => $request->type,
                'logo' => $request->logo,
                'url' => $request->url,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
                'contact_person' => $request->contact_person,
                'status_highlight' => $request->status_highlight ? 1 : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getPartner');
            } else {
                return app(HelperController::class)->Negative('getPartner');
            }
        }
    }

    function getEditPartner(Request $request){
        $partners = Partner::find($request->id);
        return view('partner.edit', ['partners' => $partners]);
    }

    function postEditPartner(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'url' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'contact_person' => 'required',
        ]);

        if ($validate){
            $update = DB::table('partner')->where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'type' => $request->type,
                    'logo' => $request->logo ? $request->logo : $request->logo_dump,
                    'url' => $request->url,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'contact_person' => $request->contact_person,
                    'status_highlight' => $request->status_highlight ? 1 : 0,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if ($update){
                return app(HelperController::class)->Positive('getPartner');
            } else {
                return app(HelperController::class)->Warning('getPartner');
            }
        }   
    }
}
