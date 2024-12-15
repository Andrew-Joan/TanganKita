<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectBackIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return back()->with('error', 'Anda perlu masuk terlebih dahulu untuk melakukan aksi tersebut!');
        } else {
            if (Auth::user()->role_id != 2)
                return back()->with('error', 'Anda tidak memiliki ijin untuk mengakses halaman ini!');
        }
        
        return $next($request);
    }
}
