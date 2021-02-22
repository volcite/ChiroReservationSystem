@extends('layout')
@section('content')
<div class="m-2 text-center">
    <h5 class="text-center">大変申し訳ございません</h5>
    <h5 class="text-center">こちらの日時はご予約できません</h5>
    <h5 class="text-center">もう一度ご予約をお願いいたします</h5>
    <div class="text-center ">
        {!! link_to_route('/', 'Topに戻る', [], ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@endsection('content')