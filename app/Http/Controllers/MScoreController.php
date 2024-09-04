<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MScore;
use Illuminate\Support\Facades\Auth;

class MScoreController extends Controller
{
    function getScore(){
        $MScore = MScore::all();
        return view('m_score.index', ['data' => $MScore]);
    }

    function getAddScore(){
        return view('m_score.add');
    }

    function postAddScore(Request $request){
        $validate = $request->validate([
            'name' => 'required',
        ]);

        if ($validate){
            $create = MScore::create([
                'name' => $request->name,
                'range_start' => $request->range_start,
                'range_end' => $request->range_end,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getScore');
            }
                return app(HelperController::class)->Negative('getScore');
        }
    }

    function getEditScore(Request $request){
        $currentData = MScore::find($request->id);
        return view('m_score.edit', ['data' => $currentData]);
    }

    function postEditScore(Request $request){
        $validate = $request->validate([
            'name' => 'required',
        ]);

        if($validate){
            $update = MScore::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'range_start' => $request->range_start,
                    'range_end' => $request->range_end,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getScore');
            } else {
                return app(HelperController::class)->Warning('getScore');
            }
        }
    }
}
