@extends('layout')

@section('content')

    @guest
        <div class="text-center">
            <h2>手と手整骨院予約サイト</h2>
        </div>

        <div class=" border-green text-left ">

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
    @else

        <div class="text-center">
        <h2>手と手整骨院予約サイト</h2>
        </div>

        <div>
            <h3>①予約する日付を選択してください</h3>
        </div>

        <div class=" border-green text-left ">

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
    
    @endguest

    


@endsection('content')