<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRegisterUser;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('frontend.register.register');
    }

    public function store(FormRegisterUser $request, Customer $user)
    {
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('registed_sucess', 'Đăng kí thành công');
        return redirect()->route('login.show');
    }

}
