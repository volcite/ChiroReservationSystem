@extends('layout')

@section('content')
<div class="m-2">
  ※editページ
  {{ $reservation->name }}
  <!-- 戻るボタン -->
  <!-- TODO 予約確認ボタン→checkReeserveページもどき-->
  {!! link_to_route('admin.index', '戻る', [], ['class' => 'btn btn-secondary m-3']) !!}
  {!! link_to_route('admin.confirmReserve', '確認画面へ', ['id' => $reservation->id], ['class' => 'btn btn-primary m-3']) !!}
</div>
@endsection('content')