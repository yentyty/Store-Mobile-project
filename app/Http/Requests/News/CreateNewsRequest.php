<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'title' => 'required|min:3',
            'user_id' => 'required',
            'description' => 'max:255',
            'content' => 'required|min:3',
            'content_image' => 'image|dimensions:min_width=250,min_height=250',
            'cover_image' => 'required|image|dimensions:min_width=350,min_height=350',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
