<div class="row pl-2 item_checklist_due_diligence_div">
    <div class="col-md-12 col-lg-12 bg-info">
        <h4 class="text-white pt-2">Due Diligence Checklist </h4>
    </div>

    <div class="col-md-6 col-lg-6 pt-2">
        @error('client.on_boarding_fee_payment_check') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>On Board Fee Payment</label>
            <input  class="" type="checkbox" name="rent" wire:model="client.on_boarding_fee_payment_check" />
        </div>
    </div>
    <div class="col-md-6 col-lg-6 pt-2">
        @error('client.letter_of_commitment_signed') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Letter of Commitment</label>
            <input  class="" type="checkbox" name="rent" wire:model="client.letter_of_commitment_signed" />
        </div>
    </div>
    <div class="col-md-6 col-lg-6 pt-2">
        @error('client.due_diligence_rent') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Rent</label>
            $<input  class="form-control" type="number" name="rent" wire:model="client.due_diligence_rent" />
        </div>
    </div>
    <div class="col-md-6 col-lg-6 mt-2">
        @error('client.due_diligence_option_payment_date') <span class="error alert-danger">{{ $message }}</span> @enderror

        <div class="">
            <label>Option Payment Date</label>
            <input  class="form-control" type="date" name="item_checklist_option_payment_date" value="" wire:model="client.due_diligence_option_payment_date" />
        </div>
    </div>

    <div class="col-md-12 col-lg-12 mt-2">
        <div class="row">
            <div class="col-md-6">
                <label>Option?</label>
                <select class="form-control" name="item_checklist_lender" id="item_checklist_option" onchange="hideShow(this.value,'.item_checklist_option_list_div')" wire:model="client.due_diligence_option_payment_check">
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            {{--@if($client->due_diligence_option_payment_check)--}}
            <div class="col-md-6 col-lg-6 item_checklist_option_list_div" wire:ignore>
                <label>Option?</label>
                <select class="form-control" name="item_checklist_option_list" id="due_diligence_option" multiple="multiple" onchange="selectChange(this)">
                    {{--<select class="select3 form-control" name="item_checklist_option_list" id="due_diligence_option" multiple="multiple" wire:click="payment_option">--}}
                    <option value="">Select Option</option>
                    @foreach(PaymentOptionDropdown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="row">
            @if($client->due_diligence_option_payment_3_month)
                <div class="col-md-4 col-lg-4 due_diligence_option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_3_MONTH}}">
                    <label>3 Month Payment Option</label>
                    <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="client.due_diligence_option_payment_3_month" readonly="readonly">
                </div>
            @endif
            @if($client->due_diligence_option_payment_6_month)
                <div class="col-md-4 col-lg-4 due_diligence_option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_6_MONTH}}">
                    <label>6 Month Payment Option</label>
                    <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="client.due_diligence_option_payment_6_month" readonly="readonly">
                </div>
            @endif
            @if($client->due_diligence_option_payment_12_month)
                <div class="col-md-4 col-lg-4 due_diligence_option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_12_MONTH}}">
                    <label>12 Month Payment Option</label>
                    <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="client.due_diligence_option_payment_12_month" readonly="readonly">
                </div>
            @endif
        </div>

        {{--@endif--}}


    </div>



    <div class="col-md-12 col-lg-12 no-gutters mb-2">
        <div class="row">
            @error('client.due_diligence_inspection_check') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="col-md-6 col-lg-6">
                <div>
                    <label>Inspection Date?</label>
                    <input  class="" type="checkbox" name="item_checklist_inspection_checkbox" onclick="hideShow(this.checked,'.item_checklist_option_list_inspection_date_div')" wire:model="client.due_diligence_inspection_check" wire:click="setCheckListValueAndDate('due_diligence_inspection_check','')" >
                </div>
            </div>
        </div>
        <div class="row">
            @error('client.due_diligence_inspection_check_date') <span class="error alert-danger">{{ $message }}</span> @enderror
            <div class="col-md-6 col-lg-6 item_checklist_option_list_inspection_date_div {{$client->due_diligence_inspection_check ?'':'d-none'}}" wire:ignore>
                <label>Date</label>
                <input  class="form-control" type="date" name="item_checklist_option_list_inspection_date" value="" wire:model="client.due_diligence_inspection_check_date">
            </div>
        </div>
    </div>

</div>