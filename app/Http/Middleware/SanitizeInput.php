<?php

namespace App\Http\Middleware;

use Closure;
use Mews\Purifier\Facades\Purifier;

class SanitizeInput
{
    public function handle($request, Closure $next)
    {
        $input = $request->all();

        // Bersihkan setiap input menggunakan Purifier, kecuali null
        array_walk_recursive($input, function (&$input) {
            if (!is_null($input)) {
                $input = Purifier::clean($input);
            }
        });

        $request->merge($input);

        return $next($request);
    }
}
