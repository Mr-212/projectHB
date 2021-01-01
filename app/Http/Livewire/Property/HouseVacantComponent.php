<?php

namespace App\Http\Livewire\Property;

use Livewire\Component;

class HouseVacantComponent extends Component
{

    public $show_sold_section = false;
    protected $listeners = ['update_property_status'];

    public function mount($id=null){
        $this->show_sold_section = true;
    }

    public function render()
    {
        return view('livewire.property.house-vacant')->extends('layouts.app');
    }


    public function update_property_status($property_id= 'here'){
        dd($property_id);
    }
}
