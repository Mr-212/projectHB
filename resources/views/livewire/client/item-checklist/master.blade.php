<div class="" >
    <div class="row pl-2">
        <div class="col-md-12">
            <h3 class="text-black-50">{{$title}}</h3>
        </div>
    </div>
    <div>
        @if ($errors->any())



            {{--<script wire:ignore>--}}
                {{--// $('#validation-errors-modal').modal('show');--}}
            {{--</script>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<div class="alert alert-danger alert-dismissible" role="alert">--}}
                    {{--<strong>{{$error}}</strong>--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}

           {{--@endforeach--}}
        @endif
    </div>


    @include('livewire.client.item-checklist.client')
    @if($client_id || $property_id)
    @include('livewire.client.item-checklist.property1')
    @include('livewire.client.item-checklist.pre-closing.master')
    @endif

    <div class="col-md-12 border-bottom pt-4">
    </div>
    @include('livewire.client.item-checklist.footer-buttons')

    {{--@if ($errors->any())--}}
    <div wire:ignore.self class="modal" tabindex="-1" role="dialog" id="validation-errors-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @foreach ($errors->all() as $error)
                        <div class="error-div">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <strong>{{$error}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
        {{--@endif--}}
</div>



@push('scripts')
    <script>
        document.addEventListener("livewire:load", () => {

            Livewire.hook('component.initialized', (el, component) => {

            });

            Livewire.hook('message.processed', (message, component) => {
                $('#payment_options').select2({
                    placeholder: '{{__('Select your option')}}',
                    allowClear: true
                });
                    // $('#validation-errors-modal').modal('show');
            });


            Livewire.hook('element.updated', (el, component) => {

                {{--@if($errors->any())--}}
               // $('#validation-errors-modal').modal('show');
                {{--@endif--}}
            })
        });

        window.addEventListener("validation-errors", event => {
            // bootbox.alert(event.detail.errors);
            // $('#validation-errors-modal').modal('show');

        });

        window.addEventListener("update-saved", event => {
             bootbox.alert(event.detail.message);

        });

    </script>

    <script type="text/javascript">

        $(document).ready(function() {
            $('#payment_options').select2({
                placeholder: '{{__('Select your option')}}',
                allowClear: true
            });
            triggerPaymentOptions();


            // $('#validation-errors-modal').on('hidden.bs.modal',function () {
            //     $(this).find('.modal-body .error-div').html('');
            // })

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
            // alert(_this)
            var val = $(_this).val();
            console.log(val);
        @this.payment_option(val);

        }

        function triggerPaymentOptions() {
            var values = [];
            $('.option_list_value_div').each(function (j,i) {
                values.push($(i).attr('id'));
            });
            $('#payment_options').val(values).trigger('change');
            // $('#due_diligence_option').val()
        }

    </script>

@endpush
