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
        if (! $request->user()) {
            return redirect()->route('login');
        }

        if (! in_array($request->user()->role, $roles)) {
            if ($request->user()->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            if ($request->user()->isDoctor()) {
                return redirect()->route('doctor.dashboard');
            }

            return redirect()->route('patient.dashboard');
        }

        return $next($request);
    }
}
