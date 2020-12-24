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
        @error('client.property_purchase_price') <span class="error alert-danger">{{ $message }}</span> @enderror

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
            <input  class="form-control" type="number" name="annual_property_tax" value="" wire:model="client.property_annual_property_tax" >

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
                <input  class="form-control" type="date" name="closing_date" value="" wire:model="client.property_closing_date" />
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
        <div class="row">
            <label>Lender?</label>
            <select class="form-control" name="item_checklist_lender" id="item_checklist_lender" onchange="hideShow(this.value,'.item_checklist_lender_name_div')" wire:model="client.property_lender_check">
                @foreach(YesNoDropDown::getList() as $key => $val)
                    <option value="{{$key}}">{{$val}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class=" col-md-6 item_checklist_lender_name_div {{$client->property_lender_check?'':'d-none'}}" wire:ignore>
                <input class="form-control" type="text" name="item_checklist_lender_name" value="" placeholder="Lender Name" wire:model="client.property_lender_name" />
            </div>
        </div>


    </div>
</div>