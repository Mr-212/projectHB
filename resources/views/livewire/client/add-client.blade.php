<div class="">
    {{-- Do your work, then step back. --}}
    <div class="row pl-2">
        <div class="col-md-12">
            <h3 class="text-black-50">Item Checklist (Pre Closing)</h3>
        </div>

    </div>
    {{--<form wire:submit.prevent="book_house">--}}
    <div class="row p-2 item_checklist_deal_info_div">
            <div class="col-md-12 col-lg-12 bg-info">
                <h4 class="text-white pt-2">Client Info</h4>

            </div>

            <div class="col-md-6 col-lg-6 pt-4">
                @error('client.applicant_name') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="d-inline">
                    <label>Deal Name:</label>
                    <input type="text" class="form-control" wire:model="client.applicant_name">
                </div>

            </div>
            <div class="col-md-6 col-lg-6 pt-4">
                @error('client.partner_name') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="d-inline">
                    <label>Partner Name:</label>
                    <input type="text" class="form-control"  wire:model="client.partner_name">
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                @error('client.applicant_phone') <span class="error alert-danger">{{ $message }}</span> @enderror

                <div class="d-inline">
                    <label>Applicant Phone:</label>
                    <input type="text" class="form-control"  wire:model="client.applicant_phone">
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                @error('client.partner_phone') <span class="error alert-danger">{{ $message }}</span> @enderror

                <div class="d-inline">
                    <label>Partner Phone:</label>
                    <input type="text" class="form-control"  wire:model="client.partner_phone">
                </div>

            </div>
        <div class="col-md-6 col-lg-6">
            @error('client.applicant_email') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="d-inline">
                    <label>Applicant Email:</label>
                    <input type="text" class="form-control"  wire:model="client.applicant_email">
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.partner_email') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="d-inline">
                    <label>Partner Email:</label>
                    <input type="text" class="form-control"  wire:model="client.partner_email">
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.co_applicant_name') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="d-inline">
                    <label>Co-Applicant Name:</label>
                    <input type="text" class="form-control"  wire:model="client.co_applicant_name">
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.co_applicant_phone') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="d-inline">
                    <label>Co-Applicant Phone:</label>
                    <input type="text" class="form-control"  wire:model="client.co_applicant_phone">
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.co_applicant_email') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="d-inline">
                    <label>Co-Applicant Email:</label>
                    <input type="text" class="form-control"  wire:model="client.co_applicant_email">
                </div>

        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row" >


                <div class="col-md-6 col-lg-6">
                    {{--@error('deal.data.additional_tenant_name') <span class="error">{{ $message }}</span> @enderror--}}
                        <label>Additional Tenants ?</label>
                        <select class="form-control" name="deal_additional_tenants" id="deal_additional_tenants"  wire:model="client.additional_tenant_check" value="" >
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
                    <label>$500 Welcome Down Payment ?</label>

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
            <div class="d-inline">
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
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Deal Save?</label>
                <select class="form-control" name="deal_save" >
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        </div>


    <div class="row pl-2 item_checklist_property_info_div">
        <div class="col-md-12 col-lg-12 bg-info">
            <h4 class="text-white pt-2">Property Information</h4>

        </div>
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>New Construction</label>
                    <select class="form-control" name="item_checklist_new_construction" id="item_checklist_new_construction" wire:model="client.property_new_construction_check" value="" onchange="hideShow(this.value,'.item_checklist_new_construction_input_div')">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 col-lg-6 d item_checklist_new_construction_input_div {{$client->property_new_construction_check? '':'d-none'}}"  wire:target="client.property_new_construction_check"  id="item_checklist_new_construction_input_div"  wire:ignore>
                    <label>Builder Name</label>
                    <input  class="form-control" type="text" name="builder_name" value="" placeholder="Builder Name" wire:model="client.property_new_construction_builder_name">
                </div>
            </div>

        </div>

        <div class="col-md-6 col-lg-6">
            @error('client.property_country') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Property Country</label>
                <span><input class="form-control" type="text" name="property_country" value="" wire:model="client.property_country"></span>
            </div>

        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.property_state') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Property State</label>
                <span><input  class="form-control" type="text" name="property_state" value="" wire:model="client.property_state"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.property_city') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Property City</label>
                <input  class="form-control" type="text" name="property_city" value="" wire:model="client.property_city">
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.property_zip') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Property Zip</label>
                <input  class="form-control" type="text" name="property_zip" value="" wire:model="client.property_zip">
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            @error('client.purchase_price') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Purchase Price</label>
                <input  class="form-control" type="number" name="item_check_list_purchase_price" value="" wire:model="client.property_purchase_price">

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.property_closing_cost') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Closing Cost</label>
                <input  class="form-control" type="number" name="closing_cost_price" value="3500" wire:model="client.property_closing_cost">

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.property_closing_credit_general') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Closing Credit General</label>
                <input  class="form-control" type="number" name="closing_credit" value="" wire:model="client.property_closing_credit_general">

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.property_annual_property_tax') <span class="error alert-danger">{{ $message }}</span> @enderror

            <div class="">
                <label>Annual Property Tax</label>
                <input  class="form-control" type="number" name="annual_property_tax" value="" >

            </div>
        </div>

        <div class="col-md-12 col-lg-12">
                <div class="">
                        <label>HOA</label>
                        <select class="form-control" name="item_checklist_hoa" id="item_checklist_hoa" onchange="hideShow(this.value,'.item_checklist_hoa_div')" wire:model="client.property_hoa_check">
                            @foreach(YesNoDropDown::getList() as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
               </div>
                <div class="row item_checklist_hoa_div {{$client->property_hoa_check ?'':'d-none'}}" wire:ignore>
                    <div class="col-md-6 col-lg-6">
                        <span>HOA Name</span>
                       <input  class="form-control" type="text" name="hoa_name" value="" placeholder="" wire:model="client.property_hoa_name">
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <span>HOA Contact</span>
                        <input  class="form-control" type="text" name="hoa_name" value="" placeholder="" wire:model="client.property_hoa_phone">
                    </div>
                </div>
        </div>
        <div class="col-md-12 col-lg-12">
                <div class="">
                        <label>Repair Request</label>
                        <select class="form-control" name="item_checklist_repair_request" id="item_checklist_repair_request" onchange="hideShow(this.value,'.item_checklist_repair_request_div')" wire:model="client.property_repair_request_check">
                            @foreach(YesNoDropDown::getList() as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
               </div>
                <div class="row item_checklist_repair_request_div {{$client->property_repair_request_check ? '':'d-none'}}" wire:ignore>
                    <div class="col-md-6 col-lg-6">
                        <span>Item Names</span>
                        <input  class="form-control" type="text" name="item_checklist_repair_request_item_names" value="" placeholder="" wire:model="client.property_repair_request_item_names">
                    </div>

                </div>
        </div>

        <div class="col-md-6 col-lg-6">
            @error('client.property_closing_date_complete_check') <span class="error alert-danger">{{ $message }}</span> @enderror
            <div class="">
                <input type="checkbox"  value="" wire:model="client.property_closing_date_complete_check"/>
                 <label>Closing Date</label>
                 @if(!$client->property_closing_date_complete_check)
                     <input  class="form-control" type="date" name="closing_date" value="{{\Carbon\Carbon::parse($client->property_closing_date)->format('Y-m-d')}}" wire:model="client.property_closing_date" />
                 @endif

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            @error('client.property_due_diligence_expire_complete_check') <span class="error alert-danger">{{ $message }}</span> @enderror
            <div class="">
                <input type="checkbox"  value="" wire:model="client.property_due_diligence_expire_complete_check"/>
                <label>Due Diligence Expires</label>
                @if(!$client->property_due_diligence_expire_complete_check)
                <input  class="form-control" type="date" name="dd_expire_date" value="" wire:model="client.property_due_diligence_expire" />
                @endif
            </div>
        </div>

        <div class="col-md-12 mt-2 mb-2">
            <div class="">
                <label>Lender?</label>
                <select class="form-control" name="item_checklist_lender" id="item_checklist_lender" onchange="hideShow(this.value,'.item_checklist_lender_name_div')" wire:model="client.property_lender_check">
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row col-md-6 item_checklist_lender_name_div {{$client->property_lender_check?'':'d-none'}}" wire:ignore>
                    <input class="form-control" type="text" name="item_checklist_lender_name" value="" placeholder="Lender Name" wire:model="client.property_lender_name" />
            </div>
        </div>
    </div>


    <div class="row pl-2 item_checklist_due_diligence_div">
        <div class="col-md-12 col-lg-12 bg-info">
            <h4 class="text-white pt-2">Due Diligence Checklist </h4>
        </div>
        <div class="col-md-6 col-lg-6 pt-2">
            <div class="">
                <label>Rent</label>
                $<input  class="form-control" type="number" name="rent" wire:model="client.due_diligence_rent" />
            </div>
        </div>
        <div class="col-md-6 col-lg-6 mt-2">
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
                <div class="col-md-6 col-lg-6">
                    <label>Inspection Date?</label>
                    <input  class="" type="checkbox" name="item_checklist_inspection_checkbox" onclick="hideShow(this.checked,'.item_checklist_option_list_inspection_date_div')" wire:model="client.due_diligence_inspection_check" wire:click="setCheckListValueAndDate('due_diligence_inspection_check','')" >

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_option_list_inspection_date_div {{$client->due_diligence_inspection_check ?'':'d-none'}}" wire:ignore>
                    <label>Date</label>
                    <input  class="form-control" type="date" name="item_checklist_option_list_inspection_date" value="" wire:model="client.due_diligence_inspection_check_date">
                </div>
            </div>
        </div>

    </div>


    <div class="row pl-2 item_checklist_pre_closing">
        <div class="col-md-12 col-lg-12 bg-info">
            <h4 class="text-white pt-2">Pre Closing Checklist </h4>
        </div>
        <div class="col-md-12 col-lg-12 mt-2">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Appraisal Value?</label>
                    <input  class="" type="checkbox" name="item_checklist_appraisal_value_checkbox" value=""  wire:model="client.appraisal_value_check">

                </div>
            </div>
            @if(!$client->appraisal_value_check)
            <div class="row">
                <div class=" col-md-6 col-lg-6 item_checklist_appraisal_value_div">
                    <label>Value</label>
                    <input  class="form-control" type="number" name="item_checklist_appraisal_value" value="" wire:model="client.appraisal_value">
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Driver license applicant</label>
                    <input class="form-control" type="text" name="item_checklist_driver_license_applicant" value="" wire:model="client.driver_license_applicant">
                </div>


            <div class="col-md-6 col-lg-6">
                <label>Co Driver license applicant</label>
                <input  class="form-control" type="text" name="item_checklist_co_driver_license_applicant" value="" wire:model="client.driver_license_co_applicant">

            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                     <label>Soc Sec card Applicant</label>
                     <input class="form-control" type="text" name="item_checklist_soc_sec_card_applicant" value="" wire:model="client.soc_sec_card_applicant">
                </div>

            <div class="col-md-6 col-lg-6">
                <div class="">
                    <label>Soc Sec card Co Applicant</label>
                    <input  class="form-control" type="text" name="item_checklist_soc_sec_card_co_applicant" value="" wire:model="client.soc_sec_card_co_applicant">
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
        </div> </div>
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

    {{--</div>--}}
    {{--<button  class="btn btn-info" type="submit">Book House</button>--}}
{{--</form>--}}


    <div class="col-md-12 border-bottom pt-4">
    </div>

    <div class="col-md-12 pt-4">
        <div class="float-right">
            <a  class="btn btn-warning mr-2" type="submit" onclick="return addclient()">Add</a>
            {{--<a  class="btn btn-danger  mr-2" type="submit" href="{{url('/house/cancelled')}}">Cancel Purchase</a>--}}
            {{--<a  class="btn btn-danger  mr-2" type="submit" href="{{url('/house/dropouts')}}">Cancel Client</a>--}}
            {{--<a  class="btn btn-info" type="submit" onclick="return book_house()" disabled>Book House</a>--}}

        </div>


    </div>
</div>
</div>


@push('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
            $('#due_diligence_option').select2({
                placeholder: '{{__('Select your option')}}',
                allowClear: true
            });
            triggerPaymentOptions();


        });

        document.addEventListener("livewire:load", () => {

            Livewire.hook('component.initialized', (el, component) => {
                 //alert('here');
                //$('.select2').select2();
            })

            Livewire.hook('message.processed', (message, component) => {
               // alert('here');
                //$('.select2').select2();
            });
            Livewire.hook('element.updated', (el, component) => {
                //alert('here');
            })
        });
    </script>


    <script type="text/javascript">

        $(document).find('#deal_option_checkbox').click(function () {
            if($(this).is(':checked'))
                $('.select_deal_option_div').removeClass('d-none')
            else
                $('.select_deal_option_div').addClass('d-none')
        });

        $(document).find('#select_deal_option_checkbox').click(function (_this) {
            if($(this).is(':checked')) {
                $('.deal_option_value_div').removeClass('d-none')
            }else{
                $('.deal_option_value_div').addClass('d-none')
            }
        });
        $(document).find('#item_checklist_option_list').change(function (_this) {
            if($(this).val() !== "") {
                $('.item_checklist_option_list_value_div').removeClass('d-none')
            }else{
                $('.item_checklist_option_list_value_div').addClass('d-none')
            }
        });

        function hideShow(val,div) {
            // console.log(val);
            if(val == true)
                $(div).removeClass('d-none');
            if(val == 1)
                $(div).removeClass('d-none');
            else
                $(div).addClass('d-none');
        }

        function selectChange(_this) {
           var val = $(_this).val();
           @this.payment_option(val);

        }

        function triggerPaymentOptions() {
            var values = [];
            $('.due_diligence_option_list_value_div').each(function (j,i) {
                 values.push($(i).attr('id'));
            });
            $('#due_diligence_option').val(values).trigger('change');
            // $('#due_diligence_option').val()
        }

        function addclient() {
            bootbox.confirm({
                message: 'Confirm Y/N',
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
                        @this.addClient();
                    }
                }
            });


        }

        function book_house() {
            bootbox.confirm({
                message: 'Confirm Y/N',
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
                        @this.book_house();
                    }
                }
            });
        }


    </script>
@endpush
