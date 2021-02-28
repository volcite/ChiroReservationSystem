@extends('layout')
@section('content')
<meta http-equiv="refresh" content=" 5; url={{ url('admin/index') }}">

<div class="m-2">
  <h5 class="text-center">予約修正が完了しました</h5>
  <div class="text-center ">
    <p>5秒後に一覧画面へ遷移します</p>
    {!! link_to_route('admin.index', 'Topに戻る', [], ['class' => 'btn btn-primary']) !!}
  </div>
</div>

@endsection('content')