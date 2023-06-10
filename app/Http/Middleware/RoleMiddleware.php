<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        // Verificar si el usuario tiene uno de los roles especificados
        if ($user && in_array($user->rol, $roles)) {
            return $next($request);
        }

        // Si el usuario no tiene el rol adecuado, redirigir al inicio o mostrar un mensaje de error
        return redirect('/')->with('error', 'No tienes acceso a esta página.');
    }
}