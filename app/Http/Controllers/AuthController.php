<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    function getLogin(){
        return view('auth.login');
    }

    function postLogin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('getCourse');
        } else {
            return back();
        }
    }

    function postLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dashboard');
    }
}
