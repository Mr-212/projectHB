<?php

namespace App\Http\Livewire\Client;

use App\Constants\ClientStatusConstant;
use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Livewire\Component;
use App\RepoHandlers\ClientPropertyChecklistHandler;
use Illuminate\Validation\ValidationException;

class AddClientComponent extends Component
{
    public  $client,$property;
    public  $client_id,$property_id;
    public $type = 'edit';
    public $title = "Client Info";
    protected  $client_property_pre_closing_handler = null;

    protected $rules = [
        'client.applicant_name' => 'required|string',
        'client.applicant_email' =>'required|email',
        'client.applicant_phone' =>'required',
        'client.partner_name' =>'string',
        'client.partner_email' =>'email',
        'client.partner_phone' =>'',
        'client.co_applicant_name' =>'string',
        'client.co_applicant_email' =>'',
        'client.co_applicant_phone' =>'',

        // 'client.additional_tenant_check' => '',
        // 'client.additional_tenant_name' => '',
        // 'client.mortgage_type_id' => '',
//         'client.rental_verification_checked' => '',
//         'client.rental_verification_checked_by' => '',
//         'client.rental_verification_checked_at' => '',
//         'client.rental_verification_checked_comment' => '',
// //        'client.rental_verification_check' => '',
// //        'client.welcome_down_payment' => '',
//         'client.welcome_payment_checked' => '',
//         'client.welcome_payment_checked_by' => '',
//         'client.welcome_payment_checked_at' => '',
//         'client.welcome_payment_checked_comment' => '',

    ];
//
//    protected $validationAttributes = [
//        'client.data.additional_tenant_name' => 'Additional Tenant Name',
//        'client.data.mortgage_type' => 'Mortgage Type',
//        'client.data.rental_verification' => 'Rental Verification',
//    ];



    public function mount($client_id = null, $property_id = null){
        // dd('in mount..');
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($client_id,$property_id);
        $this->getClientProperty();
    }

    public function hydrate(){
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($this->client_id,$this->property_id);
    }

    public function getClientProperty(){
        $this->client =  $this->client_property_pre_closing_handler->getClient();
        // $this->property =  $this->client_property_pre_closing_handler->getProperty();

    }

    public function render()
    {
        return view('livewire.client.add-client')->extends('layouts.app');
    }

    public function updateClient(){

        try {
            // $this->validate(ClientItemCheckListVariables::validateClientRules());
            $this->client->status = ClientStatusConstant::CLIENT_ACTIVE;
            $this->client_property_pre_closing_handler->setClient($this->client);
            if ($this->client->save()) {
                session()->flash('success', 'Item successfully updated.');
                return $this->redirect('/clients');
            };
        }catch (ValidationException $e){
            throw $e;

        }catch (\Exception $e){
            report($e);
            dd($e);
        }
    }

}
