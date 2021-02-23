@extends('layout')

@section('content')
<div class="m-2">
  ※詳細ページ
  <!-- TODO 埋める -->
  {{ $reservation->name }}


  {!! link_to_route('admin.index', '戻る', [], ['class' => 'btn btn-secondary m-3']) !!}
  {!! link_to_route('admin.editReserve', '予約修正', ['id' => $reservation->id], ['class' => 'btn btn-primary m-3']) !!}
</div>
@endsection('content')