<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckFileSize
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Periksa semua file yang diunggah
        foreach ($request->allFiles() as $file) {
            if ($file->getSize() > 10485760) { // 10MB dalam byte
                return redirect()
                    ->back()
                    ->with('error', 'Ukuran file tidak boleh lebih dari 10MB.')
                    ->withInput();
            }
        }

        return $next($request);
    }
}
