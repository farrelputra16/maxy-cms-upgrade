<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        
        $accessMaster = DB::table('access_master')->where('name', 'access_cms')->value('id');
        $accessGroupId = DB::table('access_group_detail')->where('access_master_id', $accessMaster)->get()->pluck('access_group_id')->toArray();
        
        if (!Auth::attempt($validated)) {
            return redirect()->back()->withErrors([
                'email' => 'Email atau kata sandi salah.',
            ]);
        }
        
        $userAccessGroupId = Auth::user()->access_group_id;

        if (!in_array($userAccessGroupId, $accessGroupId)) {
            Auth::logout();
            return redirect()->back()->with('error', 'Tidak memiliki hak akses.');
        }

        // Ambil data access master dari database
        $accessMaster = DB::table('access_master')
            ->leftJoin('access_group_detail', 'access_master.id', '=', 'access_group_detail.access_master_id')
            ->leftJoin('access_group', 'access_group_detail.access_group_id', '=', 'access_group.id')
            ->where('access_group.id', $userAccessGroupId)
            ->select('access_master.name as access_master_name', 'access_group.name as access_group_name')
            ->get();
        
        // Simpan ke dalam session
        Session::put('access_master', $accessMaster);

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
