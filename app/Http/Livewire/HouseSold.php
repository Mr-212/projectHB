<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HouseSold extends Component
{

    public function mount(){

    }

    public function render()
    {
        return view('livewire.property.house-sold')->extends('layouts.app');
    }
}
