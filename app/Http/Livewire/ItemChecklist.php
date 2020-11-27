<?php

namespace App\Http\Livewire;

use App\Constants\Dropdowns\StageConstant;
use App\Models\Client;
use Carbon\Carbon;
use Livewire\Component;

class ItemChecklist extends Component
{
    public  $client;
    public  $client_id;


//    public $client = [
//        'checks' => [
//            'additional_tenant' => '0',
//            'save' => 'no'
//        ],
//         'data' => [
//             'applicant_name'=>'',
//             'applicant_email'=>'',
//             'applicant_phone'=>'',
//             'partner_name'=>'',
//             'partner_email'=>'',
//             'partner_phone'=>'',
//             'co_applicant_name'=>'',
//             'co_applicant_email'=>'',
//             'co_applicant_phone'=>'',
//             'additional_tenant_name' => '',
//             'mortgage_type' => '',
//             'welcome_bonus' => '1',
//
//         ]
//    ];
//    protected $rules = [
//        'client.data.additional_tenant_name' => 'required|string',
//        'client.data.mortgage_type' => 'required|not_in:0',
//        'client.data.rental_verification' => 'required',
//
//    ];

    protected $rules = [
        'client.additional_tenant_check' => '',
        'client.additional_tenant_name' => '',
        'client.mortgage_type_id' => '',

        'client.rental_verification_complete_check' => '',
        'client.rental_verification_check' => '',
        'client.welcome_down_payment' => '',
        'client.welcome_down_payment_complete_check' => '',
//        'client.welcome_down_payment_complete_check_date' => '',

        'client.property_new_construction_check' =>'',
        "client.property_new_construction_builder_name" =>'',
        "client.property_country" =>'required|string',
        "client.property_state" =>'required|string',
        "client.property_city" =>'required|string',
        "client.property_zip" =>'required|integer',

        "client.property_purchase_price" => 'required|integer',
        "client.property_closing_cost" => 'required|integer',
        "client.property_closing_credit_general" => '',

        "client.property_hoa_check" => '',
        "client.property_hoa_name" => '',
        "client.property_hoa_phone" => '',

        "client.property_repair_request_check" => '',
        "client.property_repair_request_item_names" => '',

        "client.property_lender_check" => '',
        "client.property_lender_name" => '',

        "client.property_closing_date_complete_check" => '',
        "client.property_closing_date" => '',

        "client.property_due_diligence_expire_complete_check" => '',
        "client.property_due_diligence_expire" => '',



    ];
//
//    protected $validationAttributes = [
//        'client.data.additional_tenant_name' => 'Additional Tenant Name',
//        'client.data.mortgage_type' => 'Mortgage Type',
//        'client.data.rental_verification' => 'Rental Verification',
//    ];

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

    public function mount($client_id){

        $this->client = Client::find($this->client_id);
        //dd($this->client);
        $this->client_id = $client_id;

    }

//    public function hydrate(){
//
//        if($this->client['checks']['additional_tenant'] == 'no') {
//            $this->client['data']['additional_tenant_name'] = '';
//        }
//
//    }

//    public function getClientProperty(){
//        return $this->client = Client::find($this->client_id);
//    }

    public function render()
    {
        return view('livewire.item-checklist')->extends('layouts.app');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }
//
    public function deal_save(){
        //$this->validate($this->rules,$this->additional_tenant_name);

//        if($this->deal['checks']['save'] == 'yes')
//            dd($this->deal);
    }

    public function book_house(){
        $this->validate($this->rules);

    }

    public function before_closing(){


//        dd('here');
        $this->validate($this->rules);
        $this->client->stage = StageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
        if($this->client->save()){
            return $this->redirect('/items/outstanding/after_dd');
        };
    }

    public function setCheckListValueAndDate($check,$checkDate = null){
//        $checkDate = $check.'_date';
//        dd($check);
        if($this->client->$check) {
            $this->client->$check = 1 ;

//            $this->client->$checkDate = Carbon::now()->toDateTimeString();
        }else{
            $this->client->$check = 0 ;
        }

    }
}
