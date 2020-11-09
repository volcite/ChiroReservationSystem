@extends('layout')

@section('content')
  <div class="mx-auto col-8">
    <div class="card mt-3">
      <div class="card-body text-center">
        <h2 class="h3 card-title mx-2">お客様情報確認</h2>

        <div class="card-text text-center">
          <div class="md-form">
            <label for="name" class="mr-3">氏名</label>
            {{ $user->name }}
          </div>
          <div class="md-form">
            <label for="email" class="mr-3">メールアドレス</label>
            {{ $user->email }}
          </div>
          <div class="md-form">
            <label for="phone_number" class="mr-3">電話番号</label>
            {{ $user->phone_number }}
          </div>
          <div class="md-form">
            <label for="gender" class="mr-3">性別</label>
            {{ $gender_ja }}
          </div>
          <div class="md-form">
            <label for="birthday" class="mr-3">生年月日</label>
            {{ $user->birthday }}
          </div>
          <div class="md-form">
            <label for="password" class="mr-3">パスワード</label>
            {{ $user->password }}
          </div>

          <!-- 実際送るデータ -->
          <form method="POST" action="{{ route('newUser.register') }}" >
            @csrf 
            <!-- ? GETはダメのエラー出る????? -->
            <!-- @foreach( $user as $key => $value )
            <input class="form-control" type="hidden" id="name" name="{{ $key }}" value="{{ $value }}" />
            @endforeach -->
            <input class="form-control" type="hidden" id="name" name="name" value="{{ $user->name }}" />
            <input class="form-control" type="hidden" id="email" name="email" value="{{ $user->email }}">
            <input class="form-control" type="hidden" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
            <input class="form-control" type="hidden" id="gender" name="gender" value="{{ $user->gender }}">
            <input class="form-control" type="hidden" id="birthday" name="birthday" value="{{ $user->birthday }}">
            <input class="form-control" type="hidden" id="password" name="password" value="{{ $user->password }}">
            <input class="form-control" type="hidden" id="password_confirmation" name="password_confirmation" value="{{ $user->password }}">
            
            <button class="btn btn-success" type="submit" >ユーザー登録する</button>
            <button class="btn btn-secondary" type="button"  onclick="history.back()">戻る</button>
          </form>

          <!-- ! ログインルート -->
          <div class="mt-2">
            <a href="#" class="card-text">ログインはこちら</a>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
