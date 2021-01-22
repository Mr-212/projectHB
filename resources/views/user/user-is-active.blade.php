

<div>
    <input type="checkbox" {{$is_active? 'checked':''}} id="is-active-{{$id}}">
</div>

@push('scripts')
    <script>
        $("#is-active-{{$id}}").on('click',function () {

            if($(this).is(':checked')){
                @this.is_active('{{$id}}',1);

            }else{
            @this.is_active('{{$id}}',0);
            }

        });

    </script>

@endpush
