<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the login form.
     */
    public function create()
    {
        return view('auth.login'); // Ensure the view exists at resources/views/auth/login.blade.php
    }

    /**
     * Handle login attempts.
     */
    public function store(Request $request)
    {
        // Validate login credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on user role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard.admin');
            } elseif (Auth::user()->role === 'project_leader') {
                return redirect()->route('dashboard.leader');
            }

            return redirect('/'); // Default fallback
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Log out the user.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
