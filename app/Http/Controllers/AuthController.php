<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('getDashboard');
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
