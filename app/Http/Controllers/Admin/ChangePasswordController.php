<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
  public function edit()
  {
    return view('admin.auth.editPassword')->with('user', \Auth::user());
  }

  public function update(Request $request)
  {
    $messages = [
      'between' => '8文字以上30文字以内で入力してください',
      'regex' => '半角英数字で入力してください',
      'confirmed' => 'パスワードが一致しません',
      'different' => '現在のパスワードと違う値を入力してください'
    ];

    Validator::make($request->all(), [
      'current' => [
        'required',
        //現在のパスワードが正しいかチェック
        function ($attribute, $value, $fail) {
          if (!(\Hash::check($value, \Auth::user()->password))) {
            $fail('現在のパスワードが間違っています');
          }
        },
      ],
      'new-password' => ['required', 'string', 'between:8,30', 'confirmed', 'regex:/^[a-zA-Z0-9]+$/', 'different:current'],
    ], $messages)->validate();

    $user = \Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();
    // TODO completeに変更
    return redirect()->route('admin.index');
  }
}
