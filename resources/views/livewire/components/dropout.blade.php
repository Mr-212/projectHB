<div class="">

    <a onclick="cancel_client()" class="btn btn-danger" wire:key="{{$property_id}}">Dropout</a>

    {{--<a href="#dropout-modal-{{$client_id}}" class="" data-toggle="modal" data-target="#dropout-modal-{{$client_id}}">Dropout--}}
    {{--</a>--}}



    {{--<div class="modal fade" tabindex="-1" role="dialog" id="dropout-modal-{{$client_id}}">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title">Actions</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body text-center">--}}
                    {{--<a  class="btn btn-info  mr-2" type="submit" onclick="">New House</a>--}}
                    {{--<a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_client({{$client_id}})">Drop Out</a>--}}

                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>

@push('scripts')
    <script>
        function cancel_client() {
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
                        // console.log(@this.find())
                        //  @this.call('drop_client');
                         @this.emitSelf('drop_client',"{{$client_id}}","{{$property_id}}");
                         // Livewire.find.emit('drop_client');
                    }
                }
            });
        }

        window.addEventListener("dropout-response-{{$property_id}}", event => {
            bootbox.alert(event.detail.message);
        })
    </script>
@endpush