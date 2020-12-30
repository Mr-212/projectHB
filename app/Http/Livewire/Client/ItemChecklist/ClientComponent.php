<?php

namespace App\Http\Livewire\Client\ItemChecklist;

use App\Constants\StageConstant;
use App\Models\Client;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Livewire\Component;

class ClientComponent extends Component
{
    public  $client ,$client_property;
    public  $client_id;
    public  $title;
    public  $component_type = 'client';

    protected $listeners = ['before_closing','book_house'];
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
//        'client.rental_verification_check' => '',
//        'client.welcome_down_payment' => '',
        'client.welcome_down_payment_complete_check' => '',


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
            $this->client = Client::find($this->client_id);
            //dd($this->client->property);
            $this->client_property = $this->client->property;
        }
        else {
            $this->title = 'Add Client Info';
            $this->client = new Client();
        }

    }

    public function render()
    {
        return view('livewire.client.item-checklist.client');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }
//
    public function deal_save(){

    }

    public function book_house(){

//        $this->validate(ClientItemCheckListVariables::getValidationRulesForHouseBook());
        $this->validate();
        $this->client->stage = StageConstant::HOUSE_BOOKED;
        if($this->client->save()){
//            return $this->redirect('/items/outstanding/after_dd');
        };
    }

    public function before_closing(){
        $return = false;

            $this->validate($this->rules);
            $this->client->stage = StageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
            if ($this->client->save()) {
//            $this->client->property->updatOrCreate(['client_id' =>$this->client_id],$this->client->property);
                session()->flash('success', 'Item successfully updated.');
                $return = true;
                //return $this->redirect('/items/outstanding/after_dd');
            };

        $this->emit('child_component_update','client_updated',$return);
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
