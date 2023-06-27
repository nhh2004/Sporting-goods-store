<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'file' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter product name',
            'file.required' => 'Please select an image'
        ];
    }
}
