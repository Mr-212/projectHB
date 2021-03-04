<div class="col-md-12 col-lg-12">


    <div>

    <div class="row">
        <div class="col-md-12 col-lg-6 pt-2">
            @error('pre_closing.letter_of_commitment_checked') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <input  class="" type="checkbox" name="rent" wire:model="pre_closing.letter_of_commitment_checked" wire:click="markChecklist('pre_closing','letter_of_commitment_checked')"/>
                <label>Letter of Commitment</label>
                {{--<input  class="" type="checkbox" name="rent" wire:model="pre_closing.letter_of_commitment_signed_checked" onchange="hideShow(this.value,'.payment_options_div')"/>--}}
            </div>
        </div>
    </div>
        @if(isset($pre_closing->letter_of_commitment_checked) && $pre_closing->letter_of_commitment_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    pre_closing.letter_of_commitment_checked_at
                </x-slot>

                <x-slot name="comment">
                    pre_closing.letter_of_commitment_checked_comment
                </x-slot>
            </x-checkedt-at-comment>
        @endif
    </div>







    {{--@if($client->letter_of_commitment_signed_checked)--}}
    <div class="payment_options_div">
        <div class="row">
            <div class="col-md-6 col-lg-6 pt-2">
                @error('pre_closing.rent') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="">
                    <label>Rent</label>
                    $<input  class="form-control" type="number" name="rent" wire:model="pre_closing.rent" />
                </div>
            </div>

            <div class="col-md-6 col-lg-6 mt-2">
                @error('pre_closing.payment_option_date') <span class="error alert-danger">{{ $message }}</span> @enderror

                <div class="">
                    <label>Option Payment Date</label>
                    <input  class="form-control" type="date" name="item_checklist_option_payment_date" value="" wire:model="pre_closing.payment_option_date" />
                </div>
            </div>
        </div>
        {{--<div class="row">--}}
           {{----}}
        {{--</div>--}}



        <div class="row">
                <div class="col-md-6">
                    <label>Option?</label>
                    <select class="form-control" name="item_checklist_lender" id="item_checklist_option" onchange="hideShow(this.value,'.item_checklist_option_list_div')" wire:model="pre_closing.payment_option_select_checked">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                @if($pre_closing->payment_option_select_checked)
                <div class="col-md-6 col-lg-6 item_checklist_option_list_div" wire:ignore>
                    <label>Option?</label>
                    <select class="form-control" name="item_checklist_option_list" id="payment_options" multiple="multiple" onchange="selectChange(this)">
                        <option value="">Select Option</option>
                        @foreach(PaymentOptionDropdown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach

                    </select>
                </div>
                @endif
        </div>
        <div class="row">
                @if($pre_closing->payment_option_3_month)
                    <div class="col-md-4 col-lg-4 option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_3_MONTH}}">
                        <label>3 Month Payment Option</label>
                        <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="pre_closing.payment_option_3_month" {{auth()->user()->hasRole('Admin')?:'readonly'}}>
                    </div>
                @endif
                @if($pre_closing->payment_option_6_month)
                    <div class="col-md-4 col-lg-4 option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_6_MONTH}}">
                        <label>6 Month Payment Option</label>
                        {{--<input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="pre_closing.payment_option_6_month" readonly="readonly">--}}
                        <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="pre_closing.payment_option_6_month" {{auth()->user()->hasRole('Admin')?:'readonly'}}>
                    </div>
                @endif
                @if($pre_closing->payment_option_12_month)
                    <div class="col-md-4 col-lg-4 option_list_value_div " id="{{\App\Constants\Dropdowns\PaymentOptionDropdown::PAYMENT_OPTION_12_MONTH}}">
                        <label>12 Month Payment Option</label>
                        {{--<input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="pre_closing.payment_option_12_month" readonly="readonly">--}}
                        <input  class="form-control" type="number" name="item_checklist_option_list_value" value="" wire:model="pre_closing.payment_option_12_month" {{auth()->user()->hasRole('Admin')?:'readonly'}}>
                    </div>
                @endif
         </div>
        <div class="row">
            @if(isset($this->pre_closing->total_payment_options) && !empty($this->pre_closing->total_payment_options))
                <div class="col-md-6 col-lg-6">
                    <div class="">
                        <label>Total Payment Options</label>
                        <input  class="form-control" type="number" name="total_payment_options" value="" wire:model="pre_closing.total_payment_options" disabled="true">

                    </div>
                </div>
            @endif
        </div>


    </div>
    <div class="row">



    <div class="col-md-12 col-lg-12 pt-2">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                @error('pre_closing.monthly_payment_option_checked') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="">
                    <input type="checkbox"  class="" name="" wire:model="pre_closing.monthly_payment_option_checked"  wire:click="markChecklist('pre_closing','monthly_payment_option_checked')">
                    <label>Monthly Payment Option</label>

                </div>
            </div>
        </div>

        @if($pre_closing->monthly_payment_option_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    pre_closing.monthly_payment_option_checked_at
                </x-slot>

                <x-slot name="comment">
                    pre_closing.monthly_payment_option_checked_comment
                </x-slot>
            </x-checkedt-at-comment>

            <div class="row">
                <div class="col-md-6">
                    <label>Amount</label>
                    <input type="text"  class="form-control" name="" wire:model="pre_closing.monthly_payment_option_checked_amount"  >

                </div>
            </div>
        @endif

    </div>
    </div>
    {{--@endif--}}

</div>




