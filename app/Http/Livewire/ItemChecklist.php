<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemChecklist extends Component
{
    private $item_id;
    public  $additional_tenant_name;

    public $deal = [
        'checks' => [
            'additional_tenant' => '0',
            'save' => 'no'
        ],
         'data' => [
             'additional_tenant_name' => '',
             'mortgage_type' => '',
             'welcome_bonus' => '1',
             'rental_verification' =>''

         ]
    ];
    protected $rules = [
        'deal.data.additional_tenant_name' => 'required|string',
        'deal.data.mortgage_type' => 'required|not_in:0',
        'deal.data.rental_verification' => 'required',

    ];

    protected $validationAttributes = [
        'deal.data.additional_tenant_name' => 'Additional Tenant Name',
        'deal.data.mortgage_type' => 'Mortgage Type',
        'deal.data.rental_verification' => 'Rental Verification',
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
        $this->validate($this->rules,$this->additional_tenant_name);

//        if($this->deal['checks']['save'] == 'yes')
//            dd($this->deal);
    }

    public function book_house(){
        $this->validate($this->rules);

    }
}
