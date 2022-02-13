<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrimaryCreateRequest extends FormRequest
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
            'slug'=> 'required|unique:product_primary_categories',
        ];
    }

    public function messages()
    {
        return [
            'slug.required'=> 'Please enter a slug',
            'slug.unique'=> 'The slug is already in use. Please write a new one.',
        ];
    }
}
