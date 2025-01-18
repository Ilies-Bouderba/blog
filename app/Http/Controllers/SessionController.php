<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
    public function login() {
        return view("session.login");
    }

    public function signup() {
        return view("session.signup");
    }
}
