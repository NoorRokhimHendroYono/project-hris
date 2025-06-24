<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

// use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    // /**
    //  * Handle an incoming request.
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
    //  */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        // Mengecek apakah ada session admin
        if (!session()->has('admin')) {
            // Jika tidak ada session admin, redirect ke halaman login
            return redirect()->route('admin.login')->with('error', 'Silahkan login terlebih dahulu.');
        }

        // // Jika bukan admin, redirect atau kembalikan response error, Jika ada session admin, lanjutkan ke middleware berikutnya
        return $next($request);
    }
}
