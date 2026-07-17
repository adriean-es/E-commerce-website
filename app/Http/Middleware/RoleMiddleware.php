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
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {

        // If the user is not logged in, send them to login
        if (!$request->user()) {
            return redirect()->route('login');
        }
        // Check if the user has ANY of the required roles
        foreach ($roles as $role) {
            if ($request->user()->hasRole($role)) {
                return $next($request); // Access granted
            }
        }
        // Access denied - user does not have any of the required roles
        abort(403, 'Unauthorized. You do not have the required role.');

    }
}
