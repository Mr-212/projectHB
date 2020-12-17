<div class="">
    <div class="row pl-2">
        <div class="col-md-12">
            <h3 class="text-black-50">{{$title}}</h3>
        </div>
    </div>
    {{--<div>--}}
        {{--@foreach ($errors->all() as $error)--}}
            {{--<li class="validation_error">{{ $error }}</li>--}}
        {{--@endforeach--}}
    {{--</div>--}}
    {{--<form wire:submit.prevent="book_house">--}}

    @include('livewire.client.item-checklist-child.client')
    @include('livewire.client.item-checklist-child.property')
    @include('livewire.client.item-checklist-child.due-diligence')
    @include('livewire.client.item-checklist-child.pre-closing')


    <div class="col-md-12 border-bottom pt-4">
    </div>
    @include('livewire.client.item-checklist-child.footer-buttons')

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
    </script>

@endpush
