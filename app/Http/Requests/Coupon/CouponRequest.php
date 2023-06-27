<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'number' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter product name',
             'number.required' => 'Please enter % or money',
             'start_date.required' => 'Please enter a start date',
             'end_date.required' => 'Please enter an end date'
        ];
    }
}