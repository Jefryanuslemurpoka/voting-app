<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            // Normalisasi role ke huruf kecil biar aman
            $role = strtolower(auth()->user()->role ?? '');

            if ($role === 'user') {
                return $next($request);
            }
        }

        // Kalau bukan user, redirect ke login (lebih ramah daripada error 403)
        return redirect()->route('login')->withErrors([
            'auth' => 'Anda tidak memiliki akses ke halaman ini.',
        ]);
    }
}
