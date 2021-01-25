<?php
namespace App\Http\Livewire\Client;

use App\Constants\ClientStatusConstant;
use App\Constants\PropertyStatusConstant;
use App\Models\PreClosingChecklist;
use App\Models\ClientProperty;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use App\RepoHandlers\ClientPropertyChecklistHandler;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ClientItemChecklist extends Component
{
    public  $client ,$property, $pre_closing,$client_property;
    public  $client_id,$property_id, $property_status,$client_property_id;
    public  $title, $new_property;
    protected  $client_property_pre_closing_handler = null;


    protected $listeners = ['cancel_client'];



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
//        'client.mortgage_type_id' => '',
//        'client.rental_verification_checked' => '',
//        'client.rental_verification_checked_by' => '',
//        'client.rental_verification_checked_at' => '',
//        'client.rental_verification_checked_comment' => '',
////        'client.rental_verification_check' => '',
////        'client.welcome_down_payment' => '',
//        'client.welcome_payment_checked' => '',
//        'client.welcome_payment_checked_by' => '',
//        'client.welcome_payment_checked_at' => '',
//        'client.welcome_payment_checked_comment' => '',


        //client property rules

//        "property.deal_save_checked" =>'',
//        "property.deal_save_checked_by" =>'',
//        "property.deal_save_checked_at" =>'',
//        "property.deal_save_checked_comment" =>'',



        'property.mortgage_type_id' => '',
        'property.new_construction_check' =>'',
        "property.new_construction_builder" =>'',
        'property.house_number_and_street' =>'required',
        "property.county" =>'string|required',
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


        "property.lender_check" => '',
        "property.lender_name" => '',

        "property.closing_date" => '',
        "property.due_diligence_expire_date" => '',


        //pre closing rules
        'pre_closing.rental_verification_checked' => '',
        'pre_closing.rental_verification_checked_by' => '',
        'pre_closing.rental_verification_checked_at' => '',
        'pre_closing.rental_verification_checked_comment' => '',

        'pre_closing.welcome_payment_checked' => '',
        'pre_closing.welcome_payment_checked_by' => '',
        'pre_closing.welcome_payment_checked_at' => '',
        'pre_closing.welcome_payment_checked_comment' => '',

        "pre_closing.deal_save_checked" =>'',
        "pre_closing.deal_save_checked_by" =>'',
        "pre_closing.deal_save_checked_at" =>'',
        "pre_closing.deal_save_checked_comment" =>'',

        "pre_closing.rent" =>'',
        "pre_closing.payment_option_select_checked" =>'',
        "pre_closing.payment_option_3_month" =>'',
        "pre_closing.payment_option_6_month" =>'',
        "pre_closing.payment_option_12_month" =>'',

        "pre_closing.payment_option_date" =>'',
        "pre_closing.payment_option_date_checked" =>'',

        "pre_closing.letter_of_commitment_checked" =>'',
        "pre_closing.letter_of_commitment_checked_at" =>'',
        "pre_closing.letter_of_commitment_checked_by" =>'',

        "pre_closing.on_boarding_fee_payment_checked" =>'',
        "pre_closing.on_boarding_fee_payment_checked_at" =>'',
        "pre_closing.on_boarding_fee_payment_checked_by" =>'',

        "pre_closing.inspection_checked" =>'',
        "pre_closing.inspection_checked_at" =>'',
        "pre_closing.inspection_checked_by" =>'',

//        "pre_closing.inspection_check_date" =>'',
        'pre_closing.termite_checked' => '',
        'pre_closing.termite_checked_by' => '',
        'pre_closing.termite_checked_at' => '',
        'pre_closing.termite_paid_by' => '',

        'pre_closing.septic_inspection_checked' => '',

        'pre_closing.repair_credit_checked' => '',
        'pre_closing.repair_credit' => '',

        'pre_closing.appraisal_value_checked' => '',
        'pre_closing.appraisal_value_checked_by' => '',
        'pre_closing.appraisal_value_checked_at' => '',
        'pre_closing.appraisal_value' => '',

        'pre_closing.driver_license_applicant_checked' => '',
        'pre_closing.driver_license_applicant_checked_at' => '',
        'pre_closing.driver_license_applicant_checked_by' => '',

        'pre_closing.driver_license_co_applicant_checked' => '',
        'pre_closing.driver_license_co_applicant_checked_at' => '',
        'pre_closing.driver_license_co_applicant_checked_by' => '',

        'pre_closing.soc_sec_card_applicant_checked' => '',
        'pre_closing.soc_sec_card_applicant_checked_at' => '',
        'pre_closing.soc_sec_card_applicant_checked_by' => '',

        'pre_closing.soc_sec_card_co_applicant_checked' => '',
        'pre_closing.soc_sec_card_co_applicant_checked_at' => '',
        'pre_closing.soc_sec_card_co_applicant_checked_by' => '',

        'pre_closing.renter_insurance_checked' => '',
        'pre_closing.renter_insurance_checked_at' => '',
        'pre_closing.renter_insurance_checked_by' => '',
        'pre_closing.renter_insurance_name' => '',

        'pre_closing.flood_certificate_checked' => '',
        'pre_closing.flood_certificate_checked_at' => '',
        'pre_closing.flood_certificate_checked_by' => '',

        'pre_closing.landlord_insurance_checked' => '',
        'pre_closing.landlord_insurance_checked_at' => '',
        'pre_closing.landlord_insurance_checked_by' => '',

        'pre_closing.warranty_checked' => '',
        'pre_closing.warranty_checked_at' => '',
        'pre_closing.warranty_checked_by' => '',

        'pre_closing.warranty_company_name' => '',
        'pre_closing.warranty_paid_by_seller_checked' => '',


        'pre_closing.lease_signed_checked' => '',
        'pre_closing.lease_signed_checked_at' => '',
        'pre_closing.lease_signed_checked_by' => '',

        'pre_closing.lease_expire_checked' => '',
        'pre_closing.lease_expire_date' => '',


        'pre_closing.other_checked' => '',
        'pre_closing.other_value' => '',

        "pre_closing.letter_of_commitment_checked_comment" =>'',
        "pre_closing.on_boarding_fee_payment_checked_comment" =>'',
        "pre_closing.inspection_checked_comment" =>'',
        "pre_closing.termite_checked_comment" =>'',
        "pre_closing.appraisal_value_checked_comment" =>'',
        "pre_closing.driver_license_applicant_checked_comment" =>'',
        "pre_closing.driver_license_co_applicant_checked_comment" =>'',
        "pre_closing.soc_sec_card_applicant_checked_comment" =>'',
        "pre_closing.soc_sec_card_co_applicant_checked_comment" =>'',
        "pre_closing.renter_insurance_checked_comment" =>'',
        "pre_closing.landlord_insurance_checked_comment" =>'',
        "pre_closing.flood_certificate_checked_comment" =>'',
        "pre_closing.warranty_checked_comment" =>'',
        "pre_closing.lease_signed_checked_comment" =>'',



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
    }

    public function dehydrate()
    {

        if(empty($this->pre_closing->lease_expire_date)){
            if($this->property->closing_date){
                $date = Carbon::parse($this->property->closing_date)->endOfMonth()->addYear(1);
                $this->pre_closing->lease_expire_date = $date->toDateString();
            }
        }

        if(!$this->property->closing_cost){
            $this->property->closing_cost = ClientItemCheckListVariables::DEFAULT_CLOSING_COST;
        }

    }



    public function getClientProperty(){
        if($this->client_id)
            $this->title = 'Item Checklist (Pre Closing)';
        else
            $this->title = 'Add Client Info';
        $this->client = $this->client_property_pre_closing_handler->getClient();
        if($this->new_property) {
//            if (!$this->client->isClientDropped()){
                $this->property = new Property();
                $this->pre_closing = new PreClosingChecklist();
//                }
//            else {
//                session()->flash('success', 'This client is added to dropouts');
//                $this->redirect();
//            }
        }
        else{
            $this->property = $this->client_property_pre_closing_handler->getProperty();
            $this->pre_closing= $this->client_property_pre_closing_handler->getPreClosingList();
        }



    }


    public function getClientPropertyByClientPropertyId(){
        if($this->client_property_id){
            $this->client_property = ClientProperty::find($this->client_property_id);
            $this->client = $this->client_property->client;
//            $this->client_id = $this->client->id;
            $this->property = $this->client_property->property;
            $this->pre_closing = $this->client_property->pre_closing_checklist;
            if(!$this->property)
                $this->property = new Property();
            if(!$this->pre_closing)
                $this->pre_closing = new PreClosingChecklist();

        }
    }

    public function render()
    {
        return view('livewire.client.item-checklist.master')->extends('layouts.app');
    }

    public function save_book_purchase(){
        return $this->redirect('/portfolio');
    }


    public function book_house(){

        try {
            $this->validate(ClientItemCheckListVariables::getValidationRulesForHouseBook());
            $this->property->property_status_id = PropertyStatusConstant::HOUSE_BOOKED;
            $this->client_property_pre_closing_handler->setClient($this->client);
            $this->client_property_pre_closing_handler->setProperty($this->property);
            $this->client_property_pre_closing_handler->setPreClosingList($this->pre_closing);

            if ($this->client_property_pre_closing_handler->save()) {
                return $this->redirect('/portfolio');
            };
        }
        catch (ValidationException $e){

//            dd($e->validator);
            $this->dispatchBrowserEvent('validation-errors');
            throw $e;
        }
        catch (\Exception $e){
           dd($e);
        }


    }

    public function before_closing(){


            try {
                $this->validate();
//                $this->client->stage = PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
                $this->client->status = ClientStatusConstant::CLIENT_ACTIVE;
                $this->property->property_status_id = PropertyStatusConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
                $this->client_property_pre_closing_handler->setClient($this->client);
                $this->client_property_pre_closing_handler->setProperty($this->property);
                $this->client_property_pre_closing_handler->setPreClosingList($this->pre_closing);

                if ($this->client_property_pre_closing_handler->save()) {
                    session()->flash('success', 'Item successfully updated.');
                    return $this->redirect('/items/outstanding/after_dd');
                };
            }
            catch (ValidationException $e){
                $this->dispatchBrowserEvent('validation-errors');
                throw $e;
            }
            catch (\Exception $e) {
                dd($e);
            }



    }

    public function save_item(){


        try{
            $this->validate($this->rules);
            $this->client_property_pre_closing_handler->setClient($this->client);
            $this->client_property_pre_closing_handler->setProperty($this->property);
            $this->client_property_pre_closing_handler->setPreClosingList($this->pre_closing);

            if($this->client_property_pre_closing_handler->save()){
                $this->dispatchBrowserEvent('update-saved',['message'=>'Page saved successfully.']);
            };
        }
        catch (ValidationException $e){
            $this->dispatchBrowserEvent('validation-errors');
            throw $e;
        }
        catch (\Exception $e){
            //dd($e);
            report($e);

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
            $this->$model->$checked_at = $this->$model->getOriginal($checked_at);
            $this->$model->$comment    = $this->$model->getOriginal($comment);
        }

    }


    public function payment_option($values){
        $options_array = ClientItemCheckListVariables::getPaymentOptionList();
        $calculated_payment = $this->property->pirchase_price + $this->property->closing_cost + $this->property->closing_credit_general;

        foreach ($options_array as $k => $v){
            $key = $v['key'];
            if(array_key_exists($k,array_flip($values))){
                if(!$this->pre_closing->$key)
                    $this->pre_closing->$key = round($calculated_payment * ($v['formula']),2);
            }
            else{
                $this->pre_closing->$key = null;
            }

        }

    }


    public function addClient(){

        try {
            $this->validate(ClientItemCheckListVariables::validateClientRules());
            $this->client->status = ClientStatusConstant::CLIENT_ACTIVE;
            $this->client_property_pre_closing_handler->setClient($this->client);
            if ($this->client->save()) {
                session()->flash('success', 'Item successfully updated.');
                return $this->redirect('/items/outstanding/before_dd');
            };
        }catch (ValidationException $e){
            throw $e;

        }catch (\Exception $e){
            report($e);
            dd($e);
        }
    }



    public function cancel_house(){
        if(!empty($this->property->id)) {
            $this->property->property_status_id = PropertyStatusConstant::HOUSE_CANCELLED;
            if ($this->property->save()) {
                session()->flash('success', 'Item successfully updated.');
                return $this->redirect('/house/cancelled');
            };
        }else{
            $this->dispatchBrowserEvent('update-saved',['message'=>'Cant cancel house as property form is empty..']);

        }
    }


}
