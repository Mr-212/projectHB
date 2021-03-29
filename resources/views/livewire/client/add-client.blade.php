<div>
    <div class="row">
        @include('livewire.client.item-checklist.client')
    </div>

    <div class="col-md-12 border-bottom pt-4">
    </div>

    <div class="col-md-12 pt-4">
        <div class="float-right">
            @if($type == 'edit')
            <a  class="btn btn-success text-white mr-2" type="submit" onclick="return updateclient()">update</a>
            <a  href="{{route('attach_property', ['client_id' => $client_id, 'new_property' => 'new property'])}}" class="btn btn-primary text-white mr-2">Add Property</a>
            @else
            <a  class="btn btn-warning mr-2" type="submit" onclick="return addclient()">Add</a>
            @endif
            {{--<a  class="btn btn-danger  mr-2" type="submit" href="{{url('/house/cancelled')}}">Cancel Purchase</a>--}}
            {{--<a  class="btn btn-danger  mr-2" type="submit" href="{{url('/house/dropouts')}}">Cancel Client</a>--}}
            {{--<a  class="btn btn-info" type="submit" onclick="return book_house()" disabled>Book House</a>--}}

        </div>


    </div>
</div>


@push('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
            $('#due_diligence_option').select2({
                placeholder: '{{__('Select your option')}}',
                allowClear: true
            });
            triggerPaymentOptions();


        });

        document.addEventListener("livewire:load", () => {

            Livewire.hook('component.initialized', (el, component) => {
                 //alert('here');
                //$('.select2').select2();
            })

            Livewire.hook('message.processed', (message, component) => {
               // alert('here');
                //$('.select2').select2();
            });
            Livewire.hook('element.updated', (el, component) => {
                //alert('here');
            })
        });
    </script>


    <script type="text/javascript">

        $(document).find('#deal_option_checkbox').click(function () {
            if($(this).is(':checked'))
                $('.select_deal_option_div').removeClass('d-none')
            else
                $('.select_deal_option_div').addClass('d-none')
        });

        $(document).find('#select_deal_option_checkbox').click(function (_this) {
            if($(this).is(':checked')) {
                $('.deal_option_value_div').removeClass('d-none')
            }else{
                $('.deal_option_value_div').addClass('d-none')
            }
        });
        $(document).find('#item_checklist_option_list').change(function (_this) {
            if($(this).val() !== "") {
                $('.item_checklist_option_list_value_div').removeClass('d-none')
            }else{
                $('.item_checklist_option_list_value_div').addClass('d-none')
            }
        });

        function hideShow(val,div) {
            // console.log(val);
            if(val == true)
                $(div).removeClass('d-none');
            if(val == 1)
                $(div).removeClass('d-none');
            else
                $(div).addClass('d-none');
        }

        function selectChange(_this) {
           var val = $(_this).val();
           @this.payment_option(val);

        }

        function triggerPaymentOptions() {
            var values = [];
            $('.due_diligence_option_list_value_div').each(function (j,i) {
                 values.push($(i).attr('id'));
            });
            $('#due_diligence_option').val(values).trigger('change');
            // $('#due_diligence_option').val()
        }

        function addclient() {
            bootbox.confirm({
                message: 'Confirm Y/N',
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
        //update client
        function updateclient() {
            bootbox.confirm({
                message: 'Confirm Y/N',
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
                        @this.updateClient();
                    }
                }
            });


        }

        function book_house() {
            bootbox.confirm({
                message: 'Confirm Y/N',
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
                    }
                }
            });
        }


    </script>
@endpush
