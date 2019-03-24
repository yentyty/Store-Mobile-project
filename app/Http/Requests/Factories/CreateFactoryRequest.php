<?php

namespace App\Http\Requests\Factories;

use Illuminate\Foundation\Http\FormRequest;

class CreateFactoryRequest extends FormRequest
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
            'name' => 'required|min:3|max:50|unique:factories,name'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Name already exists'
        ];
    }
}
