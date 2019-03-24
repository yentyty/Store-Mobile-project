<?php

namespace App\Http\Requests\Offers;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'factory_id' => 'required',
            'description' => 'max:255',
            'image' => 'required|image|dimensions:min_width=280,min_height=140',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
