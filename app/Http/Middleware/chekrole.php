<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class chekrole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        $allowed = collect($roles)->contains(
            fn(string $role) => $user->role === UserRole::from($role)
        );

        if (! $allowed) {
            abort(403, 'Kamu tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
