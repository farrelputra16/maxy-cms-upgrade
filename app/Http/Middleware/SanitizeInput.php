<?php

namespace App\Http\Middleware;

use Closure;
use Mews\Purifier\Facades\Purifier;

class SanitizeInput
{
    public function handle($request, Closure $next)
    {
        if ($request->is('blog/add') || $request->is('blog/edit')) {
            return $next($request); // Langsung lewati middleware tanpa sanitasi
        }

        // array of fields that should bypass sanitization
        $bypassFields = ['gtm_header', 'gtm_body', 'custom_css', 'header_code', 'footer_code', 'additional_script'];

        $input = $request->all();

        // Bersihkan setiap input menggunakan Purifier, kecuali null
        array_walk_recursive($input, function (&$input, $key) use ($bypassFields) {
            if (!in_array($key, $bypassFields) && !is_null($input)) {
                $input = Purifier::clean($input, 'default');
            }
        });

        $request->merge($input);

        return $next($request);
    }
}
