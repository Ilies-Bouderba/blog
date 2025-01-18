<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login()
    {
        return view("session.login");
    }

    public function signup()
    {
        return view("session.signup");
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        $data["password"] = bcrypt($data["password"]);

        Auth::login(User::create($data));

        return redirect()->intended('/');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
