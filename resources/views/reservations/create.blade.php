@extends('layout')

@section('content')
<div class="m-2">

            ①選択した日程<br>
                2020年4月30日<br>
            ②ご希望の時間を選択してください<br>
            

                {{Form::open(['route' => 'reservations.store'])}}  
                
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    @foreach($times as $key=>$time)
                        @if($time->id % 3 == 1)
                        <div class="">
                                <label class="btn btn-outline-secondary" for="time_id">
                                    <input type="radio" id="time_id" name="timeId" value="{{$time->id}}" autocomplete="off" style="display:none;">
                                    {{$time->time_number}}
                                </label>
                            @elseif($time->id % 3 == 2)
                                <label class="btn btn-outline-secondary" for="time_id">
                                    <input type="radio" id="time_id" name="timeId" value="{{$time->id}}" autocomplete="off" style="display:none;">
                                    {{$time->time_number}}
                                </label>
                            @elseif($time->id % 3 == 0)
                                <label class="btn btn-outline-secondary" for="time_id">
                                    <input type="radio" id="time_id" name="timeId" value="{{$time->id}}" autocomplete="off" style="display:none;">
                                    {{$time->time_number}}
                                </label>
                        </div><br>
                        @endif
                    @endforeach
                </div>
                    
            
           
                <div class="mt-2">
                    ③ご希望のコースをお選びください<br>
                    <select class="form-control" id="selectEvalute" name="selectEvaluate">
                    <option>選択してください</option>
                
                    @foreach($courses as $key=>$course)
                        @if((!empty($request->course_id) && $request->course_id == $course->id) || old('course_id') == $course->id )
                            <option value="{{ $course->id }}" selected>{{ $course->course_name }}</option>
                        @else
                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>

                <div class="mt-2">
                  ④お客様の情報を入力してください
                  <div>
                     <p class="m-0">氏名</p>
                     {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)山田花子'])}}
                  </div>
                </div>


                <div class="mt-2">
                  年齢
                  {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)25'])}}
                </div>

                <div class="mt-2">
                  性別<br>
                  {{Form::radio('gender', '1', false, ['class'=>''])}}
                  {{Form::label('gender','男性')}}

                  {{Form::radio('gender', '2', false, ['class'=>''])}}
                  {{Form::label('gender','女性')}}
                </div>

                <div class="mt-2">
                  メールアドレス<br>
                  {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)sample@email.com'])}}
                </div>

                <div class="mt-2">
                  電話番号<br>
                  {{Form::text('name', null, ['class' => 'form-control', 'placeholder' => '例)09012345678'])}}
               </div>

               <div class="container mt-4 text-center">

                    <a class="btn btn-primary" href="">
                        予約確認
                    </a>

               </div>


            {{Form::close()}}

</div>

@endsection('content')