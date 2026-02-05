<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    // Si la variable de session 'user_id' n'existe pas, on rejette
    if (!session()->has('user_id')) {
        return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
    }

    return $next($request);
}
}
