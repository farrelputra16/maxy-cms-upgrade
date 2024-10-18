<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\MaxyTalk;
use App\Models\User;

class MaxyTalkController extends Controller
{
    //
    function getMaxyTalk()
    {
        $maxytalk = MaxyTalk::all();

        return view('maxytalk.indexv3', [
            'maxytalk' => $maxytalk
        ]);
    }

    function getAddMaxyTalk()
    {
        $maxytalk = MaxyTalk::all();
        $users = User::all();

        return view('maxytalk.addv3', [
            'maxytalk' => $maxytalk,
            'users' => $users
        ]);
    }

    public function postAddMaxyTalk(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'userid' => 'required',
            'priority' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validasi untuk gambar
        ]);

        if ($validate) {
            // Handling image upload
            $fileName = '';
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension; // Nama file unik
                $file->move(public_path('/uploads/maxytalk/'), $fileName); // Pindahkan ke direktori
            }

            // Create MaxyTalk entry
            $create = MaxyTalk::create([
                'name' => $request->name,
                'start_date' => $request->datestart,
                'end_date' => $request->dateend,
                'register_link' => $request->registration,
                'priority' => $request->priority,
                'users_id' => $request->userid,
                'maxy_talk_parent_id' => $request->parentsid,
                'description' => $request->description,
                'status' => $request->status == 1 ? 1 : 0,
                'img' => $fileName, // Simpan nama file gambar
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create) {
                return app(HelperController::class)->Positive('getMaxyTalk');
            }
            return app(HelperController::class)->Negative('getMaxyTalk');
        }
    }

    public function getEditMaxyTalk(Request $request)
    {
        $idMaxyTalk = $request->id;
        $maxytalk = MaxyTalk::find($idMaxyTalk);

        // Mengambil semua user untuk dropdown pemilihan user
        $users = User::all();

        // Mengambil semua MaxyTalk (jika ada yang menjadi parent) untuk dropdown parent (opsional)
        $maxytalk_all = MaxyTalk::whereNull('maxy_talk_parent_id')->get();

        // Mengirim data ke view edit
        return view('maxytalk.editv3', compact('maxytalk', 'users', 'maxytalk_all'));
    }


    public function postEditMaxyTalk(Request $request)
    {
        $idMaxyTalk = $request->id;

        // Validasi input
        $validated = $request->validate([
            'name' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'userid' => 'required',
            'priority' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Validasi untuk gambar
        ]);

        if ($validated) {
            // Handling gambar jika ada upload baru
            $fileName = '';
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension; // Nama file unik
                $file->move(public_path('/uploads/maxytalk/'), $fileName); // Pindahkan ke direktori

                // Hapus gambar lama jika ada (opsional)
                $oldMaxyTalk = MaxyTalk::find($idMaxyTalk);
                if ($oldMaxyTalk && $oldMaxyTalk->img) {
                    $oldImagePath = public_path('/uploads/maxytalk/' . $oldMaxyTalk->img);
                    if (File::exists($oldImagePath)) {
                        File::delete($oldImagePath); // Hapus gambar lama
                    }
                }
            } else {
                // Tetap gunakan gambar lama jika tidak ada upload baru
                $fileName = MaxyTalk::find($idMaxyTalk)->img;
            }

            // Update data MaxyTalk
            $updateData = MaxyTalk::where('id', $idMaxyTalk)
                ->update([
                    'name' => $request->name,
                    'start_date' => date('Y-m-d H:i:s', strtotime($request->datestart)),
                    'end_date' => date('Y-m-d H:i:s', strtotime($request->dateend)),
                    'register_link' => $request->registration,
                    'priority' => $request->priority,
                    'users_id' => $request->userid,
                    'maxy_talk_parent_id' => $request->parentsid,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'img' => $fileName, // Simpan nama file gambar baru atau lama
                    'updated_id' => Auth::user()->id,
                ]);

            if ($updateData) {
                return app(HelperController::class)->Positive('getMaxyTalk');
            } else {
                return app(HelperController::class)->Warning('getMaxyTalk');
            }
        } else {
            // Redirect jika validasi gagal
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

}
