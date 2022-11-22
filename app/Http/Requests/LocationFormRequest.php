<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'cityName' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'cityName.required' => 'City Name is required'
        ];
    }
}
