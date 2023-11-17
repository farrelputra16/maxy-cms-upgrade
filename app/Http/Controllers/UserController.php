<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccessGroup;
use App\Models\MProvince;
use App\Models\Partner;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Imports\UserImport;

class UserController extends Controller
{
    //
    function getUser(){
        // $userlist = User::all();
        // return view('userlist.index',['userlist' => $userlist]);

        $users = User::getAllUserWithAccessGroup();

        return view('user.index',['users' => $users]);
    }

    function getAddUser(){
        $allAccessGroups = AccessGroup::all();
        $allProvince = MProvince::all();
        $allPartner = Partner::all();

        return view('user.add', [
            'allAccessGroups' => $allAccessGroups,
            'allProvince' => $allProvince,
            'allPartner' => $allPartner
        ]);
    }

    function postAddUser(Request $request){
        // dd($request->province);

        // return dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5',
            'access_group' => 'required',
            'phone' => 'required|int'
        ]);

        if ($request->hasFile('file_image')) {
            $file = $request->file('file_image');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('/uploads/user_profile_pic'), $fileName);
        }

        if ($validated){
            $passwordcrpyt= bcrypt($validated['password']);
            $create = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordcrpyt,
                'description' => $request->description , 
                'access_group_id' => $request->access_group,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
                'nickname' => $request->nickname,
                'referal' => $request->referal,
                'date_of_birth' => $request->birth,
                'university' => $request->university,
                'major' => $request->major,
                'semester' => $request->semester,
                'city' => $request->city,
                'country' => $request->country,
                'postal_code' => $request->postal_code,
                'm_province_id' => $request->province,
                'linked_in' => $request->linkedin,
                'request' => $request->user_request,
                'profile_picture' => $fileName,
                'm_partner_id' => $request->partner,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            if ($create){
                return app(HelperController::class)->Positive('getUser');
            }
            return app(HelperController::class)->Negative('getUser');
        }
    }

    function getEditUser(Request $request){

        $currentData = User::select(
            'users.*',
            'access_group.id AS access_group_id',
            'access_group.name AS access_group_name'
        )
            ->join('access_group', 'users.access_group_id', '=', 'access_group.id')
            ->where('users.id', $request->id)
            ->first();

        // return dd($currentData);

        $allAccessGroups = AccessGroup::where('id', '<>', $currentData->access_group_id)->get();
        $allProvince = MProvince::all();
        $allPartner = Partner::all();

        return view('user.edit', [
            'currentData' => $currentData,
            'allAccessGroups' => $allAccessGroups,
            'allProvince' => $allProvince,
            'allPartner' => $allPartner
        ]);
    }

    function postEditUser(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'access_group' => 'required',
            'phone' => 'required|int'
        ]);

        // return dd($request);
        
        if($validate){
            $users = User::where('id', $request->id)->first();
            if ($request->hasFile('file_image')) {
                $file = $request->file('file_image');
                $fileName = $file->getClientOriginalName();
                $file->move(public_path('/uploads/user_profile_pic'), $fileName);

                $update = User::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password != $users->password ? bcrypt($request->password) : $request->password,
                    'access_group_id' => $request->access_group,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0 ,
                    'created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id,
                    'nickname' => $request->nickname,
                    'referal' => $request->referal,
                    'date_of_birth' => $request->birth,
                    'university' => $request->university,
                    'major' => $request->major,
                    'semester' => $request->semester,
                    'city' => $request->city,
                    'country' => $request->country,
                    'postal_code' => $request->postal_code,
                    'm_province_id' => $request->province,
                    'linked_in' => $request->linkedin,
                    'request' => $request->user_request,
                    'profile_picture' => $fileName,
                    'm_partner_id' => $request->partner,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]);
            } else {
                $update = User::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password != $users->password ? bcrypt($request->password) : $request->password,
                    'access_group_id' => $request->access_group,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0 ,
                    'created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id,
                    'nickname' => $request->nickname,
                    'referal' => $request->referal,
                    'date_of_birth' => $request->birth,
                    'university' => $request->university,
                    'major' => $request->major,
                    'semester' => $request->semester,
                    'city' => $request->city,
                    'country' => $request->country,
                    'postal_code' => $request->postal_code,
                    'm_province_id' => $request->province,
                    'linked_in' => $request->linkedin,
                    'request' => $request->user_request,
                    'm_partner_id' => $request->partner,
                    'phone' => $request->phone,
                    'address' => $request->address
                ]);
            }
        }
      
        if($update){
            return app(HelperController::class)->Positive('getUser');
        } else {
            return app(HelperController::class)->Warning('getUser');
        }
    
    }

    function importCSV(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt', // Hanya menerima file CSV
        ]);

        // Proses impor file CSV
        $import = new UserImport(); // Ganti dengan nama import yang sesuai
        Excel::import($import, $request->file('csv_file'));

        // Redirect dengan pesan sukses jika berhasil
        return redirect()->route('getUser')->with('success', 'Data berhasil diimpor dari file CSV.');
    }
}