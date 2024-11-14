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
        return view('partner.indexv3', ['partners' => $partners]);
    }

    function getAddPartner() {
        $partnerTypes = Partner::select('type')
            ->whereNotNull('type')
            ->Where('type', '!=', '')
            ->groupBy('type')
            ->get();
        return view('partner.addv3', ['partnerTypes' => $partnerTypes]);
    }

    function postAddPartner(Request $request){

        $fileName = null;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/partner'), $fileName);
        }


        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'url' => 'required|url|max:255',
            'address' => 'required|string|max:65355',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^\+?[0-9\s\-]+$/|min:10',
            'contact_person' => 'required|regex:/^\+?[0-9\s\-]+$/|min:10',
        ]);

        if ($validate){
            $create = Partner::create([
                'name' => $request->name,
                'type' => $request->type,
                'logo' => $fileName,
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
        $partnerTypes = Partner::select('type')
            ->whereNotNull('type')
            ->Where('type', '!=', '')
            ->groupBy('type')
            ->get();
        return view('partner.editv3', ['partners' => $partners, 'partnerTypes' => $partnerTypes]);
    }

    function postEditPartner(Request $request){


        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/partner'), $fileName);
        }
        else{
            $fileName = $request->img_keep;
        }

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required',
            'url' => 'required|url|max:255',
            'address' => 'required|string|max:65355',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^\+?[0-9\s\-]+$/|min:10',
            'contact_person' => 'required',
        ]);

        if ($validate){
            $update = Partner::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'type' => $request->type,
                    'logo' => $fileName,
                    'url' => $request->url,
                    'address' => $request->address,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'contact_person' => $request->contact_person,
                    'status_highlight' => $request->status_highlight ? 1 : 0,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => auth()->user()->id
                ]);

            if ($update){
                return app(HelperController::class)->Positive('getPartner');
            } else {
                return app(HelperController::class)->Warning('getPartner');
            }
        }
    }
}
