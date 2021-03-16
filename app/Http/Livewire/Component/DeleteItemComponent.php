<?php

namespace App\Http\Livewire\Component;

use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use App\RepoHandlers\ClientPropertyChecklistHandler;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteItemComponent extends Component
{
    public  $client,$property;
    public  $client_id, $property_id;
    protected  $client_property_pre_closing_handler = null;

    protected $listeners = ['delete'];

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
        return view('livewire.components.delete-item');
    }

    public function delete(){

        try {
            $is_deleted = $this->property->delete();
            if($is_deleted)
                $this->dispatchBrowserEvent("delete-response-{$this->property_id}", ['message' => 'Property deleted successfully.']);

        }catch (\Throwable $e){
            report($e);
        }
    }



}
