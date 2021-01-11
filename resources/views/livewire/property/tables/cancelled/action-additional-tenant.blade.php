<div class="flex space-x-1 justify-around">
    {{--@php--}}
        {{--if(isset($property_id)){--}}
        {{--$url =  url("/items/checklist/property/{$property_id}");--}}
        {{--}--}}

        {{--if(isset($client_id)){--}}
        {{--$url =  url("/items/checklist/client/{$client_id}");--}}
        {{--}--}}

    {{--@endphp--}}

    {{--<a href="#additional-tenant-action-{{$property_id}}" class="" data-toggle="modal" data-target="#additional-tenant-action-{{$property_id}}">{{$additional_tenant_name? :'N/A'}}</a>--}}
    <a href="#additional-tenant-action-{{$property_id}}" class="" data-toggle="modal" data-target="#additional-tenant-action-{{$property_id}}">{{ $client_id}}</a>

    {{--<button class="btn btn-danger">{{$additional_tenant_name? :'N/A'}}--}}
        {{--@livewire('client.component.dropout-client-component', ['client_id' => $client_id])--}}
    {{--</button>--}}



    <div class="modal fade" tabindex="-1" role="dialog" id="additional-tenant-action-{{$property_id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Actions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row justify-center">
                        {{--<div class="col-md-3">--}}
                        <a  class="btn btn-info"  href='{{url("/house/cancelled/client/{$client_id}/true")}}'>New House</a>
                        <div class="ml-2">
                            @livewire('component.dropout-client-button', ['client_id'=> $client_id, 'property_id'=> $property_id], key($property_id))
                        </div>
                        {{--</div>--}}
                    </div>

                    {{--<a  class="btn btn-danger  mr-2" type="submit" onclick="cancel_client({{$client_id}})">Drop Out</a>--}}
                    {{--<a  class="btn btn-danger  mr-2" type="submit">@livewire('component.dropout-client-component', ['client_id' => $client_id]) </a>--}}
                    {{--<div class="row justify-content-center pt-2">--}}
                        {{--<div class="col-md-3">--}}
                            {{--<a  class="btn btn-info btn-block">--}}
                                {{--@livewire('component.dropout-client-component', ['client_id' => $client_id])--}}
                            {{--</a>--}}
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
</div>

@push('scripts')
    <script>
        // window.addEventListener("dropout-response", event => {
        //     bootbox.alert(event.detail.message);
        // })
    </script>
@endpush