<?php

namespace App\Http\Livewire\Client\ItemChecklist;

use App\Constants\StageConstant;
use App\Models\Client;
use App\Models\ClientProperty;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Livewire\Component;

class ClientPreClosingComponent extends Component
{
    public  $client ,$client_property;
    public  $client_id;
    public  $title;

    protected $listeners = ['before_closing'];
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
            $this->client_property = ClientProperty::whereClientId($this->client_id)->first();
            if(!$this->client_property)
                $this->client_property = new ClientProperty();
        }
        else {
            $this->title = 'Add Client Info';
            $this->client_property = new ClientProperty();
        }

    }

    public function render()
    {
        return view('livewire.client.item-checklist-child.property1');
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

    public function before_closing(){
//        $this->rules = ClientItemCheckListVariables::getValidationRulesBeforeClosing();
        $this->validate($this->rules);
//        $this->client_property->stage = StageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
        $this->client_property->client_id = $this->client_id;
        if($this->client_property->save()){
//            $this->client->property->updatOrCreate(['client_id' =>$this->client_id],$this->client->property);
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
