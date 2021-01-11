<div class="">
    <a   id="move-out-{{$property_id}}" class="btn btn-info" wire:key="{{$property_id}}">Move Out</a>
</div>

@push('scripts')
    <script>

        $("#move-out-{{$property_id}}").on('click',function () {
            bootbox.confirm({
                message: 'Are you sure you want to move property to Move Out/Vacant Section?',
                buttons: {
                    confirm: {
                        label: 'Yes',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'No',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result){
                         @this.emitSelf('move_out_property');
                    }
                }
            });
        })
        window.addEventListener("dropout-response-{{$property_id}}", event => {
            bootbox.alert(event.detail.message);
        })
    </script>
@endpush