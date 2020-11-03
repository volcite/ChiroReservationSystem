<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
<div class="container">
    <div class="row">
      <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <h1 class="text-center"><a class="text-dark" href="#">memo</a></h1>
        <div class="card mt-3">
          <div class="card-body text-center">
            <h2 class="h3 card-title text-center mt-2">お客様情報</h2>
            <div class="card-text">
              <div class="md-form">
                <label for="name">氏名</label>
                {{ $user->name }}
              </div>
              <div class="md-form">
                <label for="email">メールアドレス</label>
                {{ $user->email }}
              </div>
              <div class="md-form">
                <label for="phone_number">電話番号</label>
                {{ $user->phone_number }}
              </div>
              <div class="md-form">
                <label for="gender">性別</label>
                {{ $gender_ja }}
              <div class="md-form">
                <label for="birthday">生年月日</label>
                {{ $user->birthday }}
              </div>
              <div class="md-form">
                <label for="password">パスワード</label>
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
                <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">ユーザー登録する</button>
                <button type="button" class="btn btn-success" onclick="history.back()">戻る</button>
              </form>

				      <!-- ! ログインルート -->
			        <div class="mt-0">
                <a href="#" class="card-text">ログインはこちら</a>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
