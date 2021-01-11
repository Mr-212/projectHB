
<div class="row">


    <div class="">

        @php
            if(isset($property_id)){
            $url =  url("/house/vacant/{$property_id}");
            }

            if(isset($client_id)){
            $url =  url("/items/checklist/client/{$client_id}");
            }
       // $url =  url("/items/checklist/{$client_id}");

        @endphp

        {{--<a href="{{$url}}" class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">--}}
        {{--<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>--}}
        {{--</a>--}}
        {{--<a href="#sold-modal"  data-toggle="modal" data-target="#sold-modal" class="btn btn-primary btn-sm">Sold</a>--}}
        {{--<div class="col-md-12">--}}
        {{--@livewire('property.item-checklist.property-house-sold-component',['property_id' => $property_id], key($property_id))--}}
        {{--</div>--}}
        {{--<div class="col-md-12 pt-2">--}}
        {{--<a href="{{$url}}" class="btn btn-info btn-sm btn-block"><span>New Client</span></a>--}}
        {{--</div>--}}
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
                    <div class="modal-body ">
                        <div class="row justify-content-center">
                                @livewire('component.property-house-sold-button',['property_id' => $property_id], key($property_id))
                                {{--<a href="" class="btn btn-info ml-2"><span>Move Out</span></a>--}}
                                @livewire('component.move-out-property-button',['property_id' => $property_id], key($property_id))

                            {{--<a href="" class="btn btn-info ml-2"><span>Eviction</span></a>--}}
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>





        {{----}}
        {{--<button wire:click="delete" class="p-1 text-red-600 hover:bg-red-600 hover:text-white rounded">--}}
        {{--<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>--}}
        {{--</button>--}}




    </div>
</div>