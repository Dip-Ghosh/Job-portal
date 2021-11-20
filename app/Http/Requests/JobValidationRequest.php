<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobValidationRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'job_types_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Job Type is required',
            'description.required' => 'Description is required',
            'job_types_id.required' => 'Job Type is required'

        ];
    }
}
