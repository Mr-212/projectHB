
@extends('layouts.app')
@section('content')
   @if(isset($type) && $type == \App\Constants\PropertyStageConstant::HOUSE_CANCELLED)
      <livewire:client.house.tables.cancelled-house-table />
   @endif
   @if(isset($type) && $type == \App\Constants\PropertyStageConstant::DROPOUT_CLIENT)
      <livewire:client.house.tables.dropout-client-table />
   @endif
@endsection