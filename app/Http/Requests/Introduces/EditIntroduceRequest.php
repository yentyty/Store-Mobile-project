<?php

namespace App\Http\Requests\Introduces;

use Illuminate\Foundation\Http\FormRequest;

class EditIntroduceRequest extends FormRequest
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
            'address' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:10|min:6',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
