<div class="row">
    <a href="#repair-request-modal-{{$property_id}}" class=""  data-toggle="modal" data-target="#repair-request-modal-{{$property_id}}">{{$field}}</a>

    <div  wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="repair-request-modal-{{$property_id}}">
        <div  class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Repair Request Comment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <label>Comment</label>
                            <input class="form-control" id="repair_request_checked_comment" type="text" wire:model="property.repair_request_checked_comment" >
                        </div>

                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="property-update" wire:click.prevent="save">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
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