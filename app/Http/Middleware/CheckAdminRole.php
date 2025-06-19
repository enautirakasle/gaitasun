<?php

// app/Http/Middleware/CheckAdminRole.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckAdminRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar que el usuario esté autenticado y tenga rol admin
        /** @var \App\Models\User $user */
        $user = auth()->user();
        if ($user && !$user->hasRole('admin')) {
            // Lanza la excepción oficial de Spatie
            // throw UnauthorizedException::forRoles(['admin']);
            abort(403);
        }

        return $next($request);
    }
}
