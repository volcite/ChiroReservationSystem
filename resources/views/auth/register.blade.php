<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
              <form method="POST" action="/users/store">
                @csrf
                <div class="md-form">
                  <label for="name">氏名</label>
                  <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
                </div>
                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}" >
                </div>
				<div class="md-form">
                  <label for="phone_number">電話番号</label>
                  <input class="form-control" type="text" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}" >
                </div>
				<div class="md-form">
                  <label for="gender">性別</label>
                  <input class="form-control" type="radio" id="gender" name="gender" value='0' required value="{{ old('gender') }}" >男性
				  <input class="form-control" type="radio" id="gender" name="gender" value='1' required value="{{ old('gender') }}" >女性
                </div>
				<div class="md-form">
                  <label for="birthday">生年月日</label>
                  <input class="form-control" type="date" id="birthday" name="birthday" required value="{{ old('birthday') }}" >
                </div>
                <div class="md-form">
                  <label for="password">パスワード</label>
                  <input class="form-control" type="password" id="password" name="password" required>
                </div>
                <div class="md-form">
                  <label for="password_confirmation">パスワード(確認)</label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
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
