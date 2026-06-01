<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Cek apakah user yang login punya role yang sesuai (misal: admin)
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request); // Silakan masuk
        }
        // Jika bukan admin, lempar balik ke dashboard dengan pesan error
        return redirect('dashboard')->with('error', 'Maaf, Anda bukan Admin!');
    }
}
