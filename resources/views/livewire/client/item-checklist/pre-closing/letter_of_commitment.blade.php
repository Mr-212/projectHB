<div class="col-md-12 col-lg-12">

    <div class="row">
        <div class="col-md-12 col-lg-6 pt-2">
            @error('client.letter_of_commitment_checked') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Letter of Commitment</label>
                {{--<input  class="" type="checkbox" name="rent" wire:model="client.letter_of_commitment_signed_checked" onchange="hideShow(this.value,'.payment_options_div')"/>--}}
                <input  class="" type="checkbox" name="rent" wire:model="client.letter_of_commitment_checked"/>
            </div>
        </div>


    </div>

    {{--@if($client->letter_of_commitment_signed_checked)--}}
    <div class="payment_options_div">
        <div class="row">
            <div class="col-md-6 col-lg-6 pt-2">
                @error('client.rent') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="">
                    <label>Rent</label>
                    $<input  class="form-control" type="number" name="rent" wire:model="client.rent" />
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-md-6">
                    <label>Option?</label>
                    <select class="form-control" name="item_checklist_lender" id="item_checklist_option" onchange="hideShow(this.value,'.item_checklist_option_list_div')">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                {{--@if($client->option_payment_check)--}}
                <div class="col-md-6 col-lg-6 item_checklist_option_list_div" wire:ignore>
                    <label>Option?</label>
                    <select class="form-control" name="item_checklist_option_list" id="payment_options" multiple="multiple" onchange="selectChange(this)">
                        <option value="">Select Option</option>
                        @foreach(PaymentOptionDropdown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach

                    </select>
                </div>
        </div>
        <div class="row">
                @if($client->payment_option_3_month)
                    <div class="col-md-4 col-lg-4 option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_3_MONTH}}">
                        <label>3 Month Payment Option</label>
                        <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="client.payment_option_3_month" readonly="readonly">
                    </div>
                @endif
                @if($client->payment_option_6_month)
                    <div class="col-md-4 col-lg-4 option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_6_MONTH}}">
                        <label>6 Month Payment Option</label>
                        <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="client.payment_option_6_month" readonly="readonly">
                    </div>
                @endif
                @if($client->payment_option_12_month)
                    <div class="col-md-4 col-lg-4 option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_12_MONTH}}">
                        <label>12 Month Payment Option</label>
                        <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="client.payment_option_12_month" readonly="readonly">
                    </div>
                @endif
         </div>

    </div>
    {{--@endif--}}



</div>




