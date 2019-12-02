<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyForm extends FormRequest
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
            "name"=>"required",
			"email"=>"required|max:20|min:10|email|unique:authors",
			"age"=>"required"
        ];
    }
	
	public function messages()
    {
        return [
			"name.required"=>"Name should be filled",
			"email.required"=>"Email should be filled",
			"email.email"=>"Your email id is not valid"
		];
    }
}
