<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequest_EditBook extends FormRequest
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
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'author' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'img' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'description' => 'required|string',
            'isbn' => 'required',
            'height' => 'required',
            'page_number' => 'required|numeric',
            'release' => 'required|date',
        ];
    }
}
