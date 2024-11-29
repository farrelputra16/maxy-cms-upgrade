<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MClassTypeController extends Controller
{
    public function getClassType() {
        $MClassType = MClassType::all();

        return view('m_class_type.index', compact('MClassType'));
    }

    public function getAddClassType() {
        return view('m_class_type.add');
    }

    public function postAddClassType(Request $request) {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        if ($validate){
            $create = MClassType::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);

            if ($create){
                return app(HelperController::class)->Positive('getClassType');
            }
                return app(HelperController::class)->Negative('getClassType');
        }
    }

    public function getEditClassType(Request $request) {
        $currentData = MClassType::find($request->id);
        return view('m_class_type.edit', ['currentData' => $currentData]);
    }

    public function postEditClassType(Request $request) {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        if($validate){
            $update = MClassType::where('id', $request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'updated_id' => Auth::user()->id
            ]);
            
            if($update){
                return app(HelperController::class)->Positive('getClassType');
            } else {
                return app(HelperController::class)->Warning('getClassType');
            }
        }
    }
}
