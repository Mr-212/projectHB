<div class="row p-2 item_checklist_deal_info_div">
    <div class="col-md-12 col-lg-12 bg-info">
        <h4 class="text-white pt-2">Client Info</h4>

    </div>

    <div class="col-md-6 col-lg-6 pt-4">
        @error('client.applicant_name') <span class="error alert-danger">{{ $message }}</span> @enderror
        <div class="">
            <label>Deal Name:</label>
            <input type="text" class="form-control" wire:model="client.applicant_name">
        </div>

    </div>
    <div class="col-md-6 col-lg-6 pt-4">
        @error('client.partner_name') <span class="error alert-danger">{{ $message }}</span> @enderror
        <div class="">
            <label>Partner Name:</label>
            <input type="text" class="form-control"  wire:model="client.partner_name">
        </div>

    </div>
    <div class="col-md-6 col-lg-6">
        @error('client.applicant_phone') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Applicant Phone:(special characters not allowed)</label>
            <input type="text" class="form-control"  wire:model="client.applicant_phone">
        </div>

    </div>
    <div class="col-md-6 col-lg-6">
        @error('client.partner_phone') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Partner Phone:(special characters not allowed)</label>
            <input type="text" class="form-control"  wire:model="client.partner_phone">
        </div>

    </div>
    <div class="col-md-6 col-lg-6">
        @error('client.applicant_email') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Applicant Email:</label>
            <input type="text" class="form-control"  wire:model="client.applicant_email">
        </div>

    </div>
    <div class="col-md-6 col-lg-6">
        @error('client.partner_email') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Partner Email:</label>
            <input type="text" class="form-control"  wire:model="client.partner_email">
        </div>

    </div>
    <div class="col-md-6 col-lg-6">
        @error('client.co_applicant_name') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Co-Applicant Name:</label>
            <input type="text" class="form-control"  wire:model="client.co_applicant_name">
        </div>

    </div>
    <div class="col-md-6 col-lg-6">
        @error('client.co_applicant_phone') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Co-Applicant Phone:(special characters not allowed)</label>
            <input type="text" class="form-control"  wire:model="client.co_applicant_phone">
        </div>

    </div>
    <div class="col-md-6 col-lg-6">
        @error('client.co_applicant_email') <span class="error alert-danger">{{ $message }}</span> @enderror
        <div class="">
            <label>Co-Applicant Email:</label>
            <input type="text" class="form-control"  wire:model="client.co_applicant_email">
        </div>

    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row" >


            <div class="col-md-6 col-lg-6">
                {{--@error('deal.data.additional_tenant_name') <span class="error">{{ $message }}</span> @enderror--}}
                <label>Additional Tenants ?</label>
                <select class="form-control" name="deal_additional_tenants" id="deal_additional_tenants"  wire:model="client.additional_tenant_check" value="{{$client->additional_tenant_check}}"  onclick="hideShow(this.value,'.deal_additional_tenant_div')" wire:ignore>
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}" {{$key == $client->additional_tenant_check ? 'selected':''}}>{{$val}}</option>
                    @endforeach

                </select>
            </div>

            <div class="col-md-6 col-lg-6 deal_additional_tenant_div {{$client->additional_tenant_check ? '':'d-none'}}" wire:ignore >
                @error('client.additional_tenant_name') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="">
                    <label>Name</label>
                    <input class="form-control" type="text" name="client_additional_tenant_name" value="{{$client->additional_tenant_name}}" wire:model="client.additional_tenant_name">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">

        <div class="">
            <input type="checkbox"  value="" wire:model="client.welcome_down_payment_complete_check" wire:click="setCheckListValueAndDate('welcome_down_payment_complete_check','')" >
            <label>$500 Welcome Payment ?</label>

            @if(!$client->welcome_down_payment_complete_check)
                <select class="form-control" name="deal_welcome_bonus" wire:model="client.welcome_down_payment" wire:ignore>
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-lg-6">
        {{--@error('client.mortgage_type') <span class="error alert-danger">{{ $message }}</span> @enderror--}}
        <div class="">
            <label>Mortgage Type ?</label>
            <select class="form-control" name="deal_mortgage_type" wire:model="client.mortgage_type_id" wire:ignore>
                <option value="0">Select</option>
                @foreach(MortgageTypeDropdown::getList() as $key => $val)
                    <option value="{{$key}}" >{{$val}}</option>
                @endforeach
            </select>
        </div>

    </div>
    <div class="col-md-6 col-lg-6" >
        {{--@error('client.rental_verification_check') <span class="error alert-danger">{{ $message }}</span> @enderror--}}

        <div class="">
            <input type="checkbox"  value="" wire:model="client.rental_verification_complete_check" wire:click="setCheckListValueAndDate('rental_verification_complete_check','')" />
            <label>Rental Verification</label>
            @if(!$client->rental_verification_complete_check)
                <select class="form-control" name="deal_save" wire:model="client.rental_verification_check" wire:ignore>
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}" {{$key == $client->rental_verification_check ? 'selected':''}}>{{$val}}</option>
                    @endforeach
                </select>
            @endif
        </div>

    </div>
    {{--<div class="col-md-6 col-lg-6">--}}
    {{--<div class="d-inline">--}}
    {{--<label>Deal Save?</label>--}}
    {{--<select class="form-control" name="deal_save" >--}}
    {{--@foreach(YesNoDropDown::getList() as $key => $val)--}}
    {{--<option value="{{$key}}">{{$val}}</option>--}}
    {{--@endforeach--}}
    {{--</select>--}}
    {{--</div>--}}

    {{--</div>--}}
</div>