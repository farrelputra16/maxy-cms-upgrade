<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\General;
use Illuminate\Support\Facades\File;

class GeneralController extends Controller
{
    //
    function getGeneral(){
        $generals = General::all();

        return view('m_general.indexv3', ['generals' => $generals]);
    }

    function getAddGeneral(){

        return view('m_general.addv3');
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

        return view('m_general.editv3', [
            'generals' => $generals
        ]);
    }

    function postEditGeneral(Request $request){
        $idgeneral = $request->id;

        $validate = $request->validate([
            'name' => 'required',
            'value' => 'required',
            'image' => 'nullable|image|mimes:png|max:2048'
        ]);


        if ($validate) {
            $imagePath = $request->value; // Default to the value from the request

            // Mengecek apakah ada file gambar yang diupload
            // if ($request->hasFile('image')) {
            //     // Ambil file gambar yang diupload
            //     $image = $request->file('image');

            //     // Rename file gambar menjadi 'logo.png' dan simpan path-nya
            //     $imagePath = $image->storeAs('/images', 'logo.png', 'public');
            // }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = 'logo.png';
                $destinationPath = public_path('/uploads/images');
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $file->move($destinationPath, $fileName);
            }

            // Update data pada tabel General dengan menyimpan path gambar di kolom `value`
            $update = General::where('id', $idgeneral)
                ->update([
                    'name' => $request->name,
                    'value' => $imagePath, // Menyimpan path gambar ke kolom value
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);

            if ($update) {
                return app(HelperController::class)->Positive('getGeneral');
            } else {
                return app(HelperController::class)->Warning('getGeneral');
            }
        }
    }

    function deactivateGeneral(Request $request, $id) {
        $general = General::find($id);

        if ($general) {
            $general->status = 0; // Set status menjadi non aktif
            $general->save();
            return redirect()->route('getGeneral')->with('success', 'Pengaturan umum dinonaktifkan.');
        } else {
            return redirect()->route('getGeneral')->with('error', 'Pengaturan umum tidak ditemukan.');
        }
    }
}
