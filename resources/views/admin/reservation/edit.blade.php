@extends('layout')

@section('content')
<div class="m-2">
    <div>
			<h4>①選択した日程</h4>
			<h5 class="p-3">{{ $reservation->reservation_date->format('Y年m月d日') }}</h5>
			{!! Form::hidden('date', $reservation->reservation_date) !!}
    </div>

    <div class="mt-2">
			<h4>②ご希望の時間を選択してください</h4>
			<div class="btn-group btn-group-toggle @if(!empty($errors->first('time_id'))) has-error @endif" data-toggle="buttons">
				<div class="row justify-content-center">
					@foreach($times as $time)
						@if($time->id % 3 == 1)
							@if(in_array($time->id, $reserved_id))
							<div class="col-sm-12 text-center">                                      
              <span class=m-3>{{$time->time_number}}</span>
							@else
							<div class="col-sm-12 text-center">
								<label class="btn btn-outline-secondary m-1 @if($reservation->time_id == $time->id) active @endif" for="time_id">
								<input type="radio" id="time_id" name="time_id" value="{{$time->id}}" autocomplete="off" style="display:none;">
									{{ $time->time_number }}
								</label>
							@endif	
						@elseif($time->id % 3 == 2)
							@if(in_array($time->id, $reserved_id))
							<span class=m-3>{{$time->time_number}}</span>
							@else
							<label class="btn btn-outline-secondary m-1  @if($reservation->time_id == $time->id) active @endif" for="time_id">
							<input type="radio" id="time_id" name="time_id" value="{{$time->id}}" autocomplete="off" style="display:none;">
							{{$time->time_number}}
							</label>
							@endif	
						@elseif($time->id % 3 == 0)
							@if(in_array($time->id, $reserved_id))
								<span class=m-3>{{$time->time_number}}</span>
							@else
								<label class="btn btn-outline-secondary m-1  @if($reservation->time_id == $time->id) active @endif" for="time_id">
								<input type="radio" id="time_id" name="time_id" value="{{$time->id}}" autocomplete="off" style="display:none;">
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

    <div class="mt-4 @error('course_id') is-invalid @enderror">
			<h4>③ご希望のコースをお選びください</h4>
			<select class="form-control" id="course_id" name="course_id">
					@foreach($courses as $course)
							<option value="{{ $course->id }}" 
							@if ($reservation->course_id == $course->id) selected @endif>
									{{ $course->course_name }}
							</option>
					@endforeach
			</select>
			<span class="text-danger help-block">{{$errors->first('course_id')}}</span>
    </div>
    <div class="mt-4">
			<h4>④お客様の情報を入力してください</h4>
			<div class="@error('name') is-invalid @enderror">
				{!! Form::label('','名前') !!}
				{!! Form::text('name', $reservation->name, ['class' => 'form-control', 'placeholder' => '例)山田花子']) !!}
				@error('name')
						@foreach ($errors->get('name') as $error )
								<span class="text-danger help-block">{{$error}}</span>
						@endforeach
				@enderror
			</div>
			<div class="mt-2 @error('age') is-invalid @enderror">
				{!! Form::label('','年齢') !!}
				{!! Form::text('age', $reservation->age, ['class' => 'form-control', 'placeholder' => '例)25']) !!}
				@error('age')
						@foreach ($errors->get('age') as $error )
								<span class="text-danger help-block">{{$error}}</span>
						@endforeach
				@enderror    
			</div>
			<div class="mt-2 @error('age') is-invalid @enderror">
				{!! Form::label('','性別') !!}</br>

				{!! Form::radio('gender', '1', $reservation->gender == 1 ? true : false, ['class'=>'']) !!}
				{!! Form::label('gender','男性') !!}

				{!! Form::radio('gender', '2',  $reservation->gender == 2 ? true : false, ['class'=>'']) !!}
				{!! Form::label('gender','女性') !!}
					</br><span class="text-danger help-block">{{$errors->first('gender')}}</span>
			</div>
			<div class="mt-2 @error('email') is-invalid @enderror">
				{{Form::label('','メールアドレス')}}
				{!! Form::text('email', $reservation->email, ['class' => 'form-control', 'placeholder' => '例)sample@email.com']) !!}
				@error('email')
						@foreach ($errors->get('email') as $error )
								<span class="text-danger help-block">{{$error}}</span>
						@endforeach
				@enderror     
			</div>
			<div class="mt-2 @error('phone_number') is-invalid @enderror">
				{!! Form::label('','電話番号') !!}
				{!! Form::text('phone_number', $reservation->phone_number, ['class' => 'form-control', 'placeholder' => '例)09012345678']) !!}
				@error('phone_number')
						@foreach ($errors->get('phone_number') as $error )
								<span class="text-danger help-block">{{$error}}</span>
						@endforeach
				@enderror         
			</div>
		</div>

	<div class="text-center ">
		{!! link_to_route('admin.index', '戻る', [], ['class' => 'btn btn-secondary m-3']) !!}
		{!! link_to_route('admin.confirmReserve', '確認画面へ', ['id' => $reservation->id], ['class' => 'btn btn-primary m-3']) !!}
	</div>
</div>
@endsection