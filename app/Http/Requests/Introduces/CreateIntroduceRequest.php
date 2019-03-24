<?php

namespace App\Http\Requests\Introduces;

use Illuminate\Foundation\Http\FormRequest;

class CreateIntroduceRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'address' => 'required|unique:introduces,address|min:3|max:255',
            'phone' => 'max:10',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
