<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // (Filtrer l'âge)
    public function handle($request, Closure $next):Response
    {
        if ($request->age > 21) {
            return $next($request);
        }
        abort(404);
    }
}
