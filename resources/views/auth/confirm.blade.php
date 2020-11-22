@extends('layout')

@section('content')
<h2 class="h3 mt-2 mb-4 text-center ">お客様情報の確認</h2>
<p class="offset-md-2">下記の内容で登録します</p>
<table class="table text-center offset-md-2">
  <tbody>
    <!-- 氏名 -->
    <tr class="row"> 
      <th class="col-sm-3 table-active">
        <label for="name">氏名</label>
      </th>
      <td class="col-sm-5 p-4 border-right">{{ $user->name }}</td>
    </tr>
    <!-- 氏名 -->

    <!-- メールアドレス -->
    <tr class="row"> 
      <th class="col-sm-3 table-active">
        <label for="name">メールアドレス</label>
      </th>
      <td class="col-sm-5 p-4 border-right">{{ $user->email }}</td>
    </tr>
    <!-- メールアドレス -->

    <!-- 電話番号 -->
    <tr class="row"> 
      <th class="col-sm-3 table-active">
        <label for="name">電話番号</label>
      </th>
      <td class="col-sm-5 p-4 border-right">{{ $user->phone_number }}</td>
    </tr>
    <!-- 電話番号 -->

    <!-- 性別 -->
    <tr class="row"> 
      <th class="col-sm-3 table-active">
        <label for="name">メールアドレス</label>
      </th>
      <td class="col-sm-5 p-4 border-right">{{ $gender_ja }}</td>
    </tr>
    <!-- 性別 -->

    <!-- 生年月日 -->
    <tr class="row"> 
      <th class="col-sm-3 table-active">
        <label for="name">生年月日</label>
      </th>
      <td class="col-sm-5 p-4 border-right">{{ $birthday_ja }}</td>
    </tr>
    <!-- 生年月日 -->

    <!-- パスワード -->
    <tr class="row"> 
      <th class="col-sm-3 table-active">
        <label for="name">パスワード</label>
      </th>
      <td class="col-sm-5 p-4 border-right">
      {{ $hidden_password }}
      <div><small class="text-danger">セキュリティ保護のため表示していません</small></div>
      </td>
    </tr>

      <!-- 実際送るデータ -->
      <form method="POST" action="{{ route('newUser.register') }}" >
        @csrf 
        @foreach( $user->getAttributes() as $key => $value )
        <input class="form-control" type="hidden" name="{{ $key }}" value="{{ $value }}" />
        @endforeach
      <!-- 実際送るデータ -->

    <tr class="row">
      <td class="col-sm-8 p-4">
        <button type="submit" class="btn btn-secondary btn-lg" name="back" value="true">戻る</button>
        <button class="btn btn-success btn-lg active" style="background: #0E8088" type="submit">ユーザー登録する</button>
      </td>
    </tr>
      </form>

  </tbody>
</table>
      
@endsection
