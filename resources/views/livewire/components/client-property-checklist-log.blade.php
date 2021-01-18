<div class="">
    {{--<livewire:client.tables.client-log-table params="{{$client_id}}" />--}}
    {{--<livewire:client.tables.client-property-checklist-log-table params="['client_id'=>$client_id,'property_id'=>$property_id]" />--}}

    <a href="#logs-{{$property_id}}" data-target="#logs-{{$property_id}}" data-toggle="modal" class="">
        <svg class="w-4 h-1" fill="currentColor" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
            <img class="" src="{{url('system')}}" >
        </svg>
    </a>


    <!-- Modal -->
    <div wire:ignore.self  id="logs-{{$property_id}}" class="modal fade"  tabindex="-1" role="document" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl mw-100" style="width: 90%" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @livewire('client.tables.client-property-checklist-log-table', ['params'=>['client_id' => $client_id, 'property_id'=> $property_id]],key($property_id))

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
