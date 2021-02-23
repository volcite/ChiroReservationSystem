@extends('layout')
@section('content')
{{ $reservation->name }}

{!! link_to_route('admin.editReserve', '予約修正', ['id' => $reservation->id], ['class' => 'btn btn-secondary m-3']) !!}
<!-- TODO ゆんたさんのコントローラへ -->
{!! link_to('/admin/thanx', '修正確定', [], ['class' => 'btn btn-primary m-3']) !!}

@endsection('content')