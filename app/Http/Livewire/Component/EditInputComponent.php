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

class EditInputComponent extends Component
{
    public  $client ,$client_property, $object;
    public  $property_id;
    public  $key,$input_type,$value,$object_type;
    public  $wire_id;
    protected  $client_property_pre_closing_handler;

//    protected $rules = [
//        'property.repair_request_checked_comment'=> '',
//        'property.repair_request_checked_at'=> '',
//        'property.repair_request_checked_by'=> '',
//        'property.repair_request_checked'=> '',
//    ];





    public function mount($input_type, $key, $value, $property_id,$object_type){
        $this->wire_id = $this->id;

        $this->property_id = $property_id;
        $this->key = $key;
        $this->value = $value;
        $this->object_type = $object_type;
        $this->input_type = $input_type;
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler(null,$this->property_id);
        $this->getClientProperty();

    }



    public function hydrate(){
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler(null,$this->property_id);

    }

    public function getClientProperty(){

//        $this->client = $this->client_property_pre_closing_handler->getClient();
        if($this->property_id) {
            if($this->object_type == 'property')
                $this->object = $this->client_property_pre_closing_handler->getProperty();
            if($this->object_type == 'pre_closing')
                $this->object = $this->client_property_pre_closing_handler->getPreClosingList();
        }
//        $this->client_pre_closing = $this->client_property_pre_closing_handler->getPreClosingList();

    }

    public function render()
    {
        return view('livewire.components.edit-input-component');
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
//        $this->validate();
        if($this->value) {
            $key = $this->key;
            $this->object->$key = $this->value;
            if($this->object_type == 'property')
                $this->client_property_pre_closing_handler->setProperty($this->object);
            if($this->object_type == 'pre_closing')
                $this->client_property_pre_closing_handler->setPreClosingList($this->object);
            if ($this->client_property_pre_closing_handler->save()) {
                $this->dispatchBrowserEvent("input-{$this->wire_id}", ['message' => 'Value updated to '.$this->value. ' successfully.']);
            }
        }else{
            $this->dispatchBrowserEvent("input-{$this->wire_id}", ['message' => 'Value must be greater than 0']);

        }


    }



}
