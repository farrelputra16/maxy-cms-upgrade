<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.min' => 'Password harus minimal 6 karakter.',
        ]);

        $mentorAccessGroupId = DB::table('access_group')->where('name', 'mentor')->value('id');
        $superAccessGroupId = DB::table('access_group')->where('name', 'super')->value('id');

        if (!Auth::attempt($validated)) {
            return redirect()->back()->withErrors([
                'email' => 'Email atau kata sandi salah.',
            ]);
        }

        $userAccessGroupId = Auth::user()->access_group_id;

        if (!in_array($userAccessGroupId, [$mentorAccessGroupId, $superAccessGroupId])) {
            Auth::logout();
            return redirect()->back()->with('error', 'Tidak memiliki hak akses.');
        }

        $request->session()->regenerate();
        return redirect()->route('getDashboard');
    }

    public function postLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome');
    }
}
