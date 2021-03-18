@extends('layout')
@section('content')
<div class="m-2">
    {{ Form::open(['route' => 'reservations.checkStore']) }}  
        <div>
            <h4>①選択した日程</h4>
            <h5 class="p-3">{{ $carbon_date->isoFormat('YYYY年MM月DD日 (ddd)') }}</h5>
            {!! Form::hidden('reservation_year', $year) !!}
            {!! Form::hidden('reservation_month', $month) !!}
            {!! Form::hidden('reservation_day', $day) !!}
        </div>
        <div class="mt-2">
            <h4>②ご希望の時間を選択してください</h4>
            <div class="btn-group btn-group-toggle @if(!empty($errors->first('time_id'))) has-error @endif" data-toggle="buttons">
                <div class="row  justify-content-center">
                    @foreach($times as $key=>$time)
                        @if($time->id % 3 == 1)
                            @if($count[$time->id] == 1)
                                <div class="col-sm-12 text-center">                                      
                                    <span class=m-3>{{$time->time_number}}</span>
                            @else
                                <div class="col-sm-12 text-center">
                                    <label class="btn btn-outline-secondary m-1 @if(old('time_id') == $time->id) active @endif" for="time_id">
                                        <input type="radio" id="time_id" name="time_id" value="{{$time->id}}" @if(old('time_id') == $time->id) checked @endif
                                        autocomplete="off" style="display:none;">
                                        {{ $time->time_number }}
                                    </label>
                            @endif
                        @elseif($time->id % 3 == 2)
                            @if($count[$time->id] == 1)
                                <span class=m-3>{{$time->time_number}}</span>
                            @else
                                <label class="btn btn-outline-secondary m-1 @if(old('time_id') == $time->id) active @endif" for="time_id">
                                    <input type="radio" id="time_id" name="time_id" value="{{$time->id}}" @if(old('time_id') == $time->id) checked @endif
                                    autocomplete="off" style="display:none;">
                                    {{$time->time_number}}
                                </label>
                            @endif
                        @elseif($time->id % 3 == 0)
                            @if($count[$time->id] == 1)
                                    <span class=m-3>{{$time->time_number}}</span>
                                </div>
                            @else
                                <label class="btn btn-outline-secondary m-1 @if(old('time_id') == $time->id) active @endif" for="time_id">
                                    <input type="radio" id="time_id" name="time_id" value="{{$time->id}}" @if(old('time_id') == $time->id) checked @endif
                                    autocomplete="off" style="display:none;">
                                    {{$time->time_number}}
                                </label>
                            </div>
                            @endif
                        @endif
                    @endforeach
                    <span class="text-danger help-block text-center">{{$errors->first('time_id')}}</span>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <div class="@if(!empty($errors->first('course_id'))) has-error @endif">
                <h4>③ご希望のコースをお選びください</h4>
                <select class="form-control" id="course_id" name="course_id">
                    <option hidden>選択してください</option>
                    @foreach($courses as $course)
                        @switch($course->id)
                            @case(1)    <!--全身調整 -->
                            @case(2)    <!--骨盤ゆがみ -->
                                <option value="{{ $course->id }}" @if(old('course_id')== $course->id) selected  @endif>
                                    {{ $course->course_name }} {{ $course->base_price }}円(初回{{ $course->another_price }}円)
                                </option>
                                @break
                            @case(3)    <!--リフトアップ -->
                                <option value="{{ $course->id }}"  @if(old('course_id')== $course->id) selected  @endif>
                                    {{ $course->course_name }} 30分{{ $course->another_price }}円
                                </option>
                                @break
                            @case(4)    <!--ダイエット -->
                                <option value="{{ $course->id }}" @if(old('course_id')== $course->id) selected  @endif>
                                    {{ $course->course_name }} 体験{{ $course->another_price }}円
                                </option>
                                @break
                            @case(8)   <!--その他 -->
                                <option value="{{ $course->id }}" @if(old('course_id')== $course->id) selected  @endif>
                                    {{ $course->course_name }}
                                </option>
                                @break
                            @default    <!--慢性系 -->
                                <option value="{{ $course->id }}" @if(old('course_id')== $course->id) selected  @endif>
                                    {{ $course->course_name }} {{ $course->base_price }}円
                                </option>
                        @endswitch
                    @endforeach
                </select>
                <span class="text-danger help-block">{{$errors->first('course_id')}}</span>
            </div>
            <div class="mt-4">
                <h4>④お客様の情報を入力してください</h4>
                <div class="@if(!empty($errors->first('name'))) has-error @endif">
                    {!! Form::label('','名前') !!}
                    {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => '例)山田花子']) !!}
                    <span class="text-danger help-block">{{$errors->first('name')}}</span>
                </div>
                <div class="mt-2 @if(!empty($errors->first('age'))) has-error @endif">
                    {!! Form::label('','年齢') !!}
                    {!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => '例)25']) !!}
                    <span class="text-danger help-block">{{$errors->first('age')}}</span>
                </div>
                <div class="mt-2 @if(!empty($errors->first('gender'))) has-error @endif">
                    {!! Form::label('','性別') !!}</br>

                    {!! Form::radio('gender', '1', false, ['class'=>'']) !!}
                    {!! Form::label('gender','男性') !!}

                    {!! Form::radio('gender', '2', false, ['class'=>'']) !!}
                    {!! Form::label('gender','女性') !!}
                    </br><span class="text-danger help-block">{{$errors->first('gender')}}</span>
                </div>
                <div class="mt-2 @if(!empty($errors->first('email'))) has-error @endif">
                    {{Form::label('','メールアドレス')}}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => '例)sample@email.com']) !!}
                    <span class="text-danger help-block">{{$errors->first('email')}}</span>
                </div>
                <div class="mt-2 @if(!empty($errors->first('phone_number'))) has-error @endif">
                    {!! Form::label('','電話番号') !!}
                    {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => '例)09012345678']) !!}
                    <span class="text-danger help-block">{{$errors->first('phone_number')}}</span>
                </div>
            </div>
        </div>
        <div class="text-center ">
            {!! Form::submit('予約確認',['class'=> 'btn btn-primary mt-3']) !!}
        </div>
    {{Form::close()}}
</div>
@endsection('content')