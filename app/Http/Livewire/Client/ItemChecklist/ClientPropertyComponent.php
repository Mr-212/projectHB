<?php

namespace App\Http\Livewire\Client\ItemChecklist;

use App\Constants\StageConstant;
use App\Models\Client;
use App\Models\ClientProperty;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Livewire\Component;

class ClientPropertyComponent extends Component
{
    public  $client ,$client_property;
    public  $client_id;
    public  $title;
    public  $component_type = 'client_property';

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
        'client_property.house_number_and_street' =>'',

        'client_property.new_construction_check' =>'',
        "client_property.new_construction_builder" =>'',

        "client_property.county" =>'string',
        "client_property.state" =>'string',
        "client_property.city" =>'string',
        "client_property.zip" =>'string',

        "client_property.purchase_price" => 'integer',
        "client_property.closing_cost" => 'integer',
        "client_property.closing_credit_general" => '',
        "client_property.annual_property_tax" => '',

        "client_property.hoa_check" => '',
        "client_property.hoa_name" => '',
        "client_property.hoa_phone" => '',
//
//        "client_property.repair_request_check" => '',
//        "client_property.repair_request_item_names" => '',

        "client_property.lender_check" => '',
        "client_property.lender_name" => '',

        "client_property.closing_date" => '',
        "client_property.due_diligence_expire_date" => '',
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
        $this->getClientProperty();
        $this->update_client_pre_closing();

    }


    public function hydrate(){
        $this->update_client_pre_closing();

//        if($this->client_property->isDirty('closing_cost')) {
//            $this->emit('set_property_info','closing_cost' ,$this->client_property->closing_cost);
//        }
//        if($this->client_property->isDirty('purchase_price')) {
//            $this->emit('set_property_info','purchase_price' ,$this->client_property->purchase_price);
//        }
//        if($this->client_property->isDirty('closing_credit_general')) {
//            $this->emit('set_property_info','closing_credit_general' ,$this->client_property->closing_credit_general);
//        }

    }

    public function update_client_pre_closing(){
            $this->emit('set_property_info','closing_cost' ,$this->client_property->closing_cost);
            $this->emit('set_property_info','purchase_price' ,$this->client_property->purchase_price);
            $this->emit('set_property_info','closing_credit_general' ,$this->client_property->closing_credit_general);

    }

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
        return view('livewire.client.item-checklist.property1');
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

    public function before_closing($type){
        $return = false;
        if($type == $this->component_type) {
            $this->validate($this->rules);
//        $this->client_property->stage = StageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
            $this->client_property->client_id = $this->client_id;
            if ($this->client_property->save()) {
//            $this->client->property->updatOrCreate(['client_id' =>$this->client_id],$this->client->property);
                session()->flash('success', 'Item successfully updated.');
                //return $this->redirect('/items/outstanding/after_dd');
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
