<?php

namespace App\Http\Requests;

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
            'phone_number' => ['required', 'max:15', 'string', 'regex:/^[0-9]+$/'],
            'gender' => ['required'],
            'birthday' => ['required', 'date', 'before:today'],
            'password' => ['required', 'string', 'min:8', 'max:30', 'confirmed', 'regex:/^[a-zA-Z0-9]+$/'],
        ];
    }

    public function messages()
    {
        return [
            'gender.required' => '性別を選択してください',
            'phone_number.regex' => '半角数字のみを入力してください',
            'birthday.before' => '本日より前の日付を入力してください',
            'password.regex' => '半角英数字で入力してください',
        ];
    }
}
