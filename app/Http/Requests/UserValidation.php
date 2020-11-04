<?php

namespace App\Http\Requests;

use App\Rules\ZenkakuNumber;
use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
            'name' => ['max:30', 'required', 'string', ],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone_number' => ['required', 'max:15', 'string', new ZenkakuNumber],
            'gender' => ['required'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'string', 'max:30', 'confirmed', 'alpha_dash'],
        ];
    }

    public function messages()
    {
        return [
            'gender.required' => '性別を選択してください'
        ];
    }
}
