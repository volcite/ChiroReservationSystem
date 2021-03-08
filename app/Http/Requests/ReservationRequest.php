<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
        if($this->is('admin/*')){
            return [
                'reservation_date' => ['required', 'string'],
                'time_id' => ['required', 'integer' ],
                'course_id' => ['required', 'integer' ],
                'name' => ['max:30', 'required', 'string' ],
                'email' => ['required', 'string', 'email', 'max:100'],
                'phone_number' => ['required', 'max:15', 'string', 'regex:/^[0-9]+$/', 'min:9'],
                'age' => ['required', 'string', 'max:3', 'regex:/^[0-9]+$/'],
                'gender' => ['required', 'string'],
            ];
        }
        
        return [
            'reservation_year' => ['required', 'string' ],
            'reservation_month' => ['required', 'string' ],
            'reservation_day' => ['required', 'string' ],
            'time_id' => ['required', 'integer' ],
            'course_id' => ['required', 'integer' ],
            'name' => ['max:30', 'required', 'string' ],
            'email' => ['required', 'string', 'email', 'max:100'],
            'phone_number' => ['required', 'max:15', 'string', 'regex:/^[0-9]+$/', 'min:9'],
            'age' => ['required', 'string', 'max:3', 'regex:/^[0-9]+$/'],
            'gender' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'course_id.integer' => 'コースを選択してください',
        ];
    }
}
