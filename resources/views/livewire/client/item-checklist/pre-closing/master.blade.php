<div class="row pl-2 item_checklist_pre_closing">
    <div class="col-md-12 col-lg-12 bg-info">
        <h4 class="text-white pt-2">Pre Closing Checklist </h4>
    </div>



@include('livewire.client.item-checklist.pre-closing.letter_of_commitment')

    <div class="col-md-12 col-lg-12 pt-2">
        <div class="col-md-6 col-lg-6">
            <div class="row">
                @error('client_pre_closing.on_boarding_fee_payment_checked') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="">
                    <input  class="" type="checkbox" name="rent" wire:model="client_pre_closing.on_boarding_fee_payment_checked" wire:click="markChecklist('client_pre_closing','on_boarding_fee_payment_checked')" />
                    <label>On Board Fee Payment</label>
                </div>
            </div>
        </div>


        @if(isset($client_pre_closing->on_boarding_fee_payment_checked) && $client_pre_closing->on_boarding_fee_payment_checked)

                <x-checkedt-at-comment>
                    <x-slot name="checked">
                        client_pre_closing.on_boarding_fee_payment_checked_at
                    </x-slot>

                    <x-slot name="comment">
                        client_pre_closing.on_boarding_fee_payment_checked_comment
                    </x-slot>
                </x-checkedt-at-comment>
        @endif
    </div>








    <div class="col-md-12 col-lg-12 no-gutters mb-2">
        <div class="row">
            @error('client_pre_closing.inspection_checked') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="col-md-6 col-lg-6">
                <div>
                    <input  class="" type="checkbox" name="item_checklist_inspection_checkbox" onclick="hideShow(this.checked,'.item_checklist_option_list_inspection_date_div')" wire:model="client_pre_closing.inspection_checked" wire:click="markChecklist('client_pre_closing','inspection_checked')" >
                    <label>Inspection?</label>
                </div>
            </div>
        </div>


            @if(isset($client_pre_closing->inspection_checked) && $client_pre_closing->inspection_checked)
                <x-checkedt-at-comment>
                    <x-slot name="checked">
                        client_pre_closing.inspection_checked_at
                    </x-slot>

                    <x-slot name="comment">
                        client_pre_closing.inspection_checked_comment
                    </x-slot>
                </x-checkedt-at-comment>

            @endif

        {{--<div class="row">--}}
        {{--@error('client_pre_closing.inspection_check_date') <span class="error alert-danger">{{ $message }}</span> @enderror--}}
        {{--<div class="col-md-6 col-lg-6 item_checklist_option_list_inspection_date_div {{$client->inspection_check ?'':'d-none'}}" wire:ignore>--}}
        {{--<label>Date</label>--}}
        {{--<input  class="form-control" type="date" name="item_checklist_option_list_inspection_date" value="" wire:model="client_pre_closing.inspection_check_date">--}}
        {{--</div>--}}
        {{--</div>--}}
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_termite_checkbox" value="" wire:model="client_pre_closing.termite_checked"  wire:click="markChecklist('client_pre_closing','termite_checked')">
                <label>Termite ?</label>
            </div>
        </div>


            @if($client_pre_closing->termite_checked)
                <x-checkedt-at-comment>
                    <x-slot name="checked">
                        client_pre_closing.termite_checked_at
                    </x-slot>

                    <x-slot name="comment">
                        client_pre_closing.termite_checked_comment
                    </x-slot>
                </x-checkedt-at-comment>

            @endif
        {{--@if(!$client->termite_checked)--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6 col-lg-6 item_checklist_termite_paid_by_div">--}}
                    {{--<div class="">--}}
                        {{--<label>Paid BY</label>--}}
                        {{--<select class="form-control" name="item_checklist_termite_paid_by" id="item_checklist_termite_paid_by" wire:model="client_pre_closing.termite_paid_by">--}}
                            {{--<option value="0">Seller</option>--}}
                            {{--<option value="1">Dream</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    </div>


    <div class="col-md-12 col-lg-12 mt-2">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                @error('client_pre_closing.appraisal_value_checked') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div>
                    <input  class="" type="checkbox" name="item_checklist_appraisal_value_checkbox" value=""  wire:model="client_pre_closing.appraisal_value_checked" wire:click="markChecklist('client_pre_closing','appraisal_value_checked')">
                    <label>Appraisal Value?</label>
                </div>
            </div>
        </div>
        @if($client_pre_closing->appraisal_value_checked)

            {{--<div class="row">--}}
                @if($client_pre_closing->appraisal_value_checked)
                    <x-checkedt-at-comment>
                        <x-slot name="checked">
                            client_pre_closing.appraisal_value_checked_at
                        </x-slot>

                        <x-slot name="comment">
                            client_pre_closing.appraisal_value_checked_comment
                        </x-slot>
                    </x-checkedt-at-comment>
                @endif
            {{--</div>--}}

            <div class="row">
                <div class=" col-md-6 col-lg-6 item_checklist_appraisal_value_div">
                    @error('client_pre_closing.appraisal_value') <span class="error alert-danger">{{ $message }}</span> @enderror
                    <div class="">
                        <label>Value</label>
                        <input  class="form-control" type="number" name="item_checklist_appraisal_value" value="" wire:model="client_pre_closing.appraisal_value">
                    </div>
                </div>
            </div>
        @endif
    </div>


    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input class="" type="checkbox" name="item_checklist_driver_license_applicant" value="" wire:model="client_pre_closing.driver_license_applicant_checked" wire:click="markChecklist('client_pre_closing','driver_license_applicant_checked')">
                <label>Driver license applicant</label>
            </div>

        </div>

        @if($client_pre_closing->driver_license_applicant_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.driver_license_applicant_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.driver_license_applicant_checked_comment
                </x-slot>
            </x-checkedt-at-comment>
        @endif
    </div>
    <div class="col-md-12 col-lg-12">

        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_co_driver_license_applicant" value="" wire:model="client_pre_closing.driver_license_co_applicant_checked" wire:click="markChecklist('client_pre_closing','driver_license_co_applicant_checked')">
                <label>Co Driver license applicant</label>

            </div>
        </div>
        @if($client_pre_closing->driver_license_co_applicant_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.driver_license_co_applicant_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.driver_license_co_applicant_checked_comment
                </x-slot>
            </x-checkedt-at-comment>
        @endif
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input class="" type="checkbox" name="item_checklist_soc_sec_card_applicant" value="" wire:model="client_pre_closing.soc_sec_card_applicant_checked" wire:click="markChecklist('client_pre_closing','soc_sec_card_applicant_checked')">
                <label>Soc Sec card Applicant</label>
            </div>
        </div>
        @if($client_pre_closing->soc_sec_card_applicant_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.soc_sec_card_applicant_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.soc_sec_card_applicant_checked_comment
                </x-slot>
            </x-checkedt-at-comment>
        @endif
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">

            <div class="col-md-6 col-lg-6">
                <div class="">
                    <input  class="" type="checkbox" name="item_checklist_soc_sec_card_co_applicant" value="" wire:model="client_pre_closing.soc_sec_card_co_applicant_checked" wire:click="markChecklist('client_pre_closing','soc_sec_card_co_applicant_checked')">
                    <label>Soc Sec card Co Applicant</label>
                </div>
            </div>
        </div>
        @if($client_pre_closing->soc_sec_card_co_applicant_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.soc_sec_card_co_applicant_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.soc_sec_card_co_applicant_checked_comment
                </x-slot>
            </x-checkedt-at-comment>
        @endif
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_renters_insurance_checkbox" value=""  wire:model="client_pre_closing.renter_insurance_checked"  wire:click="markChecklist('client_pre_closing','renter_insurance_checked')">
                <label>Renters insurance?</label>
            </div>

        </div>
        @if($client_pre_closing->renter_insurance_checked)
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_renters_insurance_div">
                    <label>Company</label>
                    <input  class="form-control" type="text" name="item_checklist_renters_insurance_company" value="" wire:model="client_pre_closing.renter_insurance_name">
                </div>
            </div>

            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.renter_insurance_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.renter_insurance_checked_comment
                </x-slot>
            </x-checkedt-at-comment>

        @endif

    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_renters_insurance" value="" wire:model="client_pre_closing.flood_certificate_checked" wire:click="markChecklist('client_pre_closing','flood_certificate_checked')">
                <label>Flood Certificate</label>
            </div>
        </div>

        @if($client_pre_closing->flood_certificate_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.flood_certificate_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.flood_certificate_checked_comment
                </x-slot>
            </x-checkedt-at-comment>
        @endif
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row">

            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_renters_insurance" value="" wire:model="client_pre_closing.landlord_insurance_checked" wire:click="markChecklist('client_pre_closing','landlord_insurance_checked')">
                <label>Landlord Insurance</label>
            </div>
        </div>
        @if($client_pre_closing->landlord_insurance_checked)
            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.landlord_insurance_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.landlord_insurance_checked_comment
                </x-slot>
            </x-checkedt-at-comment>
        @endif
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_warranty_checkbox" value="" wire:model="client_pre_closing.warranty_checked" wire:click="markChecklist('client_pre_closing','warranty_checked')">
                <label>Warranty?</label>
            </div>
        </div>
        @if($client_pre_closing->warranty_checked)
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <input  class="form-control" type="text" name="item_checklist_warranty_company" value="" wire:model="client_pre_closing.warranty_company_name">
                    <label>Company Name</label>
                </div>
            </div>

            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.warranty_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.warranty_checked_comment
                </x-slot>
            </x-checkedt-at-comment>

        @endif

    </div>
    <div class="col-md-12 col-lg-12">
        {{--<div class="col-md-12 col-lg-12 item_checklist_warranty_div d-none">--}}
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Warranty paid by seller</label>
                <select class="form-control" name="item_checklist_warranty_paid_by_seller" id="item_checklist_warranty_paid_by_seller" wire:model="client_pre_closing.warranty_paid_by_seller_checked">
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_lease_checkbox" value="" wire:model="client_pre_closing.lease_signed_checked" wire:click="markChecklist('client_pre_closing','lease_signed_checked')">
                <label>Lease Signed?</label>
            </div>
        </div>
        @if($client_pre_closing->lease_signed_checked)
            <div class="row item_checklist_lease_div">
                <div class="col-md-6 col-lg-6 ">
                    <input  class="form-control" type="date" name="item_checklist_lease_expire" value="" wire:model="client_pre_closing.lease_expire_date">
                    <label>Lease Expire</label>
                </div>
            </div>

            <x-checkedt-at-comment>
                <x-slot name="checked">
                    client_pre_closing.lease_signed_checked_at
                </x-slot>

                <x-slot name="comment">
                    client_pre_closing.lease_signed_checked_comment
                </x-slot>
            </x-checkedt-at-comment>

        @endif
    </div>



    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Septic inspection</label>
                <select class="form-control" name="item_checklist_septic_inspection" id="item_checklist_septic_inspection" wire:model="client_pre_closing.septic_inspection_checked">
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    {{--<div class="col-md-12 col-lg-12">--}}
        {{--<div class="row">--}}
            {{--<div class="col-lg-6 col-md-6">--}}
                {{--<label>Clear Now Rent/Payment Enrollment</label>--}}
                {{--<select class="form-control" name="item_checklist_septic_inspection" id="item_checklist_septic_inspection" wire:model="client_pre_closing.clear_now_rent_payment_enrollment_check">--}}
                    {{--@foreach(YesNoDropDown::getList() as $key => $val)--}}
                        {{--<option value="{{$key}}">{{$val}}</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-12 col-lg-12">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-6 col-lg-6">--}}
                {{--<label>Prorated Rent ?</label>--}}
                {{--<input  class="" type="checkbox" name="item_checklist_prorated_rent_checkbox" value="" wire:model="client_pre_closing.prorated_rent_check">--}}
            {{--</div>--}}

        {{--</div>--}}
        {{--@if(!$client->prorated_rent_check)--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6 col-lg-6 item_checklist_prorated_rent_div ">--}}
                    {{--<div class="">--}}
                        {{--<label>Rent</label>--}}
                        {{--<input  class="form-control" type="number" name="item_checklist_prorated_rent" value="" wire:model="client_pre_closing.prorated_rent">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    {{--</div>--}}


    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <input  class="" type="checkbox" name="item_checklist_other_checkbox" value="" wire:model="client_pre_closing.other_checked" wire:click="markChecklist('client_pre_closing','other_checked')">
                <label>Other?</label>
            </div>
        </div>
        @if($client_pre_closing->other_checked)
            <div class="row">


                <div class="col-md-6 col-lg-6 item_checklist_other_input_div">
                    {{--@error('client_pre_closing.other_value') <span class="error alert-danger">{{ $message }}</span> @enderror--}}
                    <div class="">
                        <label>Other</label>
                        <input  class="form-control" type="text" name="item_checklist_other" value="" wire:model="client_pre_closing.other_value">
                    </div>
                </div>
            </div>
            {{--<x-checkedt-at-comment>--}}
                {{--<x-slot name="checked">--}}
                    {{--client_pre_closing.other_checked_at--}}
                {{--</x-slot>--}}

                {{--<x-slot name="comment">--}}
                    {{--client_pre_closing.other_checked--}}
                {{--</x-slot>--}}
            {{--</x-checkedt-at-comment>--}}

        @endif
    </div>
</div>

@push('scripts')
    {{--<script type="text/javascript">--}}

        {{--$(document).ready(function() {--}}
            {{--$('#payment_options').select2({--}}
                {{--placeholder: '{{__('Select your option')}}',--}}
                {{--allowClear: true--}}
            {{--});--}}
            {{--triggerPaymentOptions();--}}
        {{--});--}}

        {{--// $('#payment_options').on('change',function () {--}}
        {{--// @this.payment_option($(this).val());--}}
        {{--// })--}}

    {{--</script>--}}


    {{--<script type="text/javascript">--}}

        {{--function hideShow(val,div) {--}}
            {{--if(val == true)--}}
                {{--$(div).removeClass('d-none');--}}
            {{--if(val == 1)--}}
                {{--$(div).removeClass('d-none');--}}
            {{--else--}}
                {{--$(div).addClass('d-none');--}}
        {{--}--}}
        {{--//--}}
        {{--function selectChange(_this) {--}}
            {{--// alert(_this)--}}
            {{--var val = $(_this).val();--}}
            {{--console.log(val);--}}
           {{--@this.payment_option(val);--}}

        {{--}--}}

        {{--function triggerPaymentOptions() {--}}
            {{--var values = [];--}}
            {{--$('.option_list_value_div').each(function (j,i) {--}}
                {{--values.push($(i).attr('id'));--}}
            {{--});--}}
            {{--$('#payment_options').val(values).trigger('change');--}}
            {{--// $('#due_diligence_option').val()--}}
        {{--}--}}
    {{--</script>--}}

@endpush