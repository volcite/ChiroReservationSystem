@extends('layout')

@section('content')
<h2 class="h3 mt-2 mb-4 text-center ">お客様情報登録</h2>
<p class="font-weight-bold offset-md-2"><span class="text-danger">※</span>は必須入力項目です</p>
<table class="table text-center offset-md-2">
	<form action="{{ route('users.register') }}" method="post">
	@csrf
			<tbody>
				<!-- 氏名 -->
				<tr class="row"> 
					<th class="col-sm-3 table-active">
						<label for="name">氏名<span class="text-danger ml-2">※</span></label>
					</th>
					<td class="col-sm-5 p-4 border-right">
						<input class="form-control  @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="例)山田 花子" value="{{ old('name') }}" required >
						@error('name')
							<ul class="list-unstyled text-left invalid-feedback" role="alert">
									@foreach ($errors->get('name') as $error )
											<li class="font-weight-bold" >{{ $error }}</li>
									@endforeach
							</ul>
						@enderror
					</td>
				</tr>
				<!-- 氏名 -->

				<!-- メールアドレス -->
				<tr class="row">
					<th class="col-sm-3 table-active">
						<label for="email">メールアドレス<span class="text-danger ml-2">※</span></label>
					</th>
					<td class="col-sm-5 p-4 border-right">
						<input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email" placeholder="例)aaa@xxx.com" value="{{ old('email') }}" required >
						@error('email')
							<ul class="list-unstyled  text-left invalid-feedback" role="alert">
									@foreach ($errors->get('email') as $error )
											<li class="font-weight-bold" >{{ $error }}</li>
									@endforeach
							</ul>
						@enderror
					</td>
				</tr>
				<!-- メールアドレス -->

				<!-- 電話番号 -->
				<tr class="row">
					<th class="col-sm-3 table-active">
						<label for="phone_number" >電話番号(ハイフンなし)<span class="text-danger ml-2">※</span></label>
					</th>
					<td class="col-sm-5 p-4 border-right">
						<input class="form-control @error('phone_number') is-invalid @enderror" type="text" id="phone_number" name="phone_number" placeholder="例)09012345678"  value="{{ old('phone_number') }}" required >
						@error('phone_number')
						<ul class="list-unstyled text-left invalid-feedback" role="alert">
							@foreach ($errors->get('phone_number') as $error )
									<li class="font-weight-bold" >{{ $error }}</li>
							@endforeach
						</ul>
						@enderror
					</td>
				</tr>
				<!-- 電話番号 -->

				<!-- 性別 -->
				<tr class="row">
					<th class="col-sm-3 table-active">
						<label>性別<span class="text-danger ml-2">※</span></label>
					</th>	
					<td class="col-sm-5 text-left p-4 border-right">
						<div class="form-check form-check-inline ">
							<input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" id="male" name="gender" value="0" {{ old('gender') == '0' ? 'checked' : '' }} required>
							<label class="form-check-label" for="male">男性</label>
						</div>
						<div class="form-check form-check-inline ml-3">
							<input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" id="female" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} required >
							<label class="form-check-label" for="female">女性</label>
						</div>
						@error('gender')
						<ul class="list-unstyled text-left invalid-feedback" role="alert">
							<li class=" font-weight-bold" >{{ $error }}</li>
						</ul>
						@enderror
					</td>
				</tr>
				<!-- 性別 -->

				<!-- 生年月日 -->
				<tr class="row">
					<th class="col-sm-3 table-active">
						<label for="birthday">生年月日<span class="text-danger ml-2">※</span></label>
					</th>
					<td class="col-sm-5 p-4 border-right">
						<small class="float-left mb-2">例)1970/01/01</small>
						<input class="form-control  @error('birthday') is-invalid @enderror" type="date" id="birthday" name="birthday"  value="{{ old('birthday') }}" required>
						@error('birthday')
						<ul class="list-unstyled text-left invalid-feedback" role="alert">
							@foreach ($errors->get('birthday') as $error )
								<li class="font-weight-bold">{{ $error }}</li>
							@endforeach
						</ul>
						@enderror
					</td>
				</tr>
				<!-- 生年月日 -->

				<!-- パスワード -->
				<tr class="row">
					<th class="col-sm-3 table-active">
						<label for="password" >パスワード<span class="text-danger ml-2">※</span></label>
					</th>
					<td class="col-sm-5 p-4 border-right">
						<input class="form-control  @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="8～30文字の半角英数字" required>
						@error('password')
						<ul class=" list-unstyled text-left invalid-feedback" role="alert">
							@foreach ($errors->get('password') as $error )
								<li class=" font-weight-bold" >{{ $error }}</li>
							@endforeach
						</ul>
						@enderror
					</td>
				</tr>

				<tr class="row">
					<th class="col-sm-3 table-active">
						<label for="password_confirmation" >パスワード(確認)<span class="text-danger ml-2">※</span></label>
					</th>
					<td class="col-sm-5 p-4 border-right">
						<input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="もう一度入力してください"required>
					</td>
				</tr>
				<!-- パスワード -->

				<tr class="row">
					<td class="col-sm-8 p-4">
						<button class="btn btn-lg active px-4" style="background: #0E8088" type="submit">登録</button>
						<!-- ! ログインルート -->
						<div class="mt-2">
						<a href="#" >すでに登録済みの方はこちら</a>
						</div>
					</td>
				</tr>
			</tbody>
	</form>
</table>
@endsection