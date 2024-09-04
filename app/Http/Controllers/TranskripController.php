<?php

namespace App\Http\Controllers;

use App\Models\Transkrip;
use Illuminate\Http\Request;

use DB;
use illuminate\Support\Facades\Auth;

class TranskripController extends Controller
{
    function getTranskrip()
    {
        $data = Transkrip::with(['User', 'CourseClass', 'MScore', 'CourseClass.Schedule.MAcademicPeriod'])->get();
        return view('transkrip.index', compact('data'));
    }
}
