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
    function getAddSchedule(){
        
        return view('schedule.add');
    }

    function postAddSchedule(Request $request){
        //return dd($request);
        $validated= $request->validate([
            'name' => 'required',
            'short_desc' => 'required',
            'date' => 'required',
        ]);

        if ($validated){
            $image = '';
            $create = Schedule::create([
                'name' => $request->name,
                'short_desc' => $request->short_desc,
                'date' => date('Y-m-d', strtotime($request->date)),
                'image' => $image,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create){
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $image = $create->id;
                    $destinationPath = public_path('/uploads/schedule/about-us');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $image);
                }
                $updateData = Schedule::where('id', $create->id)->update([ 'image' => $image ]);
                if ($updateData){
                    return app(HelperController::class)->Positive('getSchedule');
                } else{
                    return app(HelperController::class)->Warning('getSchedule');
                }
            }
            return app(HelperController::class)->Negative('getSchedule');
        }
    }

    function getEditSchedule(Request $request){
        $idschedule = $request->id;
        $schedule = Schedule::find($idschedule);

        return view('schedule.edit',[
            'schedule' => $schedule,
        ]);
    }

    function postEditSchedule(Request $request){
        $idschedule = $request->id;

        $updateData = Schedule::where('id', $idschedule)
            ->update([
                'name' => $request->name,
                'short_desc' => $request->short_desc,
                'date' => date('Y-m-d', strtotime($request->date)),
                'description' => $request->description,
                'status' => $request->status ? 1 : 0
            ]);

        if ($updateData){
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $image = $idschedule;
                $destinationPath = public_path('/uploads/schedule/about-us');
                if (!File::exists($destinationPath)) { // create folder jika blm ada
                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $file->move($destinationPath, $image);
            }
            return app(HelperController::class)->Positive('getSchedule');
        } else{
            return app(HelperController::class)->Warning('getSchedule');
        }
    }
}
