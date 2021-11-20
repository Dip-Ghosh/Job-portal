<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormValidationRequest extends FormRequest
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

    public function rules(){

        return [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'mobile'=>'required|max:11|unique:users',
            'password'=>'required|min:6',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => ' Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email already exists',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 6 characters',
            'mobile.required' => 'Mobile is required',
            'mobile.max' => 'Mobile must be at  11 characters',
            'mobile.unique' => 'Mobile already exists',
        ];

    }
}
