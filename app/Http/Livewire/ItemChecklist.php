<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemChecklist extends Component
{
    private $item_id;

    public $deal = [
        'checks' => [
            'additional_tenant' => 'no',
            'save' => 'no'
        ],
         'data' => [
         'additional_tenant_name' => '',
         'mortgage_type' => '',
        ' welcome_bonus' => 'yes',

         ]
    ];
    protected $rules = [
        'deal.data.additional_tenant_name' => 'required|min:6',

    ];

    public $item_checklist = [''];

    public function mount($item_id){
        $this->item_id = $item_id;

    }

    public function hydrate(){

        if($this->deal['checks']['additional_tenant'] == 'no') {
            $this->deal['data']['additional_tenant_name'] = '';
        }

    }

    public function render()
    {
        return view('livewire.item-checklist')->extends('layouts.app');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }
//
    public function deal_save(){
        dd($this->validate());
//        if($this->deal['checks']['save'] == 'yes')
//            dd($this->deal);
    }

    public function book_house(){


    }
}
