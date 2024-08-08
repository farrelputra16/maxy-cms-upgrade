<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\MEventType;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;

class EventController extends Controller
{
    function getEvent(){
        $events = Event::all();

        return view('event.index',[
            'events' => $events
        ]);
    
    }
    function getAddEvent(){
        $event_types = MEventType::where('status', 1)->get();

        return view('event.add',[
            'event_types' => $event_types
        ]);
    }

    function postAddEvent(Request $request){
        // return dd($request);
        $validated= $request->validate([
            'name' => 'required',
            'date_start' => 'required|date|after_or_equal:now',
            'date_end' => 'required|date|after_or_equal:now',
            'image' => 'required',
            'url' => 'nullable|url',
        ]);

        if ($validated){
            $image = '';
            $create = Event::create([
                'm_event_type_id' => $request->event_type,
                'name' => $request->name,
                'date_start' => date('Y-m-d H:i:s', strtotime($request->date_start)),
                'date_end' => date('Y-m-d H:i:s', strtotime($request->date_end)),
                'image' => $image,
                'url' => $request->url,
                'is_need_verification' => $request->need_verification ? 1 : 0,
                'is_public' => $request->public ? 1 : 0,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create){
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $image = $create->id;
                    $destinationPath = public_path('/uploads/event');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $image);
                }
                $updateData = Event::where('id', $create->id)->update([ 'image' => $image ]);
                if ($updateData){
                    return app(HelperController::class)->Positive('getEvent');
                } else{
                    return app(HelperController::class)->Warning('getEvent');
                }
            }
            return app(HelperController::class)->Negative('getEvent');
        } else
            return redirect()->back()->withErrors($validated)->withInput();
    }

    function getEditEvent(Request $request){
        $idevent = $request->id;
        $event = Event::find($idevent);
        $event_types = MEventType::where('status', 1)->get();

        return view('event.edit',[
            'event' => $event,
            'event_types' => $event_types,
        ]);
    }

    function postEditEvent(Request $request){//dd($request);
        $idevent = $request->id;

        $validated= $request->validate([
            'name' => 'required',
            'date_start' => 'required|date|after_or_equal:now',
            'date_end' => 'required|date|after_or_equal:now',
            'url' => 'nullable|url',
        ]);

        if ($validated){
            $updateData = Event::where('id', $idevent)
                ->update([
                    'm_event_type_id' => $request->event_type,
                    'name' => $request->name,
                    'date_start' => date('Y-m-d H:i:s', strtotime($request->date_start)),
                    'date_end' => date('Y-m-d H:i:s', strtotime($request->date_end)),
                    'url' => $request->url,
                    'is_need_verification' => $request->need_verification ? 1 : 0,
                    'is_public' => $request->public ? 1 : 0,
                    'description' => $request->description,
                    'status' => $request->status ? 1 : 0,
                    'updated_id' => Auth::user()->id,
                ]);

            if ($updateData){
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $image = $idevent;
                    $destinationPath = public_path('/uploads/event');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $image);
                }
                return app(HelperController::class)->Positive('getEvent');
            } else{
                return app(HelperController::class)->Warning('getEvent');
            }
        } else
            return redirect()->back()->withErrors($validated)->withInput();
    }

    function getAttendanceEvent(Request $request){
        $idevent = $request->id;
        $event_attendances = DB::table('event_participant')
            ->join('users', 'event_participant.user_id', 'users.id')
            ->where('event_id', $idevent)
            ->get(['users.name', 'event_participant.*']);

        return view('event.attendance',[
            'event_attendances' => $event_attendances
        ]);
    }
}
