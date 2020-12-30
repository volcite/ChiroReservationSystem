@extends('layout')
<!-- ? CSSファイルに切り出し？ -->
<style>
    .reservation{
        border: solid 0.1rem #000000;
        border-radius: 1rem;
    }
    p{
        font-size: 1.3rem;
    }
</style>

@section('content')
<div class="row">
    <!-- 検索機能 -->
    <aside class="col-12 col-md-3">
        <form action="{{ route('admin.index') }}">
            <div class="form-group row">
                <label for="name" class="col-3 col-form-label">名前</label>
                <div class="col-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-3 col-form-label">日付</label>
                <div class="col-9">
                    <input type="date" class="form-control" id="date" name="date"  value="{{ old('date') }}">
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-3 col-form-label">時間</label>
                <div class="col-9">
                    <select class="form-control" id="time" name="time" value="{{ old('time') }}">
                        <option selected value="">Choose...</option>
                        <option value="1">9:00</option>
                        <option value="2">10:00</option>
                        <option value="3">11:00</option>
                        <option value="4">12:00</option>
                        <option value="5">15:00</option>
                        <option value="6">16:00</option>
                        <option value="7">17:00</option>
                        <option value="8">18:00</option>
                        <option value="9">19:00</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-info float-right">検索</button>
        </form>
    </aside>

    <!-- 予約一覧 -->
    <main class="col-12 col-md-8 offset-md-1"> 
        <h2>予約一覧 <small>(全{{ $reservations->total() }}件)</small></h2>
        @if($reservations->total())
            @foreach ($reservations as $reservation) 
                <section class="reservation my-4">
                    <div class="m-3">
                        <p>
                        {{ $reservation->reservation_date->format('Y年m月d日') }}
                        {{ $reservation->time->time_number }}
                        <span class="ml-4">{{ $reservation-> name }} 様</span>
                        </p>
                        <p>
                            予約コース： {{ $reservation->course->course_name }}
                            <div class="col-12 text-right">
                                <!-- ? 予約詳細追加してみた -->
                                <button class="btn btn-success ml-5">予約詳細</button>
                                <button class="btn btn-info ml-3">予約修正</button>
                                <button class="btn btn-danger ml-3">予約キャンセル</button>
                            </div>
                        </p>
                    </div>
                </section>
            @endforeach
    {{ $reservations->links() }} 
        @else
        <p>見つかりませんでした</p>
        @endif
    </main>
    </div>
@endsection