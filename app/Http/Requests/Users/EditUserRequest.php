<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'username' => 'required|min:3|max:20',
            'name' => 'required:max:50',
            'phone' => 'required|max:10|min:6',
            'email' => 'required|email|max:255|',
            'address' => 'required|max:255',
            'avatar' => 'image|dimensions:max_width=1000,max_height=1000',
            'role' => 'required',
        ];
        if (request()->changePassword == "ON") {
            $rules['password'] = 'required|min:3|max:32';
        }
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
