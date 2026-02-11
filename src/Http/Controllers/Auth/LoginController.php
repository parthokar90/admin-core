<?php

namespace ParthoKar\AdminCore\Http\Controllers\Auth;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('admin-core::auth.login');
    }

    // Handle login POST
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt login using admin guard
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate(); 
            return redirect()->route('admin.dashboard');
        }

        // Login failed → redirect back with error
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
