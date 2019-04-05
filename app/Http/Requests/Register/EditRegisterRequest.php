<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class EditRegisterRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'address' => 'required|max:255',
            'avatar' => 'image|dimensions:max_width=1000,max_height=1000',
            'role' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute là bắt buộc.',
            'max' => 'Trường :attribute không được lớn hơn :max',
            'min' => 'Trường :attribute không được nhở hơn :min',
            'unique' => 'Trường :attribute đã bị trùng.',
            'numeric' => 'Trường :attribute phải là kiểu số.',
            'date_format' => 'Trường :attribute phải thuộc định dạng "Y-m-d"',
            'regex' => 'Trường :attribute định dạng không đúng.',
            'currency_size' => 'Trường :attribute độ dài phải lớn hơn :min và nhỏ hơn :max.',
            'confirmed' => 'Mật khẩu xác nhận không chính xác',
            'digits_between' => 'Trường :attribute phải có số ký tự là :min hoặc :max',
            'same' => 'Nhập lại :attribute không trùng khớp',
        ];
    }
    public function attributes()
    {
        return [
            'username' => 'tên đăng nhập',
            'name' => 'Họ và tên',
            'address' => 'địa chỉ',
            'phone' => 'số điện thoại',
            'total' => 'tổng tiền',
            'gender' => 'giới tính',
            'birthday' => 'ngày sinh',
        ];
    }
}
