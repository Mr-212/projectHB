<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HouseCancelled extends Component
{
    public function render()
    {
        return view('livewire.house-cancelled')->extends('layouts.app');
    }
}
