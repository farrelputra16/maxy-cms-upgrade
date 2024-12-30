<?php

namespace App\Http\Middleware;

use Closure;
use HTMLPurifier_Config;
use Mews\Purifier\Facades\Purifier;

class SanitizeInput
{
    public function handle($request, Closure $next)
    {
        // Abaikan sanitasi untuk rute tertentu
        if ($request->is('blog/add') || $request->is('blog/edit')) {
            return $next($request); // Langsung lewati middleware tanpa sanitasi
        }

        // Daftar field yang dikecualikan dari sanitasi
        $bypassFields = [
            'gtm_header',
            'gtm_body',
            'custom_css',
            'header_code',
            'footer_code',
            'additional_script'
        ];

        // Ambil semua input dari request
        $input = $request->all();

        // Konfigurasi kustom HTMLPurifier
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.AllowedAttributes', 'script.async'); // Mengizinkan atribut async
        $config->set('HTML.SafeScripting', ['script']); // Mengizinkan elemen script yang aman

        // Bersihkan setiap input menggunakan Purifier, kecuali null dan field yang di-bypass
        array_walk_recursive($input, function (&$input, $key) use ($bypassFields, $config) {
            if (!in_array($key, $bypassFields) && !is_null($input)) {
                $input = Purifier::clean($input, $config); // Gunakan konfigurasi kustom
            }
        });

        // Gabungkan input yang telah dibersihkan ke dalam request
        $request->merge($input);

        return $next($request); // Lanjutkan permintaan ke lapisan berikutnya
    }
}
