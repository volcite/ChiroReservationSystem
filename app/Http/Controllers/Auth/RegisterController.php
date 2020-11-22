<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidation;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
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

    //新規登録画面から送られてきたデータのバリデート、セッション登録、画面返し
    protected function showConfirmation (UserValidation $request)
    {
        $user = new User($request->all()); 
        $gender_ja = $user->gender_to_ja($user->gender);
        $birthday_ja = Carbon::create($user->birthday)->format('Y年m月d日');
        $hidden_password = preg_replace('/[a-zA-Z0-9]/', '*', $user->password);

        // TODO session関係未完
         //userというキーでセッションに書き込み
        // $request->session()->put('user', '$user');
        return view('auth.confirm', compact('user', 'gender_ja', 'hidden_password', 'birthday_ja'));

    }

    //userのDBへの登録と/画面へリダイレクト
    protected function userRegister (Request $request)
    {   
        //戻るボタンを押したら
        if($request->get("back"))
        {
            return redirect()->route('users.register')->withInput();
        }

        // TODO :session系　$user = $request->session()->get('user');

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());

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
