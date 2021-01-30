@extends('layout')
@section('content')
<div class="m-2">
    <div>
        <h4>ご予約日時</h4>
        <h5 class="p-3">{{ $reservation["year"] }}年{{ $reservation["month"] }}月{{ $reservation["day"] }}日
        @foreach($times as $key=>$time)
            @if($time->id == $reservation["time_id"])
                {{$time->time_number}}</h5>
            @endif
        @endforeach
    </div>
    <div class="mt-4">
        <div class="@if(!empty($errors->first('course_id'))) has-error @endif">
            <h4>ご予約コース</h4>
            @foreach($courses as $key=>$course)
                @if($course->id == $reservation["course_id"])
                    <h5>{{$course->course_name}}</h5>
                @endif
            @endforeach
        </div>
        <div class="mt-4">
            <h4>お客様情報</h4>
            <div class="">
                <h6>お名前</6>
                <h6>{{ $reservation["name"] }}様</h6>
            </div>
            <div class="">
                <h6>ご年齢</6>
                <h6>{{ $reservation["age"] }}歳</h6>
            </div>
            <div class="">
                <h6>性別</6>
                @if($reservation["gender"] == 1)
                    <h5>男性</h5>
                @elseif($reservation["gender"] == 2)
                    <h5>女性</h5>
                @endif
            </div>
            <div class="">
                <h6>メールアドレス</6>
                <h6>{{ $reservation["email"] }}</h6>
            </div>
            <div class="">
                <h6>電話番号</6>
                <h6>{{ $reservation["phone_number"] }}</h6>
            </div>
        </div>
    </div>
    <div class="text-center ">
    {!! link_to_route('reservations.create', '予約修正', ['year' => $reservation["year"], 'month' => $reservation["month"], 'day' => $reservation["day"]], ['class' => 'btn btn-primary']) !!}
    {!! link_to_route('reservations.confirm', '予約確定', [], ['class' => 'btn btn-primary']) !!}
    </div>
</div>
@endsection('content')