<?php

namespace App\Http\Livewire\Property\ItemChecklist;

use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Livewire\Component;

class PropertyHouseSoldComponent extends Component
{
    public  $client ,$client_property;
    public  $client_id, $property_id;
    public  $title;



    protected $rules = [

    ];
//
//    protected $validationAttributes = [
//        'client.data.additional_tenant_name' => 'Additional Tenant Name',
//        'client.data.mortgage_type' => 'Mortgage Type',
//        'client.data.rental_verification' => 'Rental Verification',


    public function mount($property_id = null){
        $this->property_id = $property_id;
        $this->getClientProperty();




    }



    public function hydrate(){

    }

    public function getClientProperty(){

    }

    public function render()
    {
        return view('livewire.property.itemchecklist.property-sold');
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
        $this->client->stage = PropertyStatusConstant::HOUSE_BOOKED;
        if($this->client->save()){
//            return $this->redirect('/items/outstanding/after_dd');
        };
    }

    public function before_closing(){
        $return = false;

            $this->validate($this->rules);
            $this->client->stage = PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
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
        $this->client->stage = PropertyStatusConstant::BEFORE_DUE_DILIGENCE;
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

        $reset['stage'] = PropertyStatusConstant::HOUSE_CANCELLED;
        //dd($reset,$this->client->id,$this->client->update($reset));
//        $this->client->stage = PropertyStatusConstant::HOUSE_CANCELLED;
        if($this->client->update($reset)){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/house/cancelled');
        };
    }

    public function cancel_client(){
        $this->client->stage = PropertyStatusConstant::DROPOUT_CLIENT;
        if($this->client->save()){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/house/dropout');
        };
    }


}
