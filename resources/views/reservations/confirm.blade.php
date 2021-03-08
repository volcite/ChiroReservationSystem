@extends('layout')
@section('content')
<div class="m-2 text-center">
    <h5>ご予約ありがとうございます</h5>
    <p>入力されたメールアドレスに予約完了メールをお送りしました</p>
    <div class="text-center ">
        {!! link_to_route('/', 'Topに戻る', [], ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@endsection('content')