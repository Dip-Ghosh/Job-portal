<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobTitleFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'jobTitle' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'jobTitle.required' => 'Job Title is required'
        ];
    }
}
