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
              <form method="POST" action="/users/register">
                @csrf
                <div class="md-form">
                  <label for="name">氏名</label>
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                  @if ($errors->has('name'))
                    <div class="alert alert-danger">
                      <ul>
                        <li>{{ $errors->first('name') }}</li>
                      </ul>
                    </div>
                  @endif
                </div>
                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                  @if ($errors->has('email'))
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->get('email') as $error )
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
				        <div class="md-form">
                  <label for="phone_number">電話番号</label>
                  <input class="form-control" type="text" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}" >
				          <p><small>-(ハイフン</small></p>
                  @if ($errors->has('phone_number'))
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->get('phone_number') as $error )
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
				        <div class="md-form">
                  <label for="gender">性別</label>
                  <input class="form-control" type="radio" id="gender" name="gender" value='0' required value="{{ old('gender') }}" >男性
				          <input class="form-control" type="radio" id="gender" name="gender" value='1' required value="{{ old('gender') }}" >女性
                  @if ($errors->has('gender'))
                    <div class="alert alert-danger">
                      <ul>
                        <li>{{ $errors->first('gender') }}</li>
                      </ul>
                    </div>
                  @endif
                </div>
				        <div class="md-form">
                  <label for="birthday">生年月日</label>
                  <input class="form-control" type="date" id="birthday" name="birthday" required value="{{ old('birthday') }}" >
                  @if ($errors->has('birthday'))
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->get('birthday') as $error )
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="md-form">
                  <label for="password_confirmation">パスワード(確認)</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                  @if ($errors->has('password'))
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->get('password') as $error )
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                </div>
                <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">ユーザー登録</button>
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
