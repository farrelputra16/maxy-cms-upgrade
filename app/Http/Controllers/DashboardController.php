<?php

namespace App\Http\Controllers;

use App\Models\AccessMaster;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    function getDashboard(){
        $accessMaster = AccessMaster::count();
        $user = User::count();
        return view('dashboard.index', [
            'accessMaster' => $accessMaster,
            'user' => $user
        ]);
    }
}
