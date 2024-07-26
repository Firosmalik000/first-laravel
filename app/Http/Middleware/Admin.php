<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
// inisialisasi auth di bawah
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

// untuk membuat middleware admin agar tidak bisa di masukin oleh user
        if(Auth::user()->usertype != 'admin') {
            return redirect('dashboard');
        }

        return $next($request);
    }
}
