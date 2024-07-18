<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;

class KategoriController extends Controller
{
    function getKategori(){
        $Kategoris = Kategori::all();

        return view('kategori.index',[
            'Kategoris' => $Kategoris
        ]);
    
    }
    function getAddKategori(){
        
        return view('kategori.add');
    }

    function postAddKategori(Request $request){
        //return dd($request);
        $validated= $request->validate([
            'name' => 'required',
        ]);

        if ($validated){
            $image = '';
            $create = Kategori::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create)
                return app(HelperController::class)->Positive('getKategori');
            else
                return app(HelperController::class)->Negative('getKategori');
        }
    }

    function getEditKategori(Request $request){
        $idKategori = $request->id;
        $Kategori = Kategori::find($idKategori);

        return view('kategori.edit',[
            'Kategori' => $Kategori,
        ]);
    }

    function postEditKategori(Request $request){
        $idKategori = $request->id;

        $updateData = Kategori::where('id', $idKategori)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0
            ]);

        if ($updateData){
            return app(HelperController::class)->Positive('getKategori');
        } else{
            return app(HelperController::class)->Warning('getKategori');
        }
    }
}
