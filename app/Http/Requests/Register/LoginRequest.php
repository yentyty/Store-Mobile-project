<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập tài khoản email !',
            'email.email' => 'Địa chỉ email không hợp lệ !',
            'password.required' => 'Vui lòng nhập Mật khẩu !',
        ];
    }
}
