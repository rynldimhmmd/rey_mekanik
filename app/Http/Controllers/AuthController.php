<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        Auth::login($user);

        return redirect()->intended('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Logika autentikasi...
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('mekaniks.index');
            } elseif ($user->role === 'customer') {
                return redirect()->route('customer.dashboard');
            } else {
                Auth::logout();
                return redirect('/login')->withErrors(['email' => 'Role not recognized']);
            }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }
 

public function logout(Request $request)
{
    // Log out the user
    Auth::logout();

    // Invalidate the user's session
    $request->session()->invalidate();

    // Regenerate the session token
    $request->session()->regenerateToken();

    // Redirect to the login page or another route
    return redirect()->route('login');
}
public function index()
{
    return view('dashboard');
}

public function reset(Request $request)
{
    $request ->validate([
        'email' => 'required|email',
        'password' => 'required|confirmed|min:3|string',
    ]);

    $user = User::where('email', $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('login')->with('success', 'Password reset successful. Please login with your new password.');
}
}