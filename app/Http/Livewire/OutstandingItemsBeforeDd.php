<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OutstandingItemsBeforeDd extends Component
{
    public $title;
    public $item_checked_at = null;
    public $add_comment = null;
    public function mount($type)
    {
        $this->setTitle($type);

    }
    public function render()
    {
        return view('livewire.outstanding-items-before-dd')
            ->extends('layouts.app');
    }

    private function setTitle($type){
        if($type == 'before_dd')
            $this->title = 'Outstanding Items Before Due Diligence';
        if($type == 'after_dd')
            $this->title = 'Outstanding Items After Due Diligence';
    }

}
