<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermisoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permiso): Response
    {
        if (!auth()->user() || !auth()->user()->permiso($permiso)) {
            // Manejar acceso no autorizado, redirigir o mostrar un error
            abort(403, 'No tiene permiso para acceder a esta página');
        }

        return $next($request);
    }
}
