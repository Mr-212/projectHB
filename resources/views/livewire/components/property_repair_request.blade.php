<div class="row">
    <a href="#repair-request-modal-{{$property_id}}" class=""  data-toggle="modal" data-target="#repair-request-modal-{{$property_id}}">{{$field ?: 'N/A'}}</a>

    <div  wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="repair-request-modal-{{$property_id}}">
        <div  class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add Repair Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <div class="col-md-12 col-lg-12">
                            <div>
                                <input  class="" type="checkbox" name="repair_request_checked" value="" wire:model="property.repair_request_checked" wire:click="markChecklist('property','repair_request_checked')">
                                <label>Repair Request?</label>
                            </div>
                            @if($property->repair_request_checked)
                                {{--<x-checkedt-at-comment>--}}
                                    {{--<x-slot name="checked">--}}
                                        {{--property.repair_request_checked_at--}}
                                    {{--</x-slot>--}}

                                    {{--<x-slot name="comment">--}}
                                        {{--property.repair_request_checked_comment--}}
                                    {{--</x-slot>--}}
                                {{--</x-checkedt-at-comment>--}}
                            <div>
                                <label>Checked At</label>
                                <input class="form-control" id="repair_request_checked_comment" type="text" wire:model="property.repair_request_checked_at" readonly>
                            </div>

                            <div>
                                @error('property.repair_request_checked_comment') <span class="error alert-danger">{{ $message }}</span> @enderror
                                <div>
                                    <label>Comment</label>
                                    <input class="form-control" id="repair_request_checked_comment" type="text" wire:model="property.repair_request_checked_comment" >
                                </div>
                             </div>

                            {{--<div>--}}
                                {{--<label>Checked BY</label>--}}
                                {{--<input class="form-control" id="repair_request_checked_comment" type="text" wire:model="property.repair_request_checked_by" readonly>--}}
                            {{--</div>--}}
                            @endif
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
        window.addEventListener("repair-request-{{$wire_id}}", event => {
            bootbox.alert(event.detail.message);
            $("#repair-request-modal-{{$property_id}}").modal('hide');
        });


    </script>
@endpush