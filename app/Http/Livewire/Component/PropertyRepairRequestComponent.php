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

class PropertyRepairRequestComponent extends Component
{
    public  $client ,$client_property, $property;
    public  $property_id;
    public  $field;
    public  $wire_id;
    protected  $client_property_pre_closing_handler;

    protected $rules = [
        'property.repair_request_checked_comment'=> '',
        'property.repair_request_checked_at'=> '',
        'property.repair_request_checked_by'=> '',
        'property.repair_request_checked'=> '',
    ];





    public function mount($property_id=null,$field=null){
        $this->wire_id = $this->id;
        $this->property_id = $property_id;
        $this->field = $field;
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler(null,$this->property_id);
        $this->getClientProperty();

    }



    public function hydrate(){
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler(null,$this->property_id);

    }

    public function getClientProperty(){

//        $this->client = $this->client_property_pre_closing_handler->getClient();
          $this->property = $this->client_property_pre_closing_handler->getProperty();
//        $this->client_pre_closing = $this->client_property_pre_closing_handler->getPreClosingList();

    }

    public function render()
    {
        return view('livewire.components.property_repair_request');
    }

    public function markChecklist($model,$check){
        $checked_by = $check.'_by';
        $checked_at = $check.'_at';
        $comment = $check.'_comment';

        if($this->$model->$check) {
            $this->$model->$checked_by = Auth::id() ;
            $this->$model->$checked_at = Carbon::now()->toDateTimeString();
        }else{
            $this->$model->$checked_by = $this->$model->getOriginal($checked_by);
            $this->$model->$checked_at = $this->$model->getOriginal($checked_at);
            $this->$model->$comment    = $this->$model->getOriginal($comment);
        }

    }



    public function save()
    {
        $this->validate();


        if (!$this->client_property_pre_closing_handler->dropClient()) {

//            $this->property->repair_request_checked = 1;
//            $this->property->repair_request_checked_by = Auth::id();
//            $this->property->repair_request_checked_at = Carbon::now()->toDateTimeString();

            $this->client_property_pre_closing_handler->setProperty($this->property);
            if($this->client_property_pre_closing_handler->save()){
                $this->dispatchBrowserEvent("repair-request-{$this->wire_id}",['message' => 'Repair request comment updated successfully.']);
            }

        }
    }



}
