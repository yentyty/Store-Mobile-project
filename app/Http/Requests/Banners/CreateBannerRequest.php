<?php

namespace App\Http\Requests\Banners;

use Illuminate\Foundation\Http\FormRequest;

class CreateBannerRequest extends FormRequest
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
            'image' => 'required|image|dimensions:min_width=300,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
