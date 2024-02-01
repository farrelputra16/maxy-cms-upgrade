<?php

namespace App\Http\Controllers;

use App\Jobs\GoKampusDataSyncJob;
use App\Models\AccessMaster;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $accessMaster = AccessMaster::count();
        $user = User::count();

        return view('dashboard.index', [
            'accessMaster' => $accessMaster,
            'user' => $user
        ]);
    }

    public function generateToken($email, $name)
    {
        $secretKey = '4D6351655468576D5A7134743777217A25432A462D4A614E645267556A586E32';
        $token = sha1($email . '|' . $secretKey);

        $response = Http::post('https://athena.gokampus.com/auth/login-register', [
            'token' => $token,
            'email' => $email,
            'name' => $name,
            'referral' => 'maxy', // maxy-academy (dev), maxy (prod)
        ]);

        session()->put('token', $response->json()['token']);

        return $response;
    }

    public function synchronizeData()
    {
        GoKampusDataSyncJob::dispatch(auth()->user());
    }
}
