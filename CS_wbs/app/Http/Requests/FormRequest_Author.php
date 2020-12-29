<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequest_Author extends FormRequest
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
            'first_name'=>'required|alpha|max:20',
            'last_name'=>'required|alpha|max:20'
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'=>'firstname is required',
            'last_name.required'=>'last_name is required'

        ];
    }
}
