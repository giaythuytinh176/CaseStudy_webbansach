<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRegisterUser;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegisterForm(){
        return view('frontend.register.register');
    }

    public function store(FormRegisterUser $request){
        $user=new Customer();
        $user->fill($request->all());
        $user->password=Hash::make($request->password);
        $user->save();
        Session::flash('đăng kí thành công');
        return redirect()->route('show.home');

    }

}
