<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthenticateWithApiToken
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->usertype=='admin'){
            return $next($request);
        }
        abort(401);
    }
}
