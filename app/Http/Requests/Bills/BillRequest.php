<?php

namespace App\Http\Requests\Bills;

use Illuminate\Foundation\Http\FormRequest;

class BillRequest extends FormRequest
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
            'username' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'phone' => 'required|max:10|min:6',
            'note' => 'max:255',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute là bắt buộc.',
            'numeric' => 'Trường :attribute phải là kiểu số.',
            'email.required' => 'Vui lòng nhập trường :attribute này.',
            'email.email' => 'Vui lòng nhập đúng định dạng email.',
        ];
    }
}
