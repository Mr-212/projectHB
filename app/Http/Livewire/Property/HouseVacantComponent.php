<?php

namespace App\Http\Livewire\Property;

use Livewire\Component;

class HouseVacantComponent extends Component
{


    public function mount($id = null){

    }

    public function hydrate(){

    }

    public function render()
    {
        return view('livewire.property.house-vacant')->extends('layouts.app');
    }



}
