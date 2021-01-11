{{--<div class="inline-flex space-x-1 justify-around" >--}}
<div class="row">


<div class="">
    {{--<a href="" target="_blank" class="p-1 text-teal-600 hover:bg-teal-600 hover:text-white rounded">--}}
    {{--<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>--}}
    {{--</a>--}}
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
    <a class="btn btn-info btn-sm" href="#property-vacant-action-{{$property_id}}" data-toggle="modal" data-target="#property-vacant-action-{{$property_id}}">
        Action
    </a>
    <div class="modal fade" tabindex="-1" role="dialog"  id="property-vacant-action-{{$property_id}}">
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
                        <div class="">
                                @livewire('component.property-house-sold-button',['property_id' => $property_id], key($property_id))
                        </div>
                        <a href="{{$url}}" class="btn btn-info ml-2"><span>New Client</span></a>

                    </div>
                    {{--<div class="row justify-content-center">--}}
                        {{--<div class="col-md-6 pt-2">--}}
                            {{--<a href="{{$url}}" class="btn btn-info btn-sm btn-block"><span>New Client</span></a>--}}

                        {{--</div>--}}
                    {{--</div>--}}


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