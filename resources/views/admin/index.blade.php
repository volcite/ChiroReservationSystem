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
        <form action="{{ route('admin.index') }}" >
            <!-- 名前 -->
            <div class="form-group row">
                <label for="name" class="col-3 col-form-label">名前</label>
                <div class="col-9">
                    <input type="text" class="form-control" id="name" name="name" value="{{ $name }}">
                </div>
            </div>
            <!-- 日付 -->
            <div class="form-group row">
                <label for="date" class="col-3 col-form-label" >日付</label>
                <div class="col-9">
                    <input type="date" class="form-control" id="date" name="date"  value="{{ $date }}">
                </div>
            </div>
            <!-- コース時間 -->
            <div class="form-group row">
                <label for="time" class="col-3 col-form-label">時間</label>
                <div class="col-9">
                    <select class="form-control" name="time" data-selected="{{ $time }}">
                        <option selected value="">Choose...</option>
                        <option value="1" @if($time == 1) selected @endif>9:00</option>
                        <option value="2" @if($time == 2) selected @endif>10:00</option>
                        <option value="3" @if($time == 3) selected @endif>11:00</option>
                        <option value="4" @if($time == 4) selected @endif>12:00</option>
                        <option value="5" @if($time == 5) selected @endif>15:00</option>
                        <option value="6" @if($time == 6) selected @endif>16:00</option>
                        <option value="7" @if($time == 7) selected @endif>17:00</option>
                        <option value="8" @if($time == 8) selected @endif>18:00</option>
                        <option value="9" @if($time == 9) selected @endif>19:00</option>
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

<!-- jquery使用ver ：コース時間残す-->
<!-- <script src="/js/app.js"></script>
<script>
    let time = $('select').data('selected');
    $('option[value="' + time + '"]').prop('selected', true);
</script> -->
@endsection