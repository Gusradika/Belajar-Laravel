<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function index()
    {
        return view('login.index', ['title' => 'Login', 'active' => 'login']);
    }

    // Credentials Authentication Security
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Intended dibuatuntuk melewati Middleware
            // dd('Success');
            return redirect()->intended('/dashboard');
        }

        // dd('Failed');
        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}