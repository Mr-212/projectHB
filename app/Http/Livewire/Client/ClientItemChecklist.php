<?php
namespace App\Http\Livewire\Client;

use App\Constants\ClientStatusConstant;
use App\Constants\PropertyStatusConstant;
use App\Models\Client;
use App\Models\PropertyPreClosingChecklist;
use App\Models\ClientProperty;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use App\RepoHandlers\ClientPropertyChecklistHandler;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ClientItemChecklist extends Component
{
    public  $client ,$property, $client_pre_closing,$client_property;
    public  $client_id,$property_id, $property_status,$client_property_id;
    public  $title, $new_property;
    protected  $client_property_pre_closing_handler = null;

    protected $listeners = ['cancel_client'=>'cancel_client'];



    public  $exceptArray = [
        'id',
        'applicant_name',
        'applicant_email' ,
        'applicant_phone' ,
        'partner_name',
        'partner_email' ,
        'partner_phone' ,
        'co_applicant_name' ,
        'co_applicant_email' ,
        'co_applicant_phone',
//        'stage',
        ];

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

        'client.additional_tenant_check' => '',
        'client.additional_tenant_name' => '',
        'client.mortgage_type_id' => '',
        'client.rental_verification_checked' => '',
        'client.rental_verification_checked_by' => '',
        'client.rental_verification_checked_at' => '',
        'client.rental_verification_checked_comment' => '',
//        'client.rental_verification_check' => '',
//        'client.welcome_down_payment' => '',
        'client.welcome_payment_checked' => '',
        'client.welcome_payment_checked_by' => '',
        'client.welcome_payment_checked_at' => '',
        'client.welcome_payment_checked_comment' => '',


        //client property rules

        "property.deal_save_checked" =>'',
        "property.deal_save_checked_by" =>'',
        "property.deal_save_checked_at" =>'',
        "property.deal_save_checked_comment" =>'',




        'property.new_construction_check' =>'',
        "property.new_construction_builder" =>'',
        'property.house_number_and_street' =>'required',
        "property.county" =>'string',
        "property.state" =>'string|required',
        "property.city" =>'string|required',
        "property.zip" =>'string',

        "property.purchase_price" => 'integer',
        "property.closing_cost" => 'integer',
        "property.closing_credit_general" => '',
        "property.annual_property_tax" => '',

        "property.hoa_check" => '',
        "property.hoa_name" => '',
        "property.hoa_phone" => '',
//
//        "property.repair_request_check" => '',
//        "property.repair_request_item_names" => '',

        "property.lender_check" => '',
        "property.lender_name" => '',

        "property.closing_date" => '',
        "property.due_diligence_expire_date" => '',


        //pre c;osing rules
        "client_pre_closing.rent" =>'',
        "client_pre_closing.payment_option_select_checked" =>'',
        "client_pre_closing.payment_option_3_month" =>'',
        "client_pre_closing.payment_option_6_month" =>'',
        "client_pre_closing.payment_option_12_month" =>'',

        "client_pre_closing.payment_option_date" =>'',
        "client_pre_closing.payment_option_date_checked" =>'',

        "client_pre_closing.letter_of_commitment_checked" =>'',
        "client_pre_closing.letter_of_commitment_checked_at" =>'',
        "client_pre_closing.letter_of_commitment_checked_by" =>'',

        "client_pre_closing.on_boarding_fee_payment_checked" =>'',
        "client_pre_closing.on_boarding_fee_payment_checked_at" =>'',
        "client_pre_closing.on_boarding_fee_payment_checked_by" =>'',

        "client_pre_closing.inspection_checked" =>'',
        "client_pre_closing.inspection_checked_at" =>'',
        "client_pre_closing.inspection_checked_by" =>'',

//        "client_pre_closing.inspection_check_date" =>'',
        'client_pre_closing.termite_checked' => '',
        'client_pre_closing.termite_checked_by' => '',
        'client_pre_closing.termite_checked_at' => '',
        'client_pre_closing.termite_paid_by' => '',

        'client_pre_closing.septic_inspection_checked' => '',

        'client_pre_closing.repair_credit_checked' => '',
        'client_pre_closing.repair_credit' => '',

        'client_pre_closing.appraisal_value_checked' => '',
        'client_pre_closing.appraisal_value_checked_by' => '',
        'client_pre_closing.appraisal_value_checked_at' => '',
        'client_pre_closing.appraisal_value' => '',

        'client_pre_closing.driver_license_applicant_checked' => '',
        'client_pre_closing.driver_license_applicant_checked_at' => '',
        'client_pre_closing.driver_license_applicant_checked_by' => '',

        'client_pre_closing.driver_license_co_applicant_checked' => '',
        'client_pre_closing.driver_license_co_applicant_checked_at' => '',
        'client_pre_closing.driver_license_co_applicant_checked_by' => '',

        'client_pre_closing.soc_sec_card_applicant_checked' => '',
        'client_pre_closing.soc_sec_card_applicant_checked_at' => '',
        'client_pre_closing.soc_sec_card_applicant_checked_by' => '',

        'client_pre_closing.soc_sec_card_co_applicant_checked' => '',
        'client_pre_closing.soc_sec_card_co_applicant_checked_at' => '',
        'client_pre_closing.soc_sec_card_co_applicant_checked_by' => '',

        'client_pre_closing.renter_insurance_checked' => '',
        'client_pre_closing.renter_insurance_checked_at' => '',
        'client_pre_closing.renter_insurance_checked_by' => '',
        'client_pre_closing.renter_insurance_name' => '',

        'client_pre_closing.flood_certificate_checked' => '',
        'client_pre_closing.flood_certificate_checked_at' => '',
        'client_pre_closing.flood_certificate_checked_by' => '',

        'client_pre_closing.landlord_insurance_checked' => '',
        'client_pre_closing.landlord_insurance_checked_at' => '',
        'client_pre_closing.landlord_insurance_checked_by' => '',

        'client_pre_closing.warranty_checked' => '',
        'client_pre_closing.warranty_checked_at' => '',
        'client_pre_closing.warranty_checked_by' => '',

        'client_pre_closing.warranty_company_name' => '',
        'client_pre_closing.warranty_paid_by_seller_checked' => '',


        'client_pre_closing.lease_signed_checked' => '',
        'client_pre_closing.lease_signed_checked_at' => '',
        'client_pre_closing.lease_signed_checked_by' => '',

        'client_pre_closing.lease_expire_checked' => '',
        'client_pre_closing.lease_expire_date' => '',

//        'client_pre_closing.clear_now_rent_payment_enrollment_check' => '',
//        'client_pre_closing.prorated_rent_check' => '',
//        'client_pre_closing.prorated_rent' => '',

//        'client_pre_closing.option_checked' => '',
        'client_pre_closing.other_checked' => '',
        'client_pre_closing.other_value' => '',

        "client_pre_closing.letter_of_commitment_checked_comment" =>'',
        "client_pre_closing.on_boarding_fee_payment_checked_comment" =>'',
        "client_pre_closing.inspection_checked_comment" =>'',
        "client_pre_closing.termite_checked_comment" =>'',
        "client_pre_closing.appraisal_value_checked_comment" =>'',
        "client_pre_closing.driver_license_applicant_checked_comment" =>'',
        "client_pre_closing.driver_license_co_applicant_checked_comment" =>'',
        "client_pre_closing.soc_sec_card_applicant_checked_comment" =>'',
        "client_pre_closing.soc_sec_card_co_applicant_checked_comment" =>'',
        "client_pre_closing.renter_insurance_checked_comment" =>'',
        "client_pre_closing.flood_certificate_checked_comment" =>'',
        "client_pre_closing.warranty_checked_comment" =>'',
        "client_pre_closing.lease_signed_checked_comment" =>'',
    ];

//
//    protected $validationAttributes = [
//        'client.data.additional_tenant_name' => 'Additional Tenant Name',
//        'client.data.mortgage_type' => 'Mortgage Type',
//        'client.data.rental_verification' => 'Rental Verification',
//    ];


    public function mount($client_id = null, $property_id = null, $new_property = false){
        $this->new_property = $new_property;
        $this->client_id = $client_id;
        $this->property_id = $property_id;
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($this->client_id,$this->property_id);
        $this->getClientProperty();

    }



    public function hydrate(){
        $this->client_property_pre_closing_handler = new ClientPropertyChecklistHandler($this->client_id,$this->property_id);

//        dd($this->client_pre_closing->isDirty('lease_expire_date'));
        if(empty($this->client_pre_closing->lease_expire_date)){

            if($this->property->closing_date){
                $date = Carbon::parse($this->property->closing_date)->endOfMonth()->addYear(1);
                $this->client_pre_closing->lease_expire_date = $date->toDateString();
            }
        }

    }

    public function dehydrate()
    {

//        if ($this->getErrorBag()->any()) {
////            $this->resetErrorBag();
//           $this->dispatchBrowserEvent('validation-errors',['errors' => true]);
//
//        }

    }

     public function  updatedFoo(){

     }

//    public function updated(){
//
//        if($this->property->isDirty('is_deal_save_checked')) {
//
//        }
//
//        if ($this->getErrorBag()->any()) {
//            $this->dispatchBrowserEvent('validation-errors',['errors' => true]);
//        }
//    }



    public function getClientProperty(){
        if($this->client_id)
            $this->title = 'Item Checklist (Pre Closing)';
        else
            $this->title = 'Add Client Info';
        $this->client = $this->client_property_pre_closing_handler->getClient();
        if($this->new_property) {
//            if (!$this->client->isClientDropped()){
                $this->property = new Property();
                $this->client_pre_closing = new PropertyPreClosingChecklist();
//                }
//            else {
//                session()->flash('success', 'This client is added to dropouts');
//                $this->redirect();
//            }
        }
        else{
            $this->property = $this->client_property_pre_closing_handler->getProperty();
            $this->client_pre_closing= $this->client_property_pre_closing_handler->getPreClosingList();
        }



    }


    public function getClientPropertyByClientPropertyId(){
        if($this->client_property_id){
            $this->client_property = ClientProperty::find($this->client_property_id);
            $this->client = $this->client_property->client;
//            $this->client_id = $this->client->id;
            $this->property = $this->client_property->property;
            $this->client_pre_closing = $this->client_property->pre_closing_checklist;
            if(!$this->property)
                $this->property = new Property();
            if(!$this->client_pre_closing)
                $this->client_pre_closing = new PropertyPreClosingChecklist();

        }
    }

    public function render()
    {
        return view('livewire.client.item-checklist.master')->extends('layouts.app');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }
//
    public function deal_save(){

    }

    public function book_house(){

        $this->validate(ClientItemCheckListVariables::getValidationRulesForHouseBook());
        try {
            $this->property->property_status_id = PropertyStatusConstant::HOUSE_BOOKED;
            $this->client_property_pre_closing_handler->setClient($this->client);
            $this->client_property_pre_closing_handler->setProperty($this->property);
            $this->client_property_pre_closing_handler->setPreClosingList($this->client_pre_closing);

            if ($this->client_property_pre_closing_handler->save()) {
                return $this->redirect('/portfolio');
            };
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function before_closing(){

            $this->validate($this->rules);
            try {
                $this->client->stage = PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
                $this->client->status = ClientStatusConstant::CLIENT_ACTIVE;
                $this->property->property_status_id = PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
                $this->client_property_pre_closing_handler->setClient($this->client);
                $this->client_property_pre_closing_handler->setProperty($this->property);
                $this->client_property_pre_closing_handler->setPreClosingList($this->client_pre_closing);

                if ($this->client_property_pre_closing_handler->save()) {
                    session()->flash('success', 'Item successfully updated.');
                    return $this->redirect('/items/outstanding/after_dd');
                };
            } catch (\Exception $e) {
                dd($e);
            }

            //$this->dispatchBrowserEvent('client-property-validation-errors');

    }

    public function save_item(){

        $this->validate($this->rules);
        try{
//            $this->client->status = ClientStatusConstant::CLIENT_ACTIVE;
//            $this->property->property_status_id = PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
//            $this->property->client_id = $this->client_id;
//            $this->client_pre_closing->property_id = $this->property->id;

            $this->client_property_pre_closing_handler->setClient($this->client);
            $this->client_property_pre_closing_handler->setProperty($this->property);
            $this->client_property_pre_closing_handler->setPreClosingList($this->client_pre_closing);

            if($this->client_property_pre_closing_handler->save()){
                    session()->flash('success', 'Item successfully updated.');
                    return $this->redirect('/items/outstanding/after_dd');
            };
        }catch (\Exception $e){
            //dd($e);
            report($e);

        }

    }

    public function updateClientPropertyByPropertyClientId(){
        //$this->client_property->attach($this->property->id, ['pre_closing_checklist_id'=> $this->client_pre_closing->id,'status_id' => PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE]);
       $return = false;
        if($this->client_property ) {
            try {
                $this->client_property->property_id = $this->property->id;
                $this->client_property->client_id = $this->client->id;
                $this->client_property->pre_closing_checklist_id = $this->client_pre_closing->id;
                $this->client_property->status_id = PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
                $return = $this->client_property->save();
            }catch (\Exception $e){
                dd($e);
                report($e);
               ;
            }

        }

        return $return;
    }


    public function setCheckListValueAndDate($check){
        if($this->client->$check) {
            $this->client->$check = 1 ;

        }else{
            $this->client->$check = 0 ;
        }

    }

    public function markChecklist($model,$check){
        $checked_by = $check.'_by';
        $checked_at = $check.'_at';
        $comment = $check.'_comment';

        if($this->$model->$check) {
            $this->$model->$checked_by = Auth::id() ;
            $this->$model->$checked_at = Carbon::now()->toDateTimeString();
        }else{
            $this->$model->$checked_by = $this->$model->getOriginal($checked_by);
            $this->$model->$checked_at = $this->$model->getOriginal($checked_at);;
            $this->$model->$comment = $this->$model->getOriginal($comment);;
        }
//        dd($this->$model->$checked_by);

    }


    public function payment_option($values){
        $options_array = ClientItemCheckListVariables::getPaymentOptionList();
        $calculated_payment = $this->property->pirchase_price + $this->property->closing_cost + $this->property->closing_credit_general;

        foreach ($options_array as $k => $v){
            $key = $v['key'];
            if(array_key_exists($k,array_flip($values))){
                $this->client_pre_closing->$key = round($calculated_payment * ($v['formula']),2);
            }
            else{
                $this->client_pre_closing->$key = null;
            }

        }

    }

//    public function payment_option($values){
//         $options_array = $this->client->getPaymentOptionList();
//          $calculated_payment = $this->client->property_purchase_price + $this->client->property_pclosing_cost + $this->client->prooerty_closing_credit_general;
//            foreach ($options_array as $k => $v){
//                $key = $v['key'];
//                if(array_key_exists($k,array_flip($values))){
//                        $this->client->$key = round($calculated_payment * ($v['formula']),2);
//                }
//                else{
//                    $this->client->$key = null;
//                }
//
//            }
//
//    }

    public function addClient(){
        $this->validate(ClientItemCheckListVariables::validateClientRules());
        $this->client->status = ClientStatusConstant::CLIENT_ACTIVE;
        $this->client_property_pre_closing_handler->setClient($this->client);
        if($this->client_property_pre_closing_handler->saveClient()){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/items/outstanding/before_dd');
        };
    }

    public function house_book_validate(){
        $this->validate($this->rules);

    }

    public function cancel_house(){
//        $reset = array_diff_key($this->client->getAttributes(),array_flip($this->exceptArray));
//        if($reset){
//            foreach ($reset as $k=> $v){
//                $reset[$k] = null;
//            }
//        }
        //dd($reset);

        //$reset['stage'] = PropertyStatusConstant::HOUSE_CANCELLED;
        //dd($reset,$this->client->id,$this->client->update($reset));
        //$this->client_property_pre_closing_handler->setClient($this->client_property_pre_closing_handler->getClient());
        //$this->client_property_pre_closing_handler->setPreClosingList($this->client_property_pre_closing_handler->getPreClosingList());
        $this->property->property_status_id = PropertyStatusConstant::HOUSE_CANCELLED;
        $this->client_property_pre_closing_handler->setProperty($this->property);
        if($this->client_property_pre_closing_handler->getProperty($this->property)->save()){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/house/cancelled');
        };
    }




}
