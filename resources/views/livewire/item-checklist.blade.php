<div class="">
    {{-- Do your work, then step back. --}}
    <div class="row pl-2">
        <div class="col-md-12">
            <strong><h3 class="text-black-50">Item Checklist (Pre Closing)</h3></strong>
        </div>

    </div>
    <div class="row p-2">
            <div class="col-md-12 col-lg-12 bg-info">
                <h4 class="text-white pt-2">Client Info</h4>

            </div>

            <div class="col-md-6 col-lg-6 pt-4">
                <div class="d-inline">
                    <label>Deal Name:</label>
                    <span> Deal 1</span>
                </div>

            </div>
            <div class="col-md-6 col-lg-6 pt-4">
                <div class="d-inline">
                    <label>Partner Name:</label>
                    <span> Partner1</span>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Applicant Phone:</label>
                    <span> 032789563</span>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Partner Phone:</label>
                    <span> 5556987452</span>
                </div>

            </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Applicant Email:</label>
                    <span> abc@yahoo.com</span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Partner Email:</label>
                    <span> partner@yahoo.com</span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Co-Applicant Name:</label>
                    <span> JOHN</span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Co-Applicant Phone:</label>
                    <span> 123456789</span>
                </div>

        </div>
        <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Co-Applicant Email:</label>
                    <span> co-app@yahoo.com</span>
                </div>

        </div>
        <div class="row col-md-12">
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Additional Tenants ?</label>
                    <select class="form-control-sm" name="deal_additional_tenants" id="deal_additional_tenants">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>

                    </select>
                </div>
                <div class="col-md-6 col-lg-6 deal_additional_tenant_div d-none">
                    <div class="d-inline">
                        <label>Name</label>
                        <span><input class="form-control" type="text" name="deal_additional_tenants_name" value=""></span>
                    </div>

                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>$500 Welcome Down Payment ?</label>
                    <select class="form-control-sm" name="deal_welcome_bonus">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Mortgage TYpe ?</label>
                    <select class="form-control-sm" name="deal_mortgage_type">
                        <option value="0">Select</option>
                        <option value="fha">FHA</option>
                        <option value="va">VA</option>
                        <option value="usda">USDA</option>
                        <option value="conventional">Conventional</option>
                        <option value="non-qm">Non-QM</option>
                    </select>
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Rental Verification</label>
                    <input class="form-control" type="text" name="deal_rental_verification" value="">
                </div>

            </div>
            <div class="col-md-6 col-lg-6">
                <div class="d-inline">
                    <label>Deal Save?</label>
                    <select class="form-control-sm" name="deal_save">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </div>

            </div>
        </div>



    </div>
    {{--<div class="border"></div>--}}

    <div class="row pl-2">
        <div class="col-md-12 col-lg-12 bg-info">
            <h4 class="text-white pt-2">Property Information</h4>

        </div>


        <div class="col-md-12 col-lg-12">
            <h5>Property house number and street Info</h5>

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
                <span><input  class="form-control" type="text" name="property_city" value=""></span>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Property Zip</label>
                <span><input  class="form-control" type="text" name="property_zip" value=""></span>
            </div>
        </div>
        <div class="col-md-12">
            <div class="d-inline">
                <span><input type="checkbox" name="down_payment" value="0"></span>
                <label>New Construction?</label>
                <span><input  class="form-control" type="text" name="builder_name" value="" placeholder="Builder Name"></span>
            </div>

        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Purchase Price</label>
                <span><input  class="form-control" type="number" name="purchase_price" value=""></span>

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Closing Credit</label>
                <span><input  class="form-control" type="number" name="closing_credit" value=""></span>

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Annual Property Tax</label>
                <span><input  class="form-control" type="number" name="annual_property_tax" value=""></span>

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="d-inline">
                <label>Closing Cost Price</label>
                <span><input  class="form-control" type="number" name="closing_cost_price" value="3500"></span>

            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="">
                <div class="">
                    <span><input type="checkbox" name="hoa_checkbox" id="hoa_checkbox" value="0"></span>
                    <label>HOA?</label>
                </div>
                <div class="row hoa_div d-none">
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
        </div>

        <div class="col-md-6 col-lg-6">
            <div class="">
                <label>Closing Date</label>
                <span><input  class="form-control" type="date" name="closing_date" value=""></span>

            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="">
                <label>DD Expires</label>
                <span><input  class="form-control" type="date" name="dd_expire_date" value=""></span>

            </div>
        </div>

        <div class="col-md-12 pb-2">
            <div class="">
                <input type="checkbox" name="lender" id="lender_checkbox" value="0">
                <label>Lender?</label>
            </div>

            <div class="row col-md-6 lender_div d-none">
                    <input class="form-control" type="text" name="builder_name" value="" placeholder="Lender Name">
            </div>
        </div>
    </div>


    <div class="row pl-2 letter_of_commitment">
        <div class="col-md-12 col-lg-12 bg-info">
            <h4 class="text-white pt-2">Due Diligence Checklist </h4>
        </div>
        <div class="col-md-6 col-lg-6 pt-2">
            <div class="">
                <label>Rent</label>
                <span>$<input  class="form-control" type="number" name="rent" value="10"></span>
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="row col-md-12">
                <span><input type="checkbox" name="deal_option_checkbox" id="deal_option_checkbox" value="0"></span>
                <label>Option?</label>
            </div>
            <div class="row col-md-12 col-lg-12 select_deal_option_div d-none">
                <div class="col-md-4">
                    <span><input type="checkbox" name="select_deal_option_checkbox" id="select_deal_option_checkbox" value="3"></span>
                    <label>3 MO Option</label>
                </div>
                <div class="col-md-4">
                    <span><input type="checkbox" name="select_deal_option_checkbox" id="select_deal_option_checkbox" value="6"></span>
                    <label>6 MO Option</label>
                </div>
                <div class="col-md-4">
                    <span><input type="checkbox" name="select_deal_option_checkbox" id="select_deal_option_checkbox" value="12"></span>
                    <label>12 MO Option</label>
                </div>
                <div class="col-md-6 deal_option_value_div d-none pb-2">
                    <span>$<input  class="form-control" type="text" name="deal_option_value" value=""></span>
                </div>
            </div>

        </div>

    </div>


    <div class="row pl-2 on_board_fee_payment">
        <div class="col-md-12 col-lg-12 bg-info">
            <h4 class="text-white pt-2">On Board Fee Payment </h4>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="">
                <label>Option Payment Date</label>
                <span><input  class="form-control" type="date" name="option_payment_date" value=""></span>
            </div>
        </div>


        <div class="col-md-12 col-lg-12 ">
            <h4 class="pt-2">Inspection</h4>

        <div class="">
            <div class="col-md-6">
                <label>Termite</label>
                <span><input  class="form-control" type="text" name="termite" value=""></span>
            </div>
            <div class="col-md-6">
                <div class="">
                    <span><input type="checkbox" name="septic_inspection" id="septic_inspection" value="yes"></span>
                    <label>Septic inspection</label>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-12 ">
            <h4 class="pt-2">Repair Credit</h4>
        <div class="">
            <div class="col-md-6">
                <div class="">
                    <span><input type="checkbox" name="septic_inspection" id="septic_inspection" value="yes"></span>
                    <label>Septic inspection</label>
                </div>
            </div>
        </div>

        </div>


    </div>

    <div class="col-md-12 border-bottom pt-4">
    </div>

    <div class="col-md-12 pt-4">
        <div class="float-right">
            <a  class="btn btn-warning  mr-2" type="submit" href="{{url('/items/outstanding/before_dd')}}">Cancel Purchase</a>
            <button  class="btn btn-info" type="submit" wire:click="save_book_purchase">Book Purchase</button>
        </div>


    </div>

</div>

@push('scripts')
    <script>
        $(document).find('#hoa_checkbox').click(function () {
            if($(this).is(':checked'))
                $('.hoa_div').removeClass('d-none')
            else
                $('.hoa_div').addClass('d-none')

        });
        $(document).find('#lender_checkbox').click(function () {
            if($(this).is(':checked'))
                $('.lender_div').removeClass('d-none')
            else
                $('.lender_div').addClass('d-none')

        }) ;
        $(document).find('#deal_option_checkbox').click(function () {
            if($(this).is(':checked'))
                $('.select_deal_option_div').removeClass('d-none')
            else
                $('.select_deal_option_div').addClass('d-none')
        });
        $(document).find('#select_deal_option_checkbox').click(function (_this) {
            if($(this).is(':checked')) {
                // $('#select_deal_option_checkbox').not($(_this)).prop('checked', false);
                $('.deal_option_value_div').removeClass('d-none')
            }else{
                $('.deal_option_value_div').addClass('d-none')
            }
        });
        $(document).find('#deal_additional_tenants').change(function () {
            if($(this).val() == 'yes') {
                // $('#select_deal_option_checkbox').not($(_this)).prop('checked', false);
                $('.deal_additional_tenant_div').removeClass('d-none')
            }else{
                $('.deal_additional_tenant_div').addClass('d-none')
            }
        });


    </script>
@endpush
