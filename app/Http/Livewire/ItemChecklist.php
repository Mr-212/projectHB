<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemChecklist extends Component
{
    private $item_id;

    public function mount($item_id){
        $this->item_id = $item_id;

    }

    public function render()
    {
        return view('livewire.item-checklist')->extends('layouts.app');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }
//
//    public function new_construction($val){
//        dd($val);
//    }
}
