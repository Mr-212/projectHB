<div class="row pl-2 item_checklist_pre_closing">
    <div class="col-md-12 col-lg-12 bg-info">
        <h4 class="text-white pt-2">Pre Closing Checklist </h4>
    </div>













    <div class="col-md-12 col-lg-12 mt-2">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                @error('client.appraisal_value_check') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div>
                    <label>Appraisal Value?</label>
                    <input  class="" type="checkbox" name="item_checklist_appraisal_value_checkbox" value=""  wire:model="client.appraisal_value_check">
                </div>
            </div>
        </div>
        @if(!$client->appraisal_value_check)
            <div class="row">

                <div class=" col-md-6 col-lg-6 item_checklist_appraisal_value_div">
                    @error('client.appraisal_value') <span class="error alert-danger">{{ $message }}</span> @enderror
                    <div class="">
                        <label>Value</label>
                        <input  class="form-control" type="number" name="item_checklist_appraisal_value" value="" wire:model="client.appraisal_value">
                    </div>
                </div>
            </div>
        @endif
    </div>


    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Driver license applicant</label>
                <input class="form-control" type="checkbox" name="item_checklist_driver_license_applicant" value="" wire:model="client.driver_license_applicant">
            </div>


            <div class="col-md-6 col-lg-6">
                <label>Co Driver license applicant</label>
                <input  class="form-control" type="checkbox" name="item_checklist_co_driver_license_applicant" value="" wire:model="client.driver_license_co_applicant">

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Soc Sec card Applicant</label>
                <input class="form-control" type="checkbox" name="item_checklist_soc_sec_card_applicant" value="" wire:model="client.soc_sec_card_applicant">
            </div>

            <div class="col-md-6 col-lg-6">
                <div class="">
                    <label>Soc Sec card Co Applicant</label>
                    <input  class="form-control" type="checkbox" name="item_checklist_soc_sec_card_co_applicant" value="" wire:model="client.soc_sec_card_co_applicant">
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Renters insurance?</label>
                <input  class="" type="checkbox" name="item_checklist_renters_insurance_checkbox" value=""  wire:model="client.renter_insurance_check">
            </div>

        </div>
        @if(!$client->renter_insurance_check)
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_renters_insurance_div">
                    <label>Company</label>
                    <input  class="form-control" type="text" name="item_checklist_renters_insurance_company" value="" wire:model="client.renter_insurance_company_name">
                </div>
            </div>
        @endif

    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Flood Certificate</label>
                <input  class="" type="checkbox" name="item_checklist_renters_insurance" value="" wire:model="client.flood_certificate_check">
            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12">
        <div class="row">

            <div class="col-md-6 col-lg-6">
                <label>Landlord Insurance</label>
                <input  class="" type="checkbox" name="item_checklist_renters_insurance" value="" wire:model="client.landlord_insurance_check">
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Warranty?</label>
                <input  class="" type="checkbox" name="item_checklist_warranty_checkbox" value="" wire:model="client.warranty_check">
            </div>
        </div>
        @if(!$client->warranty_check)
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Company Name</label>
                    <input  class="form-control" type="text" name="item_checklist_warranty_company" value="" wire:model="client.warranty_company_name">
                </div>
            </div>
        @endif

    </div>
    <div class="col-md-12 col-lg-12">
        {{--<div class="col-md-12 col-lg-12 item_checklist_warranty_div d-none">--}}
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Warranty paid by seller</label>
                <select class="form-control" name="item_checklist_warranty_paid_by_seller" id="item_checklist_warranty_paid_by_seller" wire:model="client.warranty_paid_by_seller_check">
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
                <label>Lease?</label>
                <input  class="" type="checkbox" name="item_checklist_lease_checkbox" value="" wire:model="client.lease_check">
            </div>
        </div>
        @if(!$client->lease_check)
            <div class="row item_checklist_lease_div">
                <div class="col-md-6 col-lg-6 ">
                    <label>Lease Expire</label>
                    <input  class="form-control" type="date" name="item_checklist_lease_expire" value="" wire:model="client.lease_expire_date">
                </div>
            </div>
        @endif
    </div>


    <div class="col-md-12 col-lg-12">
        <h4>Option</h4>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Termite ?</label>
                <input  class="" type="checkbox" name="item_checklist_termite_checkbox" value="" wire:model="client.termite_check">
            </div>

        </div>
        @if(!$client->termite_check)
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_termite_paid_by_div">
                    <div class="">
                        <label>Paid BY</label>
                        <select class="form-control" name="item_checklist_termite_paid_by" id="item_checklist_termite_paid_by" wire:model="client.termite_paid_by">
                            <option value="0">Seller</option>
                            <option value="1">Dream</option>
                        </select>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Septic inspection</label>
                <select class="form-control" name="item_checklist_septic_inspection" id="item_checklist_septic_inspection" wire:model="client.septic_inspection_check">
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <label>Clear Now Rent/Payment Enrollment</label>
                <select class="form-control" name="item_checklist_septic_inspection" id="item_checklist_septic_inspection" wire:model="client.clear_now_rent_payment_enrollment_check">
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
                <label>Prorated Rent ?</label>
                <input  class="" type="checkbox" name="item_checklist_prorated_rent_checkbox" value="" wire:model="client.prorated_rent_check">
            </div>

        </div>
        @if(!$client->prorated_rent_check)
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_prorated_rent_div ">
                    <div class="">
                        <label>Rent</label>
                        <input  class="form-control" type="number" name="item_checklist_prorated_rent" value="" wire:model="client.prorated_rent">
                    </div>
                </div>
            </div>
        @endif
    </div>


    <div class="col-md-12 col-lg-12">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <label>Other?</label>
                <input  class="" type="checkbox" name="item_checklist_other_checkbox" value="" wire:model="client.other_check">
            </div>
        </div>
        @if($client->other_check)
            <div class="row">


                <div class="col-md-6 col-lg-6 item_checklist_other_input_div">
                    {{--@error('client.other_value') <span class="error alert-danger">{{ $message }}</span> @enderror--}}
                    <div class="">
                        <label>Other</label>
                        <input  class="form-control" type="text" name="item_checklist_other" value="" wire:model="client.other_value">
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>