<div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
                {{--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>--}}
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 overflow-auto">
            <table class="table table-hover ">
                <thead>
                <tr>
                    <th></th>
                    <th class="w-8">Item Checked AT</th>
                    <th>Deal Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Co-applicant</th>
                    <th>Co-app phone</th>
                    <th>Co-app email</th>
                    <th>Partner name</th>
                    <th>Partner phone</th>
                    <th>Partner email</th>
                    <th>Mortgage Type</th>
                    <th>Assignee</th>
                    <th>Comment</th>
                </tr>
                </thead>
                <tbody wire:ignore>
                @if($clients)
                    @foreach($clients as $client)
                    <tr>
                        <th></th>
                        <td><input type="checkbox" name="1" value="{{$client->id}}"/>&nbsp;</td>
                        <th class="w-8">Item Checked AT</th>
                        <th>{{$client->applicant_name}}</th>
                        <th>{{$client->applicant_phone}}</th>
                        <th>{{$client->applicant_email}}</th>
                        <th>{{$client->co_applicant_name}}</th>
                        <th>{{$client->co_applicant_phone}}</th>
                        <th>{{$client->co_applicant_email}}</th>
                        <th>{{$client->partner_name}}</th>
                        <th>{{$client->partner_phone}}</th>
                        <th>{{$client->partner_email}}</th>
                        <th>{{$client->mortgage_type}}</th>
                        <th>Assignee</th>
                        <th>Comment</th>
                    </tr>
                @endforeach
                @endif
                {{--<tr>--}}
                    {{--{{dd(\Auth::user()->currentTeam)}}--}}
                    {{--@if (\Auth::user()->hasTeamPermission(\Auth::user()->currentTeam, 'write'))--}}
                    {{--<td><input type="checkbox" name="1" value="1"/>&nbsp;</td>--}}
                    {{--@endif--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    {{--<td>Deal1</td>--}}
                    {{--<td>112030444745</td>--}}
                    {{--<td>john@example.com</td>--}}
                    {{--<td>Arax</td>--}}
                    {{--<td>arax@example.com</td>--}}
                    {{--<td>Patner1</td>--}}
                    {{--<td>3658587496</td>--}}
                    {{--<td>partner1@example.com</td>--}}
                    {{--<td>partner1@example.com</td>--}}
                    {{--<td>FHA</td>--}}
                    {{--<td><a class="btn btn-info btn-md">Assignee1</a></td>--}}
                    {{--<td>--}}
                        {{--<textarea class="" value="{{$add_comment}}" ></textarea>--}}
                    {{--</td>--}}
                {{--</tr>--}}

                {{--<tr>--}}
                    {{--<td><input type="checkbox" name="name1" value="2" />&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    {{--<td>Deal2</td>--}}
                    {{--<td>212030127745</td>--}}
                    {{--<td>allan@example.com</td>--}}
                    {{--<td>john</td>--}}
                    {{--<td>john@example.com</td>--}}
                    {{--<td>Patner2</td>--}}
                    {{--<td>3658587496</td>--}}
                    {{--<td>partner2@example.com</td>--}}
                    {{--<td>partner2@example.com</td>--}}
                    {{--<td>VA</td>--}}
                    {{--<td><a class="btn btn-info btn-md">Assignee2</a></td>--}}
                    {{--<td>--}}
                        {{--<textarea class="" value="{{$add_comment}}" ></textarea>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td><input type="checkbox" name="name1" value="3"/>&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    {{--<td>Deal3</td>--}}
                    {{--<td>312030127745</td>--}}
                    {{--<td>allan@example.com</td>--}}
                    {{--<td>john</td>--}}
                    {{--<td>john@example.com</td>--}}
                    {{--<td>Patner3</td>--}}
                    {{--<td>3658587496</td>--}}
                    {{--<td>partner3@example.com</td>--}}
                    {{--<td>partner3@example.com</td>--}}
                    {{--<td>VA</td>--}}
                    {{--<td><a class="btn btn-info btn-md">Assignee3</a></td>--}}
                    {{--<td>--}}
                        {{--<textarea class="" value="{{$add_comment}}" ></textarea>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td><input type="checkbox" name="name1" />&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    {{--<td>Deal4</td>--}}
                    {{--<td>412030127745</td>--}}
                    {{--<td>allan@example.com</td>--}}
                    {{--<td>john</td>--}}
                    {{--<td>john@example.com</td>--}}
                    {{--<td>Patner4</td>--}}
                    {{--<td>3658587496</td>--}}
                    {{--<td>partner4@example.com</td>--}}
                    {{--<td>partner4@example.com</td>--}}
                    {{--<td>VA</td>--}}
                    {{--<td><a class="btn btn-info btn-md">Assignee4</a></td>--}}
                    {{--<td>--}}
                        {{--<textarea class="" value="{{$add_comment}}"  ></textarea>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td><input type="checkbox" name="name1" />&nbsp;</td>--}}
                    {{--<td id="item_checked_at" wire:model="item_checked_at"></td>--}}
                    {{--<td>Deal5</td>--}}
                    {{--<td>512030127745</td>--}}
                    {{--<td>allan@example.com</td>--}}
                    {{--<td>john</td>--}}
                    {{--<td>john@example.com</td>--}}
                    {{--<td>Patner5</td>--}}
                    {{--<td>3658587496</td>--}}
                    {{--<td>partner5@example.com</td>--}}
                    {{--<td>partner5@example.com</td>--}}
                    {{--<td>VA</td>--}}
                    {{--<td><a class="btn btn-info btn-md">Assignee5</a></td>--}}
                    {{--<td>--}}
                        {{--<textarea class="" value="{{$add_comment}}"  ></textarea>--}}
                    {{--</td>--}}
                {{--</tr>--}}


                </tbody>
            </table>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        $(document).find('input:checkbox').click(function () {
            if($(this).is(':checked')) {
                var now = new Date();
                var dateString = now.toLocaleTimeString()+ ' '+ now.toLocaleDateString();
                $(this).parent().siblings('#item_checked_at').text(dateString);
                window.location.href = '/items/checklist/'+$(this).val();

            }
            else
                $(this).parent().siblings('#item_checked_at').val('').text('');

        })

    </script>
@endpush
