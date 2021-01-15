
<div class="row">


        <a class="" href="#action-purchase-price-{{$property_id}}" data-toggle="modal" data-target="#action-purchase-price-{{$property_id}}">
           {{$purchase_price ? : "N/A"}}
        </a>
        <div class="modal fade" tabindex="-1" role="dialog"  id="action-purchase-price-{{$property_id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Actions</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-12 col-lg-12 flex">
                            @livewire('component.property-house-sold-button',['property_id' => $property_id], key($property_id))

                            @livewire('component.move-out-property-button',['property_id' => $property_id], key($property_id))
                        </div>
                    </div>

                    <div class="modal-footer">
                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

</div>





