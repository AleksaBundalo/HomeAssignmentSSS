<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        //validate username
        $validated = $request->validate([
            'name' => 'required|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user); //this logs in the new user instantly
        return redirect()->route('posts.index')->with('success', 'User created! You can now post.');
    }

    public function showLogin() 
    {
    return view('auth.login');
    }

    public function login(Request $request) 
    {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) 
        {
        $request->session()->regenerate();
        return redirect()->route('posts.index');
    }

    return back()->withErrors(['email' => 'The provided credentials do not match an existing account.']);
}

public function logout(Request $request) 
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('posts.index');
}



}