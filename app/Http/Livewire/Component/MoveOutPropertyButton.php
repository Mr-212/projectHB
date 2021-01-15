<?php

namespace App\Http\Livewire\Component;

use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use App\RepoHandlers\ClientPropertyChecklistHandler;
use Livewire\Component;

class MoveOutPropertyButton extends Component
{
    public  $client ,$client_property, $property;
    public  $client_id, $property_id;
    public  $title;
    protected  $client_property_pre_closing_handler;

    protected $listeners = ['move_out_property'];






    public function mount($property_id, $client_id =null){
        $this->client_id = $client_id;
        $this->property_id = $property_id;
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($this->client_id,$this->property_id);
        $this->getClientProperty();

    }



    public function hydrate(){
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($this->client_id, $this->property_id);

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
        //$this->client_pre_closing = $this->client_property_pre_closing_handler->getPreClosingList();

    }

    public function render()
    {
        $wire_id = $this->id;
        return view('livewire.components.move-out');
    }



    public function move_out_property()
    {
//        if(!$this->client->is_client_dropped) {
            if ($this->client_property_pre_closing_handler->movePropertyToEvictionAndVacant()) {
                $this->redirect('/house/vacant');
//            }
        }
//            else{
//              $this->dispatchBrowserEvent("dropout-response-{$this->property_id}",['message' => 'This client is already added to dropouts']);
//        }
    }



}
