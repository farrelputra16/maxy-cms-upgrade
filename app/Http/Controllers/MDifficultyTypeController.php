<?php

namespace App\Http\Controllers;
use App\Models\MDifficultyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MDifficultyTypeController extends Controller
{
    //
    function getDifficulty(){
        $mDifficulties = MDifficultyType::all();
        return view('m_difficulty_type.index', ['mDifficulties' => $mDifficulties]);
    }

    function getAddDifficulty(){
        return view('m_difficulty_type.add');
    }

    function postAddDifficulty(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate){
            $create = MDifficultyType::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getDifficulty');
            }
                return app(HelperController::class)->Negative('getDifficulty');
        }
    }

    function getEditDifficulty(Request $request){
        $currentData = MDifficultyType::find($request->id);
        return view('m_difficulty_type.edit', ['currentData' => $currentData]);
    }

    function postEditDifficulty(Request $request){
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $update = MDifficultyType::where('id', '=', $request->id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id
                ]);

            if($update){
                return app(HelperController::class)->Positive('getDifficulty');
            } else {
                return app(HelperController::class)->Warning('getDifficulty');
            }
        }
    }
}
