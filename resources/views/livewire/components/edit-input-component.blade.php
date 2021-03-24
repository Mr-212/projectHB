
<div class="row">
    <input  class="form-control-sm" type="{{$input_type}}" value="{{$value}}"  id="input-{{$property_id}}" data-toggle="tooltip" title="{{$value}}">

</div>

@push('scripts')
    <script type="text/javascript">


        window.addEventListener('input-{{$wire_id}}', event => {
            bootbox.alert(event.detail.message)
        });


        $(document).ready(function () {

            $('#input-{{$property_id}}').keypress(function (e) {
                var value = $(this).val();
                if (e.which == 13) {
                    e.preventDefault();
                bootbox.confirm({
                    message: 'Are you sure you want to change value ?',
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
                            @this.set('value',value);
                            @this.save();
                        }
                    }
                });
              }
            });


        });

    </script>
@endpush