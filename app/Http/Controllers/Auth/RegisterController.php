<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Rules\ZenkakuNumber;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['max:30', 'required', 'string', ],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'phone_number' => ['required', 'max:15', 'string', new ZenkakuNumber],
            'gender' => ['required'],
            'birthday' => ['required', 'date'],
            'password' => ['required', 'string', 'max:30', 'confirmed', 'alpha_dash'],
        ],
        [
            'gender.required' => '性別を選択してください'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' =>  $data['phone_number'],
            'gender' =>  $data['gender'],
            'birthday' =>  $data['birthday'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
