<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;
use App\Models\ClientLogs;

class ClientPropertyChecklistLogComponent extends Component
{
    public $client_id,$property_id;

    public function mount($client_id =null , $property_id = null){

        $this->client_id = $client_id;
        $this->property_id = $property_id;

    }
    public function render()
    {
        return view('livewire.components.client-property-checklist-log')->extends('layouts.app');
    }
}
