<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegisterUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'password' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required|string',
            'last_name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Fist Name is required',
            'last_name.required' => 'Last Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'phone.required' => 'Phone is required',
            'address.required' => 'Address is required',
            'email.unique' => 'Your email is existed',
        ];
    }
}
