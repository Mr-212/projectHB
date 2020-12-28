<div class="col-md-12 pt-4 pb-lg-5" >
    <div class="float-right">
        @if(!$client_id)
            <a  class="btn btn-warning mr-2" type="submit" onclick="return addclient()">Add</a>
        @else
            <a  class="btn btn-warning mr-2" type="submit" onclick="return before_closing()">Before Closing</a>
            <a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_house()">Cancel House</a>
            <a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_client()">Cancel Client</a>
            {{--<div  wire:poll="house_book_validate">--}}
            <a  class="btn btn-info" type="submit" onclick="return book_house()">Book House</a>
            {{--</div>--}}
        @endif
    </div>

</div>

@push('scripts')
<script>
    function before_closing() {
        bootbox.confirm({
            message: 'Are you sure to move applicant to Before Closing section ?',
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
                  @this.before_closing();
                     // Livewire.emit('before_closing')
                }
            }
        });
    }

    function book_house() {
        bootbox.confirm({
            message: 'Are you sure to move applicant to Book House ?',
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
                  @this.book_house();
                   // Livewire.emit('book_house')

                }
            }
        });
    }

    function addclient() {
        bootbox.confirm({
            message: 'Are you sure to add applicant as new client ?',
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
                 @this.addClient();

                }
            }
        });

    }

    function cancel_house() {
        bootbox.confirm({
            message: 'Are you sure to move applicant to cancelled houses and clear all fields except client info ?',
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
                    @this.cancel_house();
                }
            }
        });
    }

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
                    @this.cancel_client();
                }
            }
        });
    }
</script>
@endpush