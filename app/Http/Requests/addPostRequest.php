<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addPostRequest extends FormRequest
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
            //
            'name'=>'required|string|min:3|max:200',
            'email'=>'required|unique:users,email|email|string',
            'password'=>'required|string|confirmed|min:6',
            'phone'=>'required|string|max:13'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'name is required',
            'name.min'=>'name min is 3',
            'name.max'=>'name max is 200',
            'email.required'=>'email is required',
            'email.unique'=>'email is already taken',
            'phone.required'=>'phone is required',
            'phone.max'=>'you must entered 11 numbers'
        ];
    }
}
