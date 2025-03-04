<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        // Tangani preflight request (OPTIONS)
        if ($request->isMethod('OPTIONS')) {
            return response('', 200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-CSRF-TOKEN');
        }

        // Tangani request normal
        $response = $next($request);

        // Tambahkan header CORS ke semua respons
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-CSRF-TOKEN');

        return $response;
    }
}