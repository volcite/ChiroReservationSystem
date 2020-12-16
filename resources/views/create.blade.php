@extends('layout')

@section('content')


        <p class="m-2">
            ①選択した日程<br>
                2020年4月30日<br>
            ②ご希望の時間を選択してください<br>
            <div>

                {{Form::open(['route' => 'reservation', 'method' => 'post'])}}  
                
                    <!-- {{Form::radio('reservation_time', '9:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','9:00~')}}
                
                    {{Form::radio('reservation_time', '10:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','10:00~')}}

                    {{Form::radio('reservation_time', '11:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','11:00~')}} -->

                    <!-- <div class="radiobox">
                        <input id="radio1" class="radiobutton" name="hoge" type="radio" value="ラジオボタン1" />
                        <label for="radio1">9:00~</label>
                        <input id="radio2" class="radiobutton" name="hoge" type="radio" value="ラジオボタン2" />
                        <label for="radio2">ラジオボタン2</label> 
                        <input id="radio3" class="radiobutton" name="hoge" type="radio" value="ラジオボタン3" />
                        <label for="radio3">ラジオボタン3</label>
                    </div> -->
            
                    <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-default active">
                        <input type="radio" autocomplete="off" checked> ラジオボタン１
                    </label>
                    <label class="btn btn-default">
                        <input type="radio" autocomplete="off"> ラジオボタン２
                    </label>
                    <label class="btn btn-default">
                        <input type="radio" autocomplete="off"> ラジオボタン３
                    </label>
                </div>
                
                <div>

                    {{Form::radio('reservation_time', '12:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','12:00~')}}
                
                    {{Form::radio('reservation_time', '15:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','15:00~')}}

                    {{Form::radio('reservation_time', '16:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','16:00~')}}

                </div>


                <div>

                    {{Form::radio('reservation_time', '17:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','17:00~')}}
                
                    {{Form::radio('reservation_time', '18:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','18:00~')}}

                    {{Form::radio('reservation_time', '19:00~', false, ['class'=>'','id'=>'reservationtime'])}}
                    {{Form::label('reservation_time','19:00~')}}

                </div>
            
            </div>
            ③ご希望のコースをお選びください<br>
            <select class="form-control" id="selectEvalute" name="selectEvaluate">
            <option>選択してください</option>
            <option value=1>よかった</option>
            <option value=2>普通</option>
            <option value=3>悪い</option>
            </select>

            <div>
                ④お客様の情報を入力してください<br>
                <div>
                    <p class="m-0">氏名</p>
                    {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)山田花子'])}}
                </div>
                年齢<br>
                {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)25'])}}

                性別<br>
                {{Form::radio('gender', '1', false, ['class'=>''])}}
                {{Form::label('gender','男性')}}

                {{Form::radio('gender', '2', false, ['class'=>''])}}
                {{Form::label('gender','女性')}}<br>

                メールアドレス<br>
                {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)email'])}}
                電話番号<br>
                {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)09012345678'])}}

            </div>
            {{Form::close()}}
        </p> 
            
     


@endsection('content')