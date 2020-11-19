<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemChecklist extends Component
{
    private $item_id;

    public $client = [
        'checks' => [
            'additional_tenant' => '0',
            'save' => 'no'
        ],
         'data' => [
             'applicant_name'=>'',
             'applicant_email'=>'',
             'applicant_phone'=>'',
             'partner_name'=>'',
             'partner_email'=>'',
             'partner_phone'=>'',
             'co_applicant_name'=>'',
             'co_applicant_email'=>'',
             'co_applicant_phone'=>'',
             'additional_tenant_name' => '',
             'mortgage_type' => '',
             'welcome_bonus' => '1',

         ]
    ];
    protected $rules = [
        'client.data.additional_tenant_name' => 'required|string',
        'client.data.mortgage_type' => 'required|not_in:0',
        'client.data.rental_verification' => 'required',

    ];

    protected $validationAttributes = [
        'client.data.additional_tenant_name' => 'Additional Tenant Name',
        'client.data.mortgage_type' => 'Mortgage Type',
        'client.data.rental_verification' => 'Rental Verification',
    ];

    public $item_checklist = [
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

    public function mount($item_id){
        $this->item_id = $item_id;

    }

    public function hydrate(){

        if($this->client['checks']['additional_tenant'] == 'no') {
            $this->client['data']['additional_tenant_name'] = '';
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

    public function before_closing(){
        dd($this->client['data']);
    }
}
