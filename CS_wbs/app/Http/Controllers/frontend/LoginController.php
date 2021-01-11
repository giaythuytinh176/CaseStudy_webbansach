<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin(Request $request)
    {
        return view('frontend.login.login');
    }

    public function logout()
    {
        Auth::guard('customers')->logout();
        return redirect()->route('show.home');
    }

    public function checkLogin(Request $request)
    {
        $auth = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $rememberme = 'on';
        if (Auth::guard('customers')->attempt($auth, $rememberme)) {
            $request->session()->regenerate();
            if (str_contains($request->headers->get('referer'), 'url=cart')) {
                return redirect()->route('cart.index');
            }
            return redirect()->route('show.home');
        } else {
            Session::flash('error', 'Email or password is incorrect');
            return redirect()->route('login.show');
        }
    }
}
