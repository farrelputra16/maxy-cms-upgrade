<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //

    function getLogin(){
        return view('auth.login');
    }

    function postLogin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $mentorAccessGroupId = DB::table('access_group')->where('name', 'mentor')->first()->id;
        $superAccessGroupId = DB::table('access_group')->where('name', 'super')->first()->id;

        if (Auth::attempt($validated)){
            $userAccessGroupId = Auth::user()->access_group_id;

            if ($userAccessGroupId != $mentorAccessGroupId && $userAccessGroupId != $superAccessGroupId){
                Auth::logout();

                return redirect()->back()->with('error', 'No authority');
            } else {
                $request->session()->regenerate();

                return redirect()->route('getDashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    function postLogout(Request $request){
        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
