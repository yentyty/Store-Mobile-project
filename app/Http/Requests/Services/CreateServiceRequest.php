<?php

namespace App\Http\Requests\Services;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceRequest extends FormRequest
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
            'description' => 'required|min:3',
            'icon' => 'required|dimensions:max_width=300,max_height=200|image',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
