<?php

namespace App\Http\Livewire\Component;

use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use App\RepoHandlers\ClientPropertyChecklistHandler;
use Livewire\Component;

class PropertyRepairRequestComponent extends Component
{
    public  $client ,$client_property, $property;
    public  $client_id, $property_id;
    public  $title,$field;
    protected  $client_property_pre_closing_handler;

    protected $rules = [

    ];





    public function mount($client_id=null,$field=null){
        $this->client_id = $client_id;
        $this->field = $field;
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($this->client_id,$this->property_id);
        $this->getClientProperty();

    }



    public function hydrate(){
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($this->client_id,$this->property_id);

    }

    public function getClientProperty(){
        if($this->client_id) {
            $this->title = 'Item Checklist (Pre Closing)';
        }
        else {
            $this->title = 'Add Client Info';
        }
        $this->client = $this->client_property_pre_closing_handler->getClient();
        $this->property = $this->client_property_pre_closing_handler->getProperty();
//        $this->client_pre_closing = $this->client_property_pre_closing_handler->getPreClosingList();

    }

    public function render()
    {
        return view('livewire.components.property_repair_request');
    }



    public function save()
    {
        if (!$this->client_property_pre_closing_handler->dropClient()) {


        }
    }



}
