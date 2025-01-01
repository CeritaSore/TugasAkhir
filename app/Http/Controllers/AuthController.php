<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required',
            'password' => ['required', 'min:5'],
        ]);
        if (Auth::attempt($validation)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended('dashboard');
    }
}
