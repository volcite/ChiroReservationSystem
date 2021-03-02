@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">パスワード変更</div>

                <div class="card-body" action="{{ route('admin.changePassword') }}">
                    <form method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="current">現在のパスワード</label>
                            <div>
                                <input id="current" type="password" class="form-control" name="current" required autofocus>
                            </div>
                            @error('current')
                            @foreach ($errors->get('current') as $error )
                            <strong class="text-danger">{{ $error }}</strong>
                            @endforeach
                            @enderror
                        </div>
                        <div class=" form-group">
                            <label for="new-password">新しいパスワード</label>
                            <div>
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input id="confirm" type="password" class="form-control" placeholder="もう一度入力してください（確認用）" name="new-password_confirmation" required>
                            </div>
                            @error('new-password')
                            @foreach ($errors->get('new-password') as $error )
                            <strong class="text-danger">{{ $error }}</strong><br>
                            @endforeach
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">変更</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection