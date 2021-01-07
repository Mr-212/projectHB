<div class="">
    <a   id="{{$property_id}}" class="btn btn-danger" wire:key="{{$property_id}}">Dropout</a>
</div>

@push('scripts')
    <script>

        $("#{{$property_id}}").on('click',function () {
            bootbox.confirm({
                message: 'Are you sure to move applicant to cancelled clients?',
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
                         @this.emitSelf('drop_client');
                    }
                }
            });
        })
        window.addEventListener("dropout-response-{{$property_id}}", event => {
            bootbox.alert(event.detail.message);
        })
    </script>
@endpush