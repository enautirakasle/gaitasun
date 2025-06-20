<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
       $user = $request->user();

        if (!$user || !$user->hasAnyRole($roles)) {
            // Lanza la excepción oficial de Spatie
            // throw UnauthorizedException::forRoles(['admin']);
            abort(403);
                }

        return $next($request);
    }
}
