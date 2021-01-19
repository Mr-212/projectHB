<div class="col-md-12 pt-4" >
    <div class="d-flex  justify-content-end">

        @if($property_id || $client_id)
            @if( empty($property->property_status_id) || $property->property_status_id ==\App\Constants\PropertyStatusConstant::BEFORE_DUE_DILIGENCE )
                <a  class="btn btn-primary mx-1"  onclick="return save_item()">Save</a>
                <a  class="btn btn-warning mx-1"  onclick="return before_closing()">Before Closing</a>
                <a  class="btn btn-danger  mx-1"  onclick="cancel_house()">Cancel House</a>
                @livewire('component.dropout-client-button', ['client_id' => $client_id,'property_id'=> $property_id])

            {{--<a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_client()">Drop Out</a>--}}
                {{--<a  class="" type="submit">@livewire('component.dropout-client-component', ['client_id' => $client_id])</a>--}}

                {{--<a  class="btn btn-info" type="submit" onclick="return book_house()">Book House</a>--}}
            @endif

            @if($property->property_status_id == \App\Constants\PropertyStatusConstant::HOUSE_BOOKED)
                    @livewire('component.property-house-sold-button',['property_id' => $property_id], key($property_id))
                    @livewire('component.move-out-property-button',['property_id' => $property_id], key($property_id))
            @endif

            @if($property->property_status_id == \App\Constants\PropertyStatusConstant::HOUSE_CANCELLED)
                {{--<p>here</p>--}}
                <a  class="btn btn-warning mr-2" type="submit" onclick="return before_closing()">Before Closing</a>
                {{--<a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_client()">Drop Out</a>--}}
                {{--<a  class="" type="submit">@livewire('component.dropout-client-button', ['client_id' => $client_id])</a>--}}
            @endif

            @if($property->property_status_id == \App\Constants\PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE)
                {{--<a  class="btn btn-warning mr-2" type="submit" onclick="return before_closing()">Before Closing</a>--}}
                    <a  class="btn btn-primary mr-2" type="submit" onclick="return save_item()">Save</a>
                    <a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_house()">Cancel House</a>
                    {{--<a  class="" type="submit">@livewire('component.dropout-client-component', ['client_id' => $client_id])</a>--}}

                    <a  class="btn btn-info" type="submit" onclick="return book_house()">Book House</a>
            @endif


            @if($property->property_status_id == \App\Constants\PropertyStatusConstant::HOUSE_VACANT)
                    @livewire('component.property-house-sold-button',['property_id' => $property_id], key($property_id))
                    @livewire('component.move-out-property-button',['property_id' => $property_id], key($property_id))
                    {{--<a  class="btn btn-warning mr-2" type="submit" onclick="return before_closing()">Before Closing</a>--}}
            @endif
                {{--<div  wire:poll="house_book_validate">--}}
                {{--<a  class="btn btn-info" type="submit" onclick="return book_house()">Book House</a>--}}
        @elseif($client_id)
        @else
                 <a  class="btn btn-warning mr-2" type="submit" onclick="return addclient()">Add</a>
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

    // function cancel_client() {
    //     bootbox.confirm({
    //         message: 'Are you sure to move applicant to cancelled clients?',
    //         buttons: {
    //             confirm: {
    //                 label: 'Yes',
    //                 className: 'btn-success'
    //             },
    //             cancel: {
    //                 label: 'No',
    //                 className: 'btn-danger'
    //             }
    //         },
    //         callback: function (result) {
    //             if(result){
    //                 @this.cancel_client();
    //             }
    //         }
    //     });
    // }

    function save_item() {
        bootbox.confirm({
            message: 'Do you want to save current state of item?',
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
                    @this.save_item();
                }
            }
        });
    }
</script>
@endpush