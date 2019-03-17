<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'username' => 'required|min:3|unique:users,username',
            'name' => 'required:max:50',
            'password' => 'required|min:3|max:255',
            'passwordAgain' => 'required|same:password',
            'phone' => 'required|max:10|min:6',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|max:255',
            'avatar' => 'image|dimensions:max_width=1000,max_height=1000',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            //s
        ];
    }
}
