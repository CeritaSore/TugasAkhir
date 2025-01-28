<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
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
        return redirect()->back()->with('error', 'ada yang salah bos');
    }
    public function registration()
    {
        return view("register");
    }
    public function saveregister(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'min:5'],
        ]);
        $convertToNumeric = (int) $request->nim;
        User::create([
            'name' => $request->nama,
            'nim' => $convertToNumeric,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return response()->json(['message' => 'register success']);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended('dashboard');
    }
}
