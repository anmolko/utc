<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserUpdateRequest extends FormRequest
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
            'email'=> 'required|unique:users,email,'.$id,
            'image' => 'image|mimes:jpeg,png,jpg',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=> 'Please Enter a Email',
            'email.unique'=> 'The Email Has Been Already Taken',
        ];
    }
}
