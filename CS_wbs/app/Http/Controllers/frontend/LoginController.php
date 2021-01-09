<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('frontend.login.login');
    }

    public function checkLogin(Request $request)
    {
        $auth = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $rememberme = $request->rememberme == 'on';
        if (Auth::attempt($auth, $rememberme)) {
            $request->session()->regenerate();
            return redirect()->route('show.home');
        } else {
            Session::flash('error', 'Email or password is incorrect');
            return redirect()->route('login.show');

        }
    }
}
