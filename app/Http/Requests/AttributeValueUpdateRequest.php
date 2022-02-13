<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AttributeValueUpdateRequest extends FormRequest
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
        $id=Request::segment(3);

        return [
            'slug'=> 'required|unique:attribute_values,slug,'.$id,
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
