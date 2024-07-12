<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and has admin role
        if ($request->user() && $request->user()->role !== 'admin') {
            abort(403, 'Forbidden'); // Return 403 Forbidden response
        }

        return $next($request);
    }
}
