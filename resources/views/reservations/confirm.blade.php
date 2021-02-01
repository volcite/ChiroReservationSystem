@extends('layout')
@section('content')
<div class="m-2">
    <h5 class="text-center">ご予約ありがとうございます</h5>
    <div class="text-center ">
        {!! link_to_route('/', 'Topに戻る', [], ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@endsection('content')