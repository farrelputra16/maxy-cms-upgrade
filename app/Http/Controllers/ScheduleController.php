<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\CourseClass;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;

class ScheduleController extends Controller
{
    function getSchedule(){
        $schedules = Schedule::with(['CourseClass'])->get();
        $course_class = CourseClass::where('status', 1)
            ->where('status_ongoing', 1)
            ->get();

        return view('schedule.index',[
            'schedules' => $schedules,
            'course_class' => $course_class,
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
                    'course_class_id' => $request->title,
                    'location' => $request->location,
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
                        'course_class_id' => $request->title ? $request->title : $currentData->course_class_id,
                        'location' => $request->location ? $request->location : $currentData->location,
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

    function getGeneralSchedule(){
        $schedules = Schedule::with(['CourseClass'])->get();
        $course_class = CourseClass::where('status', 1)
            ->where('status_ongoing', 1)
            ->get();

        return view('schedule.general',[
            'schedules' => $schedules,
            'course_class' => $course_class,
        ]);
    
    }
    
    function getAddGeneralSchedule(Request $request){
        try {
            $period = $request->input('period');
            // Fetch schedules based on the selected academic period
            $schedules = Schedule::with(['CourseClass'])->where('academic_period', $period)->get();

            $events = $schedules->map(function($schedule) {
                return [
                    'title' => $schedule->CourseClass->slug,
                    'daysOfWeek' => [$schedule->day], // Repeat every week on this day
                    'startTime' => date('H:i:s', strtotime($schedule->date_start)),
                    'endTime' => date('H:i:s', strtotime($schedule->date_end))
                ];
            });

            return response()->json($events);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 500);
        }
    }

    function postAddGeneralSchedule(Request $request){
        try {
            // return dd($request->all());
            $validated= $request->validate([
                'title' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'day' => 'required',
            ]);

            if ($validated){
                $create = Schedule::create([
                    'course_class_id' => $request->title,
                    'academic_period' => $request->academic_period,
                    'day' => $request->day,
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

    function postEditGeneralSchedule(Request $request){
        try {
            // return dd($request->all());
            $validated= $request->validate([
                'id' => 'required',
            ]);

            if ($validated){
                $currentData = Schedule::find($request->id);
                $updateData = Schedule::where('id', $request->id)
                    ->update([
                        'course_class_id' => $request->title ? $request->title : $currentData->course_class_id,
                        'location' => $request->location ? $request->location : $currentData->location,
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
}
