<div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-info" href="{{url('items/client/add')}}">Add Client</a>
                    </div>

                </div>
            </div>


        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        </div>
    </div>


    <!-- Content Row -->
    {{--<div class="row">--}}
        @if($item_type == 'before_dd')
            <livewire:client.tables.outstanding-items-before-due-diligence-table />
        @else
            <livewire:client.tables.outstanding-items-before-expire-table params="" />
        @endif
</div>

@push('scripts')
    <script>
        $(document).find('input:checkbox').click(function () {
            if($(this).is(':checked')) {
                var now = new Date();
                var dateString = now.toLocaleTimeString()+ ' '+ now.toLocaleDateString();
                $(this).parent().siblings('#item_checked_at').text(dateString);
                //window.location.href = '/items/checklist/'+$(this).val();

            }
            else
                $(this).parent().siblings('#item_checked_at').val('').text('');

        })

    </script>
@endpush
