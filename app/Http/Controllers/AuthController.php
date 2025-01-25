<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
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
<<<<<<< HEAD
<<<<<<< HEAD
        return redirect()->back()->with('error', 'ada yang salah bos');
=======
>>>>>>> 47b3a8f (update repo & creating login)
=======
        return redirect()->back()->with('error', 'ada yang salah bos');
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended('dashboard');
    }
}
