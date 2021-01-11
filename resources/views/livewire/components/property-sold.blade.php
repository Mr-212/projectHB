
<div class="">
   {{--<a onclick="openModal({{$property_id}})" class="btn btn-primary">Sold</a>--}}
    {{--<a href="#property-modal-{{$property_id}}" data-toggle="modal" data-target="#property-modal-{{$property_id}}">Sold</a>--}}
    <a href="#property-modal-{{$property_id}}" data-toggle="modal" data-target="#property-modal-{{$property_id}}" class="btn btn-primary">Sold</a>

    <div  wire:ignore.self class="modal fade" tabindex="-1" role="dialog" id="property-modal-{{$property_id}}" >
        <div  class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Price and Date</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <span class="col-md-12 col-lg-12">

                        </span>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            @error('property.sold_price') <span class="error alert-danger">{{ $message }}</span> @enderror

                        </div>
                        <div class="col-md-12 col-lg-12">
                            <label>Sell Price</label>
                            <input class="form-control" id="sold_price" type="number" wire:model="property.sold_price" >
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-12 col-lg-12">
                            @error('property.sold_date')
                                 <span class="error alert-danger">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="col-md-12 col-lg-12">
                            <label>Sell Date</label>
                            <input class="form-control" id="sold_date" type="date" wire:model="property.sold_date" >
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="property-update" wire:click.prevent="property_sold">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script type="text/javascript">

        {{--$('#property-modal-{{$property_id}}').on('hidden.bs.modal',function () {--}}
            {{--$('#sold_date').val('');--}}
            {{--$('#sold_price').val('');--}}
        {{--});--}}

        window.addEventListener('property-sold-{{$property_id}}', event => {
           //console.log(event.detail.message);
           if(!event.detail.error){
               $('#property-modal-{{$property_id}}').modal('hide')
           }
        });
        // $(document).ready(function () {
        //     $('#property-update').on('click',function () {
        //         // @this.set('property.sold_price',$('#sold_price').val());
        //         // @this.set('property.sold_date',$('#sold_date').val());
        //         Livewire.emit('property_sold');
        //
        //     })
        // })

        function openModal(property_id) {
            $("#property-modal-"+property_id).modal('show');
        }
    </script>
@endpush