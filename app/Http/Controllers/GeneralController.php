<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\General;

class GeneralController extends Controller
{
    //
    function getGeneral(){
        $generals = General::all();
        
        return view('general.index', ['generals' => $generals]);
    }
    
    function getAddGeneral(){

        return view('general.add');
    }

    function postAddGeneral(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'value' => 'required'
        ]);

        if ($validate){
            $create = General::create([
                'name' => $request->name,
                'value' => $request->value,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if($create){
                return app(HelperController::class)->Positive('getGeneral');
            } else {
                return app(HelperController::class)->Negative('getGeneral');
    
           }
        }
    }

    function getEditGeneral(Request $request){
        $idgeneral = $request->id;
        $generals = General::find($idgeneral);

        return view('general.edit', [
            'generals' => $generals
        ]);
    }

    function postEditGeneral(Request $request){
        $idgeneral = $request->id;

        $validate = $request->validate([
            'name' =>'required',
            'value' =>'required'
        ]);

        if ($validate){
            $update = DB::table('general')
            ->where('id', $idgeneral)
            ->update([
                'name' => $request->name,
                'value' => $request->value,
                'description' => $request->description,
               'status' => $request->status? 1 : 0,
                'updated_id' => Auth::user()->id
            ]);

            if($update){
                return app(HelperController::class)->Positive('getGeneral');
            } else {
                return app(HelperController::class)->Warning('getGeneral');
            } 
        }
    }
}