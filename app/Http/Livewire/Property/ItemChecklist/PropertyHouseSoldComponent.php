<?php

namespace App\Http\Livewire\Property\ItemChecklist;

use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use App\RepoHandlers\ClientPropertyChecklistHandler;
use Livewire\Component;

class PropertyHouseSoldComponent extends Component
{
    public  $client,$property;
    public  $client_id, $property_id;
    protected  $client_property_pre_closing_handler = null;

    protected $rules = [
        'property.sold_price' => 'required|integer',
        'property.sold_date' => 'required|string',
        ];

    public function mount($property_id){
        $this->property_id = $property_id;
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler(null,$property_id);
        $this->getClientProperty();
    }



    public function hydrate(){
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler(null,$this->property_id);
    }

    public function getClientProperty(){
        $this->property = $this->client_property_pre_closing_handler->getProperty();
    }

    public function render()
    {
        return view('livewire.property.itemchecklist.property-sold');
    }

    public function property_sold(){
        $this->validate();
        try {
            $this->property->property_status_id = PropertyStatusConstant::HOUSE_SOLD;
            if ($this->property->save()) {
                $this->dispatchBrowserEvent("property-sold-{$this->property_id}", ['error' => false, 'message' => 'House successfully moved to sold section.']);
                sleep(0.5);
                return $this->redirect('/house/sold');
            }
        }catch (\Throwable $e){
            report($e);
        }


    }



}
