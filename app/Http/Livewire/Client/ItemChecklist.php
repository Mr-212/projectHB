<?php
namespace App\Http\Livewire\Client;

use App\Constants\StageConstant;
use App\Models\Client;
use App\Models\ClientProperty;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Livewire\Component;

class ItemChecklist extends Component
{
    public  $client ,$client_property;
    public  $client_id;
    public  $title;
    protected $listeners = ['child_update'];
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
        'client.applicant_name'=>'required|string',
        'client.applicant_email' =>'required|email',
        'client.applicant_phone' =>'required',
        'client.partner_name' =>'string',
        'client.partner_email' =>'email',
        'client.partner_phone' =>'',
        'client.co_applicant_name' =>'string',
        'client.co_applicant_email' =>'',
        'client.co_applicant_phone' =>'',

        'client.additional_tenant_check' => '',
        'client.additional_tenant_name' => '',
        'client.mortgage_type_id' => '',
        'client.rental_verification_complete_check' => '',
        'client.rental_verification_check' => '',
        'client.welcome_down_payment' => '',
        'client.welcome_down_payment_complete_check' => '',

        'client_property.house_number_and_street' =>'',
//        'client.property_new_construction_check' =>'',
//        "client.property_new_construction_builder_name" =>'',
//        "client.property_country" =>'string',
//        "client.property_state" =>'string',
//        "client.property_city" =>'string',
//        "client.property_zip" =>'integer',
//
//        "client.property_purchase_price" => 'integer',
//        "client.property_closing_cost" => 'integer',
//        "client.property_closing_credit_general" => '',
//        "client.property_annual_property_tax" => '',
//
//        "client.property_hoa_check" => '',
//        "client.property_hoa_name" => '',
//        "client.property_hoa_phone" => '',
//
//        "client.property_repair_request_check" => '',
//        "client.property_repair_request_item_names" => '',
//
//        "client.property_lender_check" => '',
//        "client.property_lender_name" => '',
//
//        "client.property_closing_date_complete_check" => '',
//        "client.property_closing_date" => '',
//
//        "client.property_due_diligence_expire_complete_check" => '',
//        "client.property_due_diligence_expire" => '',

        "client.due_diligence_rent" =>'',
        "client.due_diligence_option_payment_check" =>'',
        "client.due_diligence_option_payment_3_month" =>'',
        "client.due_diligence_option_payment_6_month" =>'',
        "client.due_diligence_option_payment_12_month" =>'',
        "client.due_diligence_option_payment_date" =>'',

        "client.letter_of_commitment_signed" =>'',
        "client.on_boarding_fee_payment_check" =>'',



        "client.due_diligence_inspection_check" =>'',
        "client.due_diligence_inspection_check_date" =>'',

        'client.appraisal_value_check' => '',
        'client.appraisal_value' => '',

        'client.driver_license_applicant' => '',
        'client.driver_license_co_applicant' => '',
        'client.soc_sec_card_applicant' => '',
        'client.soc_sec_card_co_applicant' => '',

        'client.renter_insurance_check' => '',
        'client.renter_insurance_company_name' => '',

        'client.flood_certificate_check' => '',
        'client.landlord_insurance_check' => '',

        'client.warranty_check' => '',
        'client.warranty_company_name' => '',

        'client.warranty_paid_by_seller_check' => '',

        'client.lease_check' => '',
        'client.lease_expire_date' => '',

        'client.termite_check' => '',
        'client.termite_paid_by' => '',

        'client.septic_inspection_check' => '',
        'client.clear_now_rent_payment_enrollment_check' => '',
        'client.prorated_rent_check' => '',
        'client.prorated_rent' => '',
        'client.other_check' => '',
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



//    public function hydrate(){
//
//        if($this->client['checks']['additional_tenant'] == 'no') {
//            $this->client['data']['additional_tenant_name'] = '';
//        }
//
//    }

    public function getClientProperty(){
        if($this->client_id) {
            $this->title = 'Item Checklist (Pre Closing)';
            $this->client = Client::with('property')->find($this->client_id);
            $this->client_property= !empty($this->client->property) ? $this->client->property: new ClientProperty();
//            dd($this->client->property);
        }
        else {
            $this->title = 'Add Client Info';
            $this->client = new Client();
        }

    }

    public function render()
    {
        return view('livewire.client.item-checklist.master')->extends('layouts.app');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }
//
    public function deal_save(){

    }

    public function book_house(){

        $this->validate(ClientItemCheckListVariables::getValidationRulesForHouseBook());
        $this->client->stage = StageConstant::HOUSE_BOOKED;
        if($this->client->save()){
            return $this->redirect('/items/outstanding/after_dd');
        };
    }

//    public function before_closing(){
////        $this->rules = ClientItemCheckListVariables::getValidationRulesBeforeClosing();
//        dd($this->client);
//        $this->validate($this->rules);
//        $this->client->stage = StageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
//        if($this->client->save()){
////            $this->client->property->updatOrCreate(['client_id' =>$this->client_id],$this->client->property);
//            session()->flash('success', 'Item successfully updated.');
//            return $this->redirect('/items/outstanding/after_dd');
//        };
//    }
  public function child_update($key,$value){

  }
    public function before_closing(){


        dd($this->emit('before_closing','client'));
//        die();
        if($this->emit('before_closing','client') && $this->emit('before_closing','client_property') && $this->emit('before_closing','client_pre_closing')){
            session()->flash('success', 'Item successfully updated.');
           return $this->redirect('/items/outstanding/after_dd');
        };
    }

    public function setCheckListValueAndDate($check){
        if($this->client->$check) {
            $this->client->$check = 1 ;

        }else{
            $this->client->$check = 0 ;
        }

    }

//    public function payment_option($values){
//         $options_array = $this->client->getPaymentOptionList();
//          $calculated_payment = $this->client->property_purchase_price + $this->client->property_pclosing_cost + $this->client->prooerty_closing_credit_general;
//            foreach ($options_array as $k => $v){
//                if(array_key_exists($k,array_flip($values))){
//                    if($k == 1)
//                        $this->client->$v = round($calculated_payment * 1.03,2);
//                    if($k == 2)
//                        $this->client->$v = round($calculated_payment * 1.06,2);
//                    if($k == 3)
//                        $this->client->$v = round($calculated_payment * 1.1,2);
//                }else{
//                    $this->client->$v = null;
//                }
//
//
//            }
//
//    }
    public function payment_option($values){
         $options_array = $this->client->getPaymentOptionList();
          $calculated_payment = $this->client->property_purchase_price + $this->client->property_pclosing_cost + $this->client->prooerty_closing_credit_general;
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
