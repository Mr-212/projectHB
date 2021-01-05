
@extends('layouts.app')
@section('content')
   @if(isset($type) && $type == \App\Constants\PropertyStatusConstant::HOUSE_CANCELLED)
      <livewire:client.house.tables.cancelled-house-table />
   @endif
   @if(isset($type) && $type == \App\Constants\ClientStatusConstant::CLIENT_DROPOUT)
      <livewire:client.house.tables.dropout-client-table />
   @endif
   {{--@if(isset($type) && $type == \App\Constants\PropertyStatusConstant::HOUSE_VACANT)--}}
      {{--<livewire:client.house.tables.vacant-house-table />--}}
   {{--@endif--}}

   @if(isset($type) && $type == \App\Constants\PropertyStatusConstant::HOUSE_SOLD)
      <livewire:client.house.tables.sold-house-table />
   @endif
@endsection