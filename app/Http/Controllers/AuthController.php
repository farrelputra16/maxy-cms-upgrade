<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $mentorAccessGroupId = DB::table('access_group')->where('name', 'mentor')->first()->id;
        $superAccessGroupId = DB::table('access_group')->where('name', 'super')->first()->id;

        // Cek apakah email ada
        $user = DB::table('users')->where('email', $validated['email'])->first();

        if (!$user) {
            // Email tidak ditemukan
            return redirect()->back()->with('error_email', 'Email tidak ditemukan');
        }

        // Cek apakah password cocok
        if (!Hash::check($validated['password'], $user->password)) {
            // Email benar, tetapi password salah
            return redirect()->back()->with('error_password', 'Kata sandi salah');
        }

        // Login user
        if (Auth::attempt($validated)) {
            $userAccessGroupId = Auth::user()->access_group_id;

            if ($userAccessGroupId != $mentorAccessGroupId && $userAccessGroupId != $superAccessGroupId) {
                Auth::logout();

                return redirect()->back()->with('error', 'Tidak Memiliki Hak Akses');
            } else {
                $request->session()->regenerate();

                return redirect()->route('getDashboard');
            }
        }

        // Default fallback (jika ada kasus tak terduga)
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    function postLogout(Request $request){
        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
