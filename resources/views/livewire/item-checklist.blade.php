<div class="">
    @php

    @endphp
    {{-- Do your work, then step back. --}}
    <div class="row pl-2">
        <div class="col-md-12">
            <strong><h3 class="text-black-50">Item Checklist (Pre Closing)</h3></strong>
        </div>

    </div>
    {{--<form wire:submit.prevent="book_house">--}}
    <div class="row p-2 item_checklist_deal_info_div">
            <div class="col-md-12 col-lg-12 bg-info">
                <h4 class="text-white pt-2">Client Info</h4>

            </div>
        {{--@if($errors->any())--}}
            {{--{!! implode('', $errors->all('<div>:message</div>')) !!}--}}
        {{--@endif--}}
        {{--@error('additional_tenant_name') <span class="error alert-danger">{{ $message }}</span> @enderror--}}

        <div class="col-md-6 col-lg-6 pt-4">
                <div class="d-inline">
                    <label>Deal Name:</label>
                    <span wire:model="client.applicant_name">{{$client->applicant_name}} </span>
                </div>

            </div>
            <div class="col-md-6 col-lg-6 pt-4">
                <div class="d-inline">
                    <label>Partner Name:</label>
                    <span wire:model="client.partner_name">{{$client->partner_name}} </span>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Applicant Phone:</label>
                    <span wire:model="client.applicant_phone">{{$client->applicant_phone}} </span>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Partner Phone:</label>
                    <span wire:model="client.partner_phone">{{$client->partner_phone}} </span>
                </div>

            </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Applicant Email:</label>
                    <span wire:model="client.applicant_email">{{$client->applicant_email}}</span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Partner Email:</label>
                    <span wire:model="client.partner_email">{{$client->partner_email}} </span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Co-Applicant Name:</label>
                    <span wire:model="client.co_applicant_name">{{$client->co_applicant_name}} </span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Co-Applicant Phone:</label>
                    <span wire:model="client.co_applicant_phone">{{$client->co_applicant_phone}} </span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Co-Applicant Email:</label>
                    <span wire:model="client.co_applicant_email">{{$client->co_applicant_email}}</span>
                </div>

        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row" >


            <div class="col-md-6 col-lg-6" wire:ignore>
                {{--@error('deal.data.additional_tenant_name') <span class="error">{{ $message }}</span> @enderror--}}
                    <label>Additional Tenants ?</label>
                    <select wire:model="client.additional_tenant_check" class="form-control" name="deal_additional_tenants" id="deal_additional_tenants"  value="{{$client->additional_tenant_check}}">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach

                    </select>
            </div>
                {{--@if($client->additional_tenant_check)--}}

             <div class="col-md-6 col-lg-6 {{$client->additional_tenant_check ? '':'d-none'}}" >
                    @error('client.additional_tenant_name') <span class="error alert-danger">{{ $message }}</span> @enderror
                    <div class="deal_additional_tenant_div">
                        <label>Name</label>
                       <input class="form-control" type="text" name="client_additional_tenant_name" value="{{$client->additional_tenant_name}}" wire:model="client.additional_tenant_name">
                    </div>
             </div>
                {{--@endif--}}
            </div>
        </div>
            <div class="col-md-6 col-lg-6" wire:ignore>
                <div class="d-inline">
                    <label>$500 Welcome Down Payment ?</label>
                    <select class="form-control" name="deal_welcome_bonus" wire:model="client.welcome_down_payment">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}" {{$key == $client->welcome_down_payment ? 'selected':''}}>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                @error('client.mortgage_type') <span class="error alert-danger">{{ $message }}</span> @enderror
                <div class="">
                    <label>Mortgage Type ?</label>
                    <select class="form-control" name="deal_mortgage_type" wire:model="client.mortgage_type_id">
                        <option value="0">Select</option>
                        @foreach(MortgageTypeDropdown::getList() as $key => $val)
                            <option value="{{$key}}" {{$key == $client->mortgage_type_id ? 'selected':''}}>{{$val}}</option>
                        @endforeach



                    </select>
                </div>

            </div>
            <div class="col-md-6 col-lg-6" wire:ignore>
                @error('client.rental_verification_check') <span class="error alert-danger">{{ $message }}</span> @enderror

                <div class="">
                    <label>Rental Verification</label>
                    <select class="form-control" name="deal_save" wire:model="client.rental_verification_check">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}" {{$key == $client->rental_verification_check ? 'selected':''}}>{{$val}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Deal Save?</label>
                    <select class="form-control" name="deal_save">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>


    <div class="row pl-2 item_checklist_peropert_info_div">
        <div class="col-md-12 col-lg-12 bg-info">
            <h4 class="text-white pt-2">Property Information</h4>

        </div>
        <div class="col-md-12 mt-2">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>New Construction</label>
                    <select class="form-control" name="item_checklist_new_construction" id="item_checklist_new_construction" onchange="hideShow(this.value,'.item_checklist_new_construction_input_div')">
                        @foreach(YesNoDropDown::getList() as $key => $val)
                            <option value="{{$key}}">{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 col-lg-6 d-none item_checklist_new_construction_input_div" id="item_checklist_new_construction_input_div">
                    <label>Builder Name</label>
                    <input  class="form-control" type="text" name="builder_name" value="" placeholder="Builder Name">
                </div>
            </div>

        </div>

        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Property Country</label>
                <span><input class="form-control" type="text" name="property_country" value=""></span>
            </div>

        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Property State</label>
                <span><input  class="form-control" type="text" name="property_state" value=""></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Property City</label>
                <input  class="form-control" type="text" name="property_city" value="">
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Property Zip</label>
                <input  class="form-control" type="text" name="property_zip" value="">
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Purchase Price</label>
                <input  class="form-control" type="number" name="item_check_list_purchase_price" value="">

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Closing Cost</label>
                <input  class="form-control" type="number" name="closing_cost_price" value="3500">

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Closing Credit General</label>
                <input  class="form-control" type="number" name="closing_credit" value="">

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Annual Property Tax</label>
                <span><input  class="form-control" type="number" name="annual_property_tax" value=""></span>

            </div>
        </div>

        <div class="col-md-12 col-lg-12">
                <div class="">
                        <label>HOA</label>
                        <select class="form-control" name="item_checklist_hoa" id="item_checklist_hoa" onchange="hideShow(this.value,'.item_checklist_hoa_div')">
                            @foreach(YesNoDropDown::getList() as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
               </div>
                <div class="row item_checklist_hoa_div d-none">
                    <div class="col-md-6 col-lg-6">
                        <span>HOA Name</span>
                        <span><input  class="form-control" type="text" name="hoa_name" value="" placeholder=""></span>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <span>HOA Contact</span>
                        <span><input  class="form-control" type="text" name="hoa_name" value="" placeholder=""></span>
                    </div>
                </div>
        </div>
        <div class="col-md-12 col-lg-12">
                <div class="">
                        <label>Repair Request</label>
                        <select class="form-control" name="item_checklist_repair_request" id="item_checklist_repair_request" onchange="hideShow(this.value,'.item_checklist_repair_request_div')">
                            <option value="no">No</option>
                            <option value="yes">Yes</option>
                        </select>
               </div>
                <div class="row item_checklist_repair_request_div d-none">
                    <div class="col-md-6 col-lg-6">
                        <span>Item Names</span>
                        <input  class="form-control" type="text" name="item_checklist_repair_request_name" value="" placeholder="">
                    </div>

                </div>
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="">
                <label>Closing Date</label>
               <input  class="form-control" type="date" name="closing_date" value="">

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="">
                <label>Due Diligence Expires</label>
                <span><input  class="form-control" type="date" name="dd_expire_date" value=""></span>

            </div>
        </div>

        <div class="col-md-12 mt-2 mb-2">
            <div class="">
                <label>Lender?</label>
                <select class="form-control" name="item_checklist_lender" id="item_checklist_lender" onchange="hideShow(this.value,'.item_checklist_lender_name_div')">
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row col-md-6 item_checklist_lender_name_div d-none">
                    <input class="form-control" type="text" name="item_checklist_lender_name" value="" placeholder="Lender Name">
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
                <span>$<input  class="form-control" type="number" name="rent" value="10"></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 mt-2">
            <div class="">
                <label>Option Payment Date</label>
                <input  class="form-control" type="date" name="item_checklist_option_payment_date" value="">
            </div>
        </div>

        <div class="row col-md-12 col-lg-12 mt-2">
            <div class="col-md-6">
                <label>Option?</label>
                <select class="form-control" name="item_checklist_lender" id="item_checklist_option" onchange="hideShow(this.value,'.item_checklist_option_list_div')">
                    @foreach(YesNoDropDown::getList() as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6 col-lg-6 item_checklist_option_list_div d-none">
                <label>Option?</label>
                <select class="form-control" name="item_checklist_option_list" id="item_checklist_option_list" >
                    <option value="">Select Option</option>
                    <option value="3_month_option">3 Month Option</option>
                    <option value="6_month_option">6 Mont Option</option>
                    <option value="12_month_option">12 Month Option</option>
                </select>
            </div>
            <div class="col-md-6 col-lg-6 item_checklist_option_list_value_div d-none">
                <label>Option Payment</label>
                <input  class="form-control" type="number" name="item_checklist_option_list_value" value="">
            </div>

        </div>



        <div class="row col-md-12 col-lg-12 no-gutters mb-2">
            <div class="col-md-6 col-lg-6">
                <label>Inspection Date?</label>
                <input  class="" type="checkbox" name="item_checklist_inspection_checkbox" value="yes" onclick="hideShow(this.checked,'.item_checklist_option_list_inspection_date_div')">

            </div>
            <div class="row col-md-6 col-lg-6 item_checklist_option_list_inspection_date_div d-none">
                <label>Date</label>
                <input  class="form-control" type="date" name="item_checklist_option_list_inspection_date" value="">
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
                <input  class="" type="checkbox" name="item_checklist_appraisal_value_checkbox" value="yes" onclick="hideShow(this.checked,'.item_checklist_appraisal_value_div')">

            </div>
            <div class=" col-md-6 col-lg-6 item_checklist_appraisal_value_div d-none">
                <label>Value</label>
                <input  class="form-control" type="number" name="item_checklist_appraisal_value" value="">
            </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Driver license applicant</label>
                    <input class="form-control" type="text" name="item_checklist_driver_license_applicant" value="">
                </div>


            <div class="col-md-6 col-lg-6">
                <label>Co Driver license applicant</label>
                <input  class="form-control" type="text" name="item_checklist_co_driver_license_applicant" value="">

            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                     <label>Soc Sec card Applicant</label>
                     <input class="form-control" type="text" name="item_checklist_soc_sec_card_applicant" value="">
                </div>

            <div class="col-md-6 col-lg-6">
                <div class="">
                    <label>Soc Sec card Co Applicant</label>
                    <input  class="form-control" type="text" name="item_checklist_soc_sec_card_co_applicant" value="">
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Renters insurance?</label>
                    <input  class="" type="checkbox" name="item_checklist_renters_insurance_checkbox" value="yes" onclick="hideShow(this.checked,'.item_checklist_renters_insurance_div')">
                </div>
                <div class="col-md-6 col-lg-6 item_checklist_renters_insurance_div d-none">
                    <label>Company</label>
                    <input  class="form-control" type="text" name="item_checklist_renters_insurance_company" value="">
                </div>
            </div>

        </div>
        <div class="col-md-12 col-lg-12 item_checklist_renters_insurance_div  d-none">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Flood Certificate</label>
                    <input  class="form-control" type="text" name="item_checklist_renters_insurance" value="">
                </div>
                <div class="col-md-6 col-lg-6">
                    <label>Landlord Insurance</label>
                    <input  class="form-control" type="text" name="item_checklist_renters_insurance" value="">
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Warranty?</label>
                    <input  class="" type="checkbox" name="item_checklist_warranty_checkbox" value="yes" onclick="hideShow(this.checked,'.item_checklist_warranty_div')">
                </div>
            </div>

        </div>
        <div class="col-md-12 col-lg-12 item_checklist_warranty_div d-none">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Company Name</label>
                    <input  class="form-control" type="text" name="item_checklist_warranty_company" value="">
                </div>
                <div class="col-md-6 col-lg-6">
                    <label>Warranty paid by seller</label>
                    <select class="form-control" name="item_checklist_warranty_paid_by_seller" id="item_checklist_warranty_paid_by_seller" onchange="hideShow(this.value,'.item_checklist_option_list_div')">
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
                    <input  class="" type="checkbox" name="item_checklist_lease_checkbox" value="" onclick="hideShow(this.checked,'.item_checklist_lease_div')">
                </div>
            </div>
            <div class="row item_checklist_lease_div d-none">
                <div class="col-md-6 col-lg-6 ">
                    <label>Lease Expire</label>
                    <input  class="form-control" type="date" name="item_checklist_lease_expire" value="">
                </div>
            </div>
        </div>


        <div class="col-md-12 col-lg-12">
            <h4>Option</h4>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Termite ?</label>
                    <input  class="" type="checkbox" name="item_checklist_termite_checkbox" value="" onclick="hideShow(this.checked,'.item_checklist_termite_paid_by_div')">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_termite_paid_by_div d-none">
                    <div class="">
                        <label>Paid BY</label>
                        <select class="form-control" name="item_checklist_termite_paid_by" id="item_checklist_termite_paid_by">
                            <option value="seller">Seller</option>
                            <option value="dream">Dream</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 col-lg-6">
                    <div class="">
                        <label>Septic inspection</label>
                        <select class="form-control" name="item_checklist_septic_inspection" id="item_checklist_septic_inspection">
                            @foreach(YesNoDropDown::getList() as $key => $val)
                                <option value="{{$key}}">{{$val}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Prorated Rent ?</label>
                    <input  class="" type="checkbox" name="item_checklist_prorated_rent_checkbox" value="" onclick="hideShow(this.checked,'.item_checklist_prorated_rent_div')">
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_prorated_rent_div d-none">
                    <div class="">
                        <label>Rent</label>
                        <input  class="form-control" type="text" name="item_checklist_prorated_rent" value="">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12 col-lg-12">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <label>Other?</label>
                    <input  class="" type="checkbox" name="item_checklist_other_checkbox" value="" onclick="hideShow(this.checked,'.item_checklist_other_input_div')">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 item_checklist_other_input_div d-none">
                    <div class="">
                        <label>Other</label>
                        <input  class="form-control" type="text" name="item_checklist_other" value="">
                    </div>
                </div>
            </div>


        </div>

    </div>
    {{--<button  class="btn btn-info" type="submit">Book House</button>--}}
{{--</form>--}}


    <div class="col-md-12 border-bottom pt-4">
    </div>

    <div class="col-md-12 pt-4">
        <div class="float-right">
            <a  class="btn btn-warning  mr-2" type="submit" wire:click="before_closing">Before Closing</a>
            <a  class="btn btn-danger  mr-2" type="submit" href="{{url('/house/cancelled')}}">Cancel Purchase</a>
            <a  class="btn btn-danger  mr-2" type="submit" href="{{url('/house/dropouts')}}">Cancel Client</a>
            <button  class="btn btn-info" type="submit" wire:click="book_house">Book House</button>

        </div>


    </div>
</div>


@push('scripts')
    <script>

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
            console.log(val);
            if(val == 'yes' || val == true) {
                $(div).removeClass('d-none')
            }
            else{
                $(div).addClass('d-none')
            }
        }


    </script>
@endpush
