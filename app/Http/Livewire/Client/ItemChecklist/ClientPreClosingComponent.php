<?php

namespace App\Http\Livewire\Client\ItemChecklist;

use App\Constants\StageConstant;
use App\Models\Client;
use App\Models\ClientPreClosingChecklist;
use App\Models\ClientProperty;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Livewire\Component;

class ClientPreClosingComponent extends Component
{
    public  $client;
    public  $component_type = 'client_pre_closing';
    public  $property_info = [
        'purchase_price' => 0,
        'closing_cost'   => 0,
        'closing_credit_general' => 0,
    ];
    public  $client_id;
    public  $title;

    protected $listeners = ['before_closing','set_property_info'];
    public  $exceptArray = [
        'id',
        'applicant_name',
        'applicant_email' ,
        'applicant_phone' ,
        'partner_name',
        'partner_email' ,
        'partner_phone' ,
        'co_applicant_name' ,
        'co_applicant_email' ,
        'co_applicant_phone',
//        'stage',
    ];

    protected $rules = [
        "client.rent" =>'',
        "client.payment_option_3_month" =>'',
        "client.payment_option_6_month" =>'',
        "client.payment_option_12_month" =>'',

        "client.payment_option_date" =>'',
        "client.payment_option_date_checked" =>'',

        "client.letter_of_commitment_checked" =>'',
        "client.on_boarding_fee_payment_checked" =>'',

        "client.inspection_checked" =>'',
//        "client.inspection_check_date" =>'',
        'client.termite_checked' => '',
        'client.termite_paid_by' => '',

        'client.septic_inspection_checked' => '',

        'client.repair_credit_checked' => '',
        'client.repair_credit' => '',

        'client.appraisal_value_checked' => '',
        'client.appraisal_value' => '',

        'client.driver_license_applicant_checked' => '',
        'client.driver_license_co_applicant_checked' => '',
        'client.soc_sec_card_applicant_checked' => '',
        'client.soc_sec_card_co_applicant_checked' => '',

        'client.renter_insurance_checked' => '',
        'client.renter_insurance_name' => '',

        'client.flood_certificate_checked' => '',

        'client.landlord_insurance_checked' => '',

        'client.warranty_checked' => '',
        'client.warranty_company_name' => '',
        'client.warranty_paid_by_seller_checked' => '',


        'client.lease_signed_checked' => '',
        'client.lease_expire_checked' => '',
        'client.lease_expire_date' => '',

//        'client.clear_now_rent_payment_enrollment_check' => '',
//        'client.prorated_rent_check' => '',
//        'client.prorated_rent' => '',

        'client.option_checked' => '',
        'client.other_checked' => '',
        'client.other_value' => '',
    ];
//
//    protected $validationAttributes = [
//        'client.data.additional_tenant_name' => 'Additional Tenant Name',
//        'client.data.mortgage_type' => 'Mortgage Type',
//        'client.data.rental_verification' => 'Rental Verification',
//    ];

    public $property_rules = [
        "house_number_and_street" =>'required'
    ];


    public function mount($client_id = null){
        $this->client_id = $client_id;
        //$this->rules = ClientItemCheckListVariables::getValidationRulesWithoutRequired();
        $this->getClientProperty();




    }

    public function getClientProperty(){
        if($this->client_id) {
            $this->title = 'Item Checklist (Pre Closing)';
            $this->client = ClientPreClosingChecklist::whereClientId($this->client_id)->first();
            if(!$this->client)
                $this->client = new ClientPreClosingChecklist();
        }
        else {
            $this->title = 'Add Client Info';
            $this->client = new ClientPreClosingChecklist();
        }

    }

    public function render()
    {
        return view('livewire.client.item-checklist.pre-closing.master')->extends('layouts.app');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }
//
    public function deal_save(){

    }

    public function set_property_info($key,$val){
            $this->property_info[$key] = $val;

    }

    public function payment_option($values){
        $options_array = ClientItemCheckListVariables::getPaymentOptionList();
        $calculated_payment = $this->property_info['purchase_price'] + $this->property_info['closing_cost'] + $this->property_info['closing_credit_general'];
        foreach ($options_array as $k => $v){
            $key = $v['key'];
            if(array_key_exists($k,array_flip($values))){
                $this->client->$key = round($calculated_payment * ($v['formula']),2);
            }
            else{
                $this->client->$key = null;
            }

        }

    }

    public function book_house(){

        $this->validate(ClientItemCheckListVariables::getValidationRulesForHouseBook());
        $this->client->stage = StageConstant::HOUSE_BOOKED;
        if($this->client->save()){
            return $this->redirect('/items/outstanding/after_dd');
        };
    }

    public function before_closing($type){
        $return = false;
        if($type == $this->component_type) {

//        $this->rules = ClientItemCheckListVariables::getValidationRulesBeforeClosing();
            $this->validate($this->rules);
//        $this->client_property->stage = StageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
            $this->client->client_id = $this->client_id;
            if ($this->client->save()) {
//            $this->client->property->updatOrCreate(['client_id' =>$this->client_id],$this->client->property);
                session()->flash('success', 'Item successfully updated.');
//            return $this->redirect('/items/outstanding/after_dd');
                $return = true;
            };
        }
        return $return;
    }

    public function setCheckListValueAndDate($check){
        if($this->client->$check) {
            $this->client->$check = 1 ;

        }else{
            $this->client->$check = 0 ;
        }

    }




    public function addClient(){
        $this->validate($this->rules);
        $this->client->stage = StageConstant::BEFORE_DUE_DILIGENCE;
        if($this->client->save()){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/items/outstanding/before_dd');
        };
    }

    public function house_book_validate(){
        $this->validate($this->rules);

    }

    public function cancel_house(){
        $reset = array_diff_key($this->client->getAttributes(),array_flip($this->exceptArray));
        if($reset){
            foreach ($reset as $k=> $v){
                $reset[$k] = null;
            }
        }
        //dd($reset);

        $reset['stage'] = StageConstant::HOUSE_CANCELLED;
        //dd($reset,$this->client->id,$this->client->update($reset));
//        $this->client->stage = StageConstant::HOUSE_CANCELLED;
        if($this->client->update($reset)){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/house/cancelled');
        };
    }

    public function cancel_client(){

        $this->client->stage = StageConstant::DROPOUT_CLIENT;
        if($this->client->save()){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/house/dropout');
        };
    }


}
