<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequest_Customer extends FormRequest
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
            'first_name'=>'required|string|max:25',
            'last_name'=>'required|string|max:25',
            'address'=>'required|string|max:225',
            'phone'=>'required|regex:/(0)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>'First name is required',
            'last_name.required'=>'Last name is required',
            'address.required'=>'Address name is required',
            'phone.required'=>'Phone name is required',
        ];
    }


}
