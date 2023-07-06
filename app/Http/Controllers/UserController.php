<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccessGroup;
use DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    function getUser(){
        // $userlist = User::all();
        // return view('userlist.index',['userlist' => $userlist]);

        $users = collect(DB::select('SELECT users.id, 
            users.name, 
            users.email,
            users.description,
            users.status, 
            users.created_at, 
            users.updated_at, 
            access_group.name AS accessgroup 
            FROM users
            INNER JOIN access_group ON users.access_group_id = access_group.id'
        ));

        return view('user.index',['users' => $users]);
    }

    function getAddUser(){
        $allAccessGroups = AccessGroup::all();
        return view('user.add', [
            'allAccessGroups' => $allAccessGroups
        ]);
    }

    function postAddUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5',
            'type' => 'required',
            'access_group' => 'required'
        ]);

        if ($validated){
            $passwordcrpyt= bcrypt($validated['password']);
            $create = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordcrpyt,
                'type' => $request->type,
                'access_group_id' => $request->access_group,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);
            if ($create){
                return app(HelperController::class)->Positive('getUser');
            }
            return app(HelperController::class)->Negative('getUser');
        }
    }

    function getEditUser(Request $request){
        $currentData = collect(DB::select('SELECT
            users.*,
            access_group.id AS access_group_id,
            access_group.name AS access_group_name
            FROM users
            JOIN access_group
            WHERE users.access_group_id = access_group.id
            AND users.id = ?;
        ', [$request->id]));

        $allAccessGroups = AccessGroup::whereNot('id', $currentData->value('access_group_id'))->get();

        return view('user.edit', [
            'currentData' => $currentData,
            'allAccessGroups' => $allAccessGroups
        ]);
    }

    function postEditUser(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if($validate){
            $users = User::where('id', $request->id)->first();
            $update = User::where('id', $request->id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $request->password != $users->password ? bcrypt($request->password) : $request->password,
                    'type' => $request->type,
                    'access_group_id' => $request->access_group,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0
                ]);

            if($update){
                return app(HelperController::class)->Positive('getUser');
            } else {
                return app(HelperController::class)->Warning('getUser');
            }
        }
    }
}