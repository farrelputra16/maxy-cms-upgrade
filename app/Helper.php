<?php

namespace App;

use Illuminate\Support\Facades\Http;

class Helper
{
    public static function generateToken($email, $name)
    {
        if (session()->has('token')) {
            return;
        }

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
}
