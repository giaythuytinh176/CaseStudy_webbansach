<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showRegistration()
    {
        return view('frontend.login.registration');
    }

    public function showLogin()
    {
        return view('frontend.login.login');
    }
}
