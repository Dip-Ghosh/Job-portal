<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name' => 'required',
            'organizationsId' => 'required',
            'industriesId' => 'required',
            'address' => 'required',
            'email' => 'required',
            'webAddress' => 'required',
            'logo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Company is required',
            'organizationsId.required' => 'Select organization',
            'industriesId.required' => 'Select Industry',
            'address.required' => 'Address cannot be empty',
            'email.required' => 'Email is required',
            'webAddress.required' => 'Web address cannot be empty',
            'logo.required' => 'Logo cannot be empty'

        ];
    }
}
