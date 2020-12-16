@extends('layout')
@section('content')
    <div>
        <div class="text-center">
            <h2>手と手整骨院Web予約</h2>
        </div>

        <div class="mt-4">
            <h4>①予約する日付を選択してください</h4>
        </div>

        <div class="">
            <div class="text-center">
                <a href="?ym={{ $prev }}" class="h2">&lt;</a>
                <span class="month color-black h4">{{ $month }}</span>
                <a href="?ym={{ $next }}" class="h2">&gt;</a>
            </div>


            <div class="text-center d-flex justify-content-center mx-1"> 
                {!! $calendar !!}
            </div>
        </div>

        <div class=" border-green text-left">

                <h3 class="m-2">
                    手と手整骨院
                </h3>
            
                <p class="m-2">
                    〒206-0802<br>
                    東京稲城市東長沼1052         TEL:042-407-5884<br>
                    定休日:日、祝日<br>
                    診療時間:9:00〜12:30  15:00〜20:00<br>
                </p> 
            
        </div>
    </div>
@endsection('content')