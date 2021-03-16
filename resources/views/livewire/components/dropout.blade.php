<div class="">
    <a  id="{{$property_id}}-{{$client_id}}" class="btn btn-danger mx-1">Dropout</a>
</div>

@push('scripts')
    <script>

        $("#{{$property_id}}-{{$client_id}}").on('click',function () {
            bootbox.confirm({
                message: 'Are you sure you want to move applicant to dropouts?',
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