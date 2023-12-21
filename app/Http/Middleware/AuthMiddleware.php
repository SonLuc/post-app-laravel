<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request. -> Maneja una solicitud entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Verificamos si el usuario no está autenticado
        if(!Auth::check()){
            // En este caso, si el usuario no está autenticado, lo redireccionamos hacia el formulario de login
            return redirect('/login');
        }

        // En caso de que el usuario esté autenticado, dejamos que continúe con su solicitud
        return $next($request);
    }
}
