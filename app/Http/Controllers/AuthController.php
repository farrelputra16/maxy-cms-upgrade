<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('getDashboard');
        } else {
            return back();
        }
    }

    function postLogout(Request $request){
        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }

    function getRegister(){
        if (Auth::user()){
            return redirect()->back();
        } else {
            return view('auth.register');
        }
    }

    function postRegister(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5'
        ]);

        if ($validated){
            $passwordcrpyt = bcrypt($validated['password']);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $passwordcrpyt,
                'id_partner_university_detail' => 3,
                'created_id' => 1,
                'updated_id' => 1
            ]);

            return redirect()->route('login');
        }
    }
}
