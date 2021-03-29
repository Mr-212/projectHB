@extends('layouts.app')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-info" href="{{url('items/client/add')}}">Add Client</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
   <livewire:client.tables.clients-table />
@endsection