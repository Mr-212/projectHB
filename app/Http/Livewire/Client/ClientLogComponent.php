<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\ClientLogs;

class ClientLogComponent extends Component
{
    public $client_id ;

    public function mount($client_id){
        $this->client_id = $client_id;

    }
    public function render()
    {
        return view('livewire.client.client-log-compnent')->extends('layouts.app');
    }
}
