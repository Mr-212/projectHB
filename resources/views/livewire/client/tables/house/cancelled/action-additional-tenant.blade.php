<div class="flex space-x-1 justify-around">
    {{--@php--}}
        {{--if(isset($property_id)){--}}
        {{--$url =  url("/items/checklist/property/{$property_id}");--}}
        {{--}--}}

        {{--if(isset($client_id)){--}}
        {{--$url =  url("/items/checklist/client/{$client_id}");--}}
        {{--}--}}

    {{--@endphp--}}

    <a href="#additional-tenant-action-{{$property_id}}" class="" data-toggle="modal" data-target="#additional-tenant-action-{{$property_id}}">{{$additional_tenant_name? :'N/A'}}
    </a>



    <div class="modal fade" tabindex="-1" role="dialog" id="additional-tenant-action-{{$property_id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Actions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <a  class="btn btn-info  mr-2" type="submit" onclick="">New House</a>
                    <a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_client({{$client_id}})">Drop Out</a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function cancel_client(client_id) {
            // console.log(client_id)
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
                        console.log(client_id);
                        Livewire.emit('cancel_client');
                    }
                }
            });
        }
    </script>
@endpush