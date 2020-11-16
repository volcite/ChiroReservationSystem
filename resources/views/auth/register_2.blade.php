@extends('layout')

@section('content')
<div class="col mx-auto">
<h2 class="h3  mt-2 mb-4">お客様情報登録</h2>
<form action="/users/register" method="post">
@csrf
	<table class="table">
		<tbody>
			<!-- 氏名 -->
			<tr class="form-group row"> 
				<th class="col-sm-3">
					<label for="name" class="col-form-label">氏名</label>
				</th>
				<td class="col-sm-5">
					@if ($errors->has('name'))
							<ul class="list-unstyled">
								<li class="text-danger">{{ $errors->first('name') }}</li>
							</ul>
					@endif
						<input class="form-control" type="text" id="name" name="name" placeholder="例)山田 花子" value="{{ old('name') }}" required >
				</td>
			</tr>
			<!-- 氏名 -->

			<!-- メールアドレス -->
			<tr class="form-group row">
				<th class="col-sm-3">
					<label for="email" class="col-form-label">メールアドレス</label>
				</th>
				<td class="col-sm-5">
					@if ($errors->has('email'))
							<ul class="list-unstyled">
									@foreach ($errors->get('email') as $error )
											<li class="text-danger">{{ $error }}</li>
									@endforeach
							</ul>
					@endif
						<input class="form-control" type="text" id="email" name="email" placeholder="例)aaa@xxx.com" value="{{ old('email') }}" required >
				</td>
			</tr>
			<!-- メールアドレス -->

			<!-- 電話番号 -->
			<tr class="form-group row">
				<th class="col-sm-3">
					<label for="phone_number" class="col-form-label">電話番号</label>
				</th>
				<td class="col-sm-5">
					@if ($errors->has('phone_number'))
							<ul class="list-unstyled">
									@foreach ($errors->get('phone_number') as $error )
											<li class="text-danger">{{ $error }}</li>
									@endforeach
							</ul>
					@endif
					<input class="form-control" type="text" id="phone_number" name="phone_number" placeholder="例)09012345678"  value="{{ old('phone_number') }}" required >
					<small class="ml-4 text-danger">※ハイフンは不要です</small>
				</td>
			</tr>
			<!-- 電話番号 -->

			<!-- 性別 -->
			<tr class="form-group row">
				<th class="col-sm-3">
					<legend class="col-form-label">性別</legend>
				</th>	
				<td class="col-sm-5">
				@if ($errors->has('gender'))
						<ul class="list-unstyled">
							<li class="text-danger">{{ $errors->first('gender') }}</li>
						</ul>
				@endif
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="male" name="gender" value="0" {{ old('gender') == '0' ? 'checked' : '' }} required>
						<label class="form-check-label" for="male">男性</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="female" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} required >
						<label class="form-check-label" for="female">女性</label>
					</div>
				</td>
			</tr>
			<!-- 性別 -->

			<!-- 生年月日 -->
			<tr class="form-group row">
				<th class="col-sm-3">
					<label for="birthday" class="col-form-label">生年月日</label>
				</th>
				<td class="col-sm-5">
					@if ($errors->has('birthday'))
							<ul class="list-unstyled">
									@foreach ($errors->get('birthday') as $error )
											<li class="text-danger">{{ $error }}</li>
									@endforeach
							</ul>
					@endif
					<input class="form-control" type="date" id="birthday" name="birthday"  value="{{ old('birthday') }}" required>
				</td>
			</tr>
			<!-- 生年月日 -->

			<!-- パスワード -->
			<tr class="form-group row">
				<th class="col-sm-3">
					<label for="password" class="col-form-label">パスワード</label>
				</th>
				<td class="col-sm-5">
				@if ($errors->has('password'))
						<ul class="list-unstyled">
								@foreach ($errors->get('password') as $error )
										<li class="text-danger">{{ $error }}</li>
								@endforeach
						</ul>
				@endif
					<input class="form-control" type="password" id="password" name="password" placeholder="8～30文字の半角英数字" required>
				</td>
			</tr>
			<tr class="form-group row">
				<th class="col-sm-3">
					<label for="password_confirmation" class="col-form-label ">パスワード(確認)</label>
				</th>
				<td class="col-sm-5">
					<input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="もう一度入力してください"required>
				</td>
			</tr>
			<!-- パスワード -->
			
		</tbody>
	</table>

	<button class="btn text-center" style="background: #0E8088" type="submit">登録</button>
</form>

<!-- ! ログインルート -->
<div class="text-center mt-2">
	<a href="#" >すでに登録済みの方はこちら</a>
</div>
</div>

@endsection