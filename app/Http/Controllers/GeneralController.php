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

    function postAddGeneral(Request $request)
    {
        // Validasi awal untuk memastikan name dan type ada
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:text,richtext',
        ]);

        // Validasi tambahan berdasarkan tipe input
        if ($request->type === 'text') {
            $request->validate([
                'value-text' => 'required|string',
            ]);
            $value = $request->input('value-text');
        } elseif ($request->type === 'richtext') {
            $request->validate([
                'value-richtext' => 'required|string',
            ]);
            $value = $request->input('value-richtext');
        }

        // Simpan data ke database
        $create = General::create([
            'name' => $request->input('name'),
            'value' => $value,
            'description' => $request->input('description'),
            'status' => $request->input('status') ? 1 : 0,
            'created_id' => Auth::user()->id,
            'updated_id' => Auth::user()->id,
        ]);

        // Cek hasil penyimpanan
        if ($create) {
            return app(HelperController::class)->Positive('getGeneral');
        } else {
            return app(HelperController::class)->Negative('getGeneral');
        }
    }


    function getEditGeneral(Request $request){
        $idgeneral = $request->id;
        $generals = General::find($idgeneral);

        return view('m_general.editv3', [
            'generals' => $generals
        ]);
    }

    public function postEditGeneral(Request $request)
{
    $idgeneral = $request->id;

    // Validasi untuk input name dan value
    $validate = $request->validate([
        'name' => 'required',
        'status' => 'nullable|boolean',
    ]);

    if ($validate) {
        // Mengecek apakah name adalah 'logo' atau 'icon'
        if ($request->name == 'logo' || $request->name == 'icon') {
            // Jika ada file gambar yang diupload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $request->name . '.png'; // Menyimpan file sebagai logo.png atau icon.png
                $destinationPath = public_path('/uploads/images');

                // Membuat folder jika belum ada
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0777, true, true);
                }

                // Menyimpan file ke dalam folder
                $file->move($destinationPath, $fileName);

                // Path gambar yang baru
                $imagePath = '/uploads/images/' . $fileName;
            } else {
                // Jika tidak ada gambar yang diupload, menggunakan value yang ada
                $imagePath = $request->value;
            }

            // Update data untuk logo atau icon
            $update = General::where('id', $idgeneral)
                ->update([
                    'name' => $request->name,
                    'value' => $imagePath, // Menyimpan path gambar di kolom value
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        } else {
            // Jika bukan logo atau icon, menangani text atau richtext
            if ($request->type == 'text') {
                // Validasi untuk text
                $request->validate([
                    'value-text' => 'required|string',
                ]);
                $value = $request->input('value-text');
            } elseif ($request->type == 'richtext') {
                // Validasi untuk richtext
                $request->validate([
                    'value-richtext' => 'required|string',
                ]);
                $value = $request->input('value-richtext');
            }

            // Update data untuk teks atau richtext
            $update = General::where('id', $idgeneral)
                ->update([
                    'name' => $request->name,
                    'value' => $value, // Menyimpan value text atau richtext
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);
        }

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
