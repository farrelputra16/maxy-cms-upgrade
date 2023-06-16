<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function getDashboard(){
        return view('dashboard.index');
    }
}
