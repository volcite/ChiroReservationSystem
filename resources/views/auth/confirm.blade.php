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
              <form method="POST" action="{{ route('newUser.register') }}" >
                @csrf
                <div class="md-form">
                  <label for="name">氏名</label>
                  {{ $newUser->name }}
                  <input class="form-control" type="hidden" id="name" name="name" value="{{ $newUser->name }}" />
                  
                </div>
                <div class="md-form">
                  <label for="email">メールアドレス</label>
                  {{ $newUser->email }}
                  <input class="form-control" type="hidden" id="email" name="email" value="{{ $newUser->email }}">
                  
                </div>
				<div class="md-form">
                  <label for="phone_number">電話番号</label>
                  {{ $newUser->phone_number }}
                  <input class="form-control" type="hidden" id="phone_number" name="phone_number" value="{{ $newUser->phone_number }}">
                  
                </div>
				<div class="md-form">
                  <label for="gender">性別</label>
                  {{ $newUser->gender }}
                  <input class="form-control" type="hidden" id="gender" name="gender" value="{{ $newUser->gender }}">
				          
				<div class="md-form">
                  <label for="birthday">生年月日</label>
                  {{ $newUser->birthday}}
                  <input class="form-control" type="hidden" id="birthday" name="birthday" value="{{ $newUser->birthday }}">
                </div>
                <div class="md-form">
                  <label for="password">パスワード</label>
                  {{ $newUser->password }}
                  <input class="form-control" type="hidden" id="password" name="password" value="{{ $newUser->password }}">
                </div>
                
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
