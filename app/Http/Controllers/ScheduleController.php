<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;

class ScheduleController extends Controller
{
    function getSchedule(){
        $schedules = Schedule::all();

        return view('schedule.index',[
            'schedules' => $schedules
        ]);
    
    }
    
    function postAddSchedule(Request $request){
        try {
            // return dd($request->all());
            $validated= $request->validate([
                'title' => 'required',
                'category' => 'required',
                'start' => 'required',
                'end' => 'required',
            ]);

            if ($validated){
                $create = Schedule::create([
                    'name' => $request->title,
                    'category' => $request->category,
                    'date_start' => date('Y-m-d H:i:s', strtotime($request->start)),
                    'date_end' => date('Y-m-d H:i:s', strtotime($request->end)),
                    'status' => 1,
                    'created_id' => Auth::user()->id,
                    'updated_id' => Auth::user()->id,
                ]);
                if ($create){
                    return response()->json(['success' => 'Success', 'create' => $create], 200);
                }
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    function postEditSchedule(Request $request){
        try {
            // return dd($request->all());
            $validated= $request->validate([
                'id' => 'required',
            ]);

            if ($validated){
                $currentData = Schedule::find($request->id);
                $updateData = Schedule::where('id', $request->id)
                    ->update([
                        'name' => $request->title ? $request->title : $currentData->name,
                        'category' => $request->category ? $request->category : $currentData->category,
                        'date_start' => $request->start ? date('Y-m-d H:i:s', strtotime($request->start)) : $currentData->date_start,
                        'date_end' => $request->end ? date('Y-m-d H:i:s', strtotime($request->end)) : $currentData->date_end,
                        'status' => 1,
                        'updated_id' => Auth::user()->id,
                    ]);
                return response()->json(['success' => 'Success', 'updateData' => $updateData], 200);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    function postDeleteSchedule(Request $request){
        try {
            // return dd($request->all());
            $validated= $request->validate([
                'id' => 'required',
            ]);

            if ($validated){
                $currentData = Schedule::find($request->id);
                
                if ($currentData) {
                    $currentData->delete();

                    // Return a response or redirect
                    return response()->json(['success' => 'Success', 'currentData' => $currentData], 200);
                }

                // If user not found
                return response()->json(['message' => 'Data not found.'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }
}
