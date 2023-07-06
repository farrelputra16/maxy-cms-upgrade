<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MaxyTalk;
use App\Models\User;

class MaxyTalkController extends Controller
{
    //
    function getMaxyTalk(){
        $maxytalk = MaxyTalk::all();

        return view('maxytalk.index', [
            'maxytalk' => $maxytalk
            ]);
        
    }

    function getAddMaxyTalk(Request $request){
        $maxytalk = MaxyTalk::all();
        $users = User::all();

        return view('maxytalk.add', [
            'maxytalk' => $maxytalk,
            'users' => $users
        ]);
    }

    function postAddMaxyTalk(Request $request){
        $validate = $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'users_id' => 'required'
        ]);

        if($validate){
            $create=MaxyTalk::create([
                'name' => $request->name,
                'start_date' => $request->datestart,
                'end_date' => $request->dateend,
                'register_link' => $request->registration,
                'users_id' => $request->userid,
                'maxy_talk_parent_id' => $request->parentsid,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getMaxyTalk');
            }
            return app(HelperController::class)->Negative('getMaxyTalk');
        }
    }
}
