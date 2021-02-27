@extends('layout')
<link href="{{ asset('css/admin/index.css') }}" rel="stylesheet">

@section('content')
<div class="row">
    <!-- 検索機能 -->
    <aside class="col-12 col-md-3">
        <div class="search">
            <form action="{{ route('admin.search') }}">
                <!-- 名前 -->
                <div class="form-group row">
                    <label for="name" class="col-4 col-form-label">名前</label>
                    <div class="col-8">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <!-- 日付 -->
                <div class="form-group row">
                    <label for="date" class="col-4 col-form-label">日付</label>
                    <div class="col-8">
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}">
                    </div>
                </div>
                <!-- コース時間 -->
                <div class="form-group row">
                    <label for="time" class="col-4 col-form-label">時間</label>
                    <div class="col-8">
                        <select class="form-control" name="time">
                            <option selected value="">Choose...</option>
                            <option value="1" @if(old('time')==1) selected @endif>9:00</option>
                            <option value="2" @if(old('time')==2) selected @endif>10:00</option>
                            <option value="3" @if(old('time')==3) selected @endif>11:00</option>
                            <option value="4" @if(old('time')==4) selected @endif>12:00</option>
                            <option value="5" @if(old('time')==5) selected @endif>15:00</option>
                            <option value="6" @if(old('time')==6) selected @endif>16:00</option>
                            <option value="7" @if(old('time')==7) selected @endif>17:00</option>
                            <option value="8" @if(old('time')==8) selected @endif>18:00</option>
                            <option value="9" @if(old('time')==9) selected @endif>19:00</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info float-right">検索</button>
            </form>
        </div>
    </aside>

    <!-- 予約一覧 -->
    <main class="col-12 col-md-8 offset-md-1">
        <h3><img src="/images/logoblack.png" width="28" height="28"> 予約一覧
            <small>(全{{ $reservations->total() }}件)</small>
        </h3>
        @if($reservations->total())
            @foreach ($reservations as $reservation)
            <section class="reservation_result__item my-4">
                <a href="#">
                    <!-- 詳細ページへ -->
                    <div class="information m-3">
                        <p class="font-weight-bold">
                            {{ $reservation->reservation_date->format('Y年m月d日') }}
                            {{ $reservation->time->time_number }}
                            <span class="ml-md-5 font-weight-normal">{{ $reservation-> name }} 様</span>
                        </p>
                        <p> 予約コース： {{ $reservation->course->course_name }} </p>
                    </div>
                </a>
                <div class="link col-12 mb-2">
                    <a href="#" class="link_detail col-3 col-md-2">予約詳細
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </a>
                    <a href="#" class="link_edit col-3 col-md-2 offset-md-4">
                        予約修正
                    </a>
                    <!-- 予約キャンセルボタンcomponent -->
                    @component('admin.components.cancel_btn')
                    @slot('reservation', $reservation)
                    @endcomponent
                </div>
            </section>
            @endforeach

        {{ $reservations->links('admin.index-pagination') }}
        @else
            <p>見つかりませんでした</p>
        @endif
    </main>
</div>

@endsection