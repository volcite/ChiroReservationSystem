@extends('layout')

@section('content')
<div class="row mb-3 text-center">
      <div class="col-sm-4">
        <h3 class="mb-3">管理者ログイン</h3>
        <form method="POST" action="{{ route('admin.login') }}">
         @csrf

            <div class="form-group">
                <div class="text-left">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror login_form" name="email" value="{{ old('email') }}" required autocomplete="email" aria-describedby="emailHelp"/>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="text-left">
                    <label for="password">パスワード</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror login_form" name="password"/>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-secondary mt-4">ログイン</button>
        </form>

    </div>
</div>
@endsection