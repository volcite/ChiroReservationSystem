@extends('layout')

@section('content')
  <div class="mx-auto col-8">
    <div class="card mt-3">
      <div class="card-body text-center">
        <h3 class="mt-2 mb-4 card-title">お客様情報登録</h3>
        
        <div class="card-text">
          <form method="POST" action="{{ route('newUser.confirm') }}">
            @csrf
            <div class="form-group row">
           
              <label for="name" class="col-form-label col-sm-3">氏名 <span class="badge badge-danger float-right">必須</span>
</label>

              <input class="form-control col-sm-8" type="text" id="name" name="name" required value="{{ old('name') }}">
            </div>
            @if ($errors->has('name'))
                <ul class="list-unstyled">
                  <li class="text-danger">{{ $errors->first('name') }}</li>
                </ul>
            @endif
            
            <div class="form-group row">
              <label for="email" class="col-form-label col-sm-3">メールアドレス<span class="badge badge-danger float-right">必須</span></label>
              <input class="form-control col-sm-8" type="text" id="email" name="email" required value="{{ old('email') }}" >
            </div>
            @if ($errors->has('email'))
                <ul class="list-unstyled">
                    @foreach ($errors->get('email') as $error )
                        <li  class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group row">
              <label for="phone_number" class="col-form-label col-sm-3">電話番号<span class="badge badge-danger float-right">必須</span></label>
              <input class="form-control col-sm-8" type="text" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}" >
              <small class="ml-4 text-danger">ハイフンは不要です</small>
            </div>
            @if ($errors->has('phone_number'))
                <ul class="list-unstyled">
                    @foreach ($errors->get('phone_number') as $error )
                        <li  class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-3">性別<span class="badge badge-danger float-right">必須</span></legend>
                  <div class="col-sm-8 row">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="male" name="gender" value='0' {{ old('gender') == '0' ? 'checked' : '' }} required >
                      <label class="form-check-label" for="male">男性</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="female" name="gender" value='1' {{ old('gender') == '1' ? 'checked' : '' }} required >
                      <label class="form-check-label" for="female">女性</label>
                    </div>
                  </div>
              </div>
            </fieldset>
            @if ($errors->has('gender'))
                <ul class="list-unstyled">
                  <li  class="text-danger">{{ $errors->first('gender') }}</li>
                </ul>
            @endif
            <div class="form-group row">
              <label for="birthday" class="col-form-label col-sm-3">生年月日<span class="badge badge-danger float-right">必須</span></label>
              <input class="form-control col-sm-8" type="date" id="birthday" name="birthday" required value="{{ old('birthday') }}" >
            </div>
            @if ($errors->has('birthday'))
                <ul class="list-unstyled">
                    @foreach ($errors->get('birthday') as $error )
                        <li  class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group row">
              <label for="password" class="col-form-label col-sm-3">パスワード<span class="badge badge-danger float-right">必須</span></label>
              <input class="form-control col-sm-8" type="password" id="password" name="password" required>
            </div>
            @if ($errors->has('password'))
                <ul class="list-unstyled">
                    @foreach ($errors->get('password') as $error )
                        <li  class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="form-group row">
              <label for="password_confirmation" class="col-form-label col-sm-3">パスワード(確認)<span class="badge badge-danger float-right">必須</span></label>
              <input class="form-control col-sm-8" type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
           
            
            <button class="btn" style="background: #0E8088" type="submit">登録</button>
          </form>

          <!-- ! ログインルート -->
          <div class="text-center mt-2">
            <a href="#" >すでに登録済みの方はこちら</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection