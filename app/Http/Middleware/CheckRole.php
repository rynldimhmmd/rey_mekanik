<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Jika pengguna belum login, redirect ke halaman login
            return redirect('/login');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            // Jika pengguna tidak memiliki peran yang sesuai, tampilkan 403 forbidden
            abort(403, 'Forbidden');
        }
            return $next($request);

    }
}
