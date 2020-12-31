<?php
namespace App\Http\Livewire\Client;

use App\Constants\PropertyStageConstant;
use App\Models\Client;
use App\Models\ClientPreClosingChecklist;
use App\Models\ClientProperty;
use App\Models\Property;
use App\Models\Support\Client\ClientItemCheckListVariables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ClientItemChecklist extends Component
{
    public  $client ,$property, $client_pre_closing,$client_property;
    public  $client_id,$property_id, $property_status,$client_property_id;
    public  $title;

    protected  $casts = [
//        'property.closing_date' => 'date:m-d-y',
//        'closing_date' => 'date:m-d-y',
//        'property.is_deal_save_checked' =>'object'
    ];

    protected $listeners = ['child_component_update'];
    public $child_components = [
        'client_updated' => false,
        'property_updated' => false,
        'pre_closing_updated'=> false
    ];

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



        'property.house_number_and_street' =>'',
        'property.new_construction_check' =>'',
        "property.new_construction_builder" =>'',

        "property.county" =>'string',
        "property.state" =>'string',
        "property.city" =>'string',
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
        "client_pre_closing.payment_option_3_month" =>'',
        "client_pre_closing.payment_option_6_month" =>'',
        "client_pre_closing.payment_option_12_month" =>'',

        "client_pre_closing.payment_option_date" =>'',
        "client_pre_closing.payment_option_date_checked" =>'',

        "client_pre_closing.letter_of_commitment_checked" =>'',
        "client_pre_closing.on_boarding_fee_payment_checked" =>'',

        "client_pre_closing.inspection_checked" =>'',
//        "client_pre_closing.inspection_check_date" =>'',
        'client_pre_closing.termite_checked' => '',
        'client_pre_closing.termite_paid_by' => '',

        'client_pre_closing.septic_inspection_checked' => '',

        'client_pre_closing.repair_credit_checked' => '',
        'client_pre_closing.repair_credit' => '',

        'client_pre_closing.appraisal_value_checked' => '',
        'client_pre_closing.appraisal_value' => '',

        'client_pre_closing.driver_license_applicant_checked' => '',
        'client_pre_closing.driver_license_co_applicant_checked' => '',
        'client_pre_closing.soc_sec_card_applicant_checked' => '',
        'client_pre_closing.soc_sec_card_co_applicant_checked' => '',

        'client_pre_closing.renter_insurance_checked' => '',
        'client_pre_closing.renter_insurance_name' => '',

        'client_pre_closing.flood_certificate_checked' => '',

        'client_pre_closing.landlord_insurance_checked' => '',

        'client_pre_closing.warranty_checked' => '',
        'client_pre_closing.warranty_company_name' => '',
        'client_pre_closing.warranty_paid_by_seller_checked' => '',


        'client_pre_closing.lease_signed_checked' => '',
        'client_pre_closing.lease_expire_checked' => '',
        'client_pre_closing.lease_expire_date' => '',

//        'client_pre_closing.clear_now_rent_payment_enrollment_check' => '',
//        'client_pre_closing.prorated_rent_check' => '',
//        'client_pre_closing.prorated_rent' => '',

        'client_pre_closing.option_checked' => '',
        'client_pre_closing.other_checked' => '',
        'client_pre_closing.other_value' => '',
    ];

//
//    protected $validationAttributes = [
//        'client.data.additional_tenant_name' => 'Additional Tenant Name',
//        'client.data.mortgage_type' => 'Mortgage Type',
//        'client.data.rental_verification' => 'Rental Verification',
//    ];


    public function mount($client_id = null, $client_property_id = null, $property_status = null){

        $this->client_id = $client_id;
        $this->client_property_id = $client_property_id;
//        $this->property_id = $property_id;
        $this->property_status = $property_status;
        $this->getClientProperty();

    }



    public function hydrate(){

//        if($this->property->isDirty('is_deal_save_checked')) {
////          $this->property->is_deal_save_checked->updated_at = Carbon::now();
////          dd($this->property->is_deal_save_checked->updated_at);
//        }
    }

    public function updated(){

        if($this->property->isDirty('is_deal_save_checked')) {
//          $this->property->is_deal_save_checked->updated_at = Carbon::now();
//         dd($this->property->is_deal_save_checked->updated_at);
        }
    }



    public function getClientProperty(){
        $this->title = 'Item Checklist (Pre Closing)';
        if(empty($this->property_status))
            $this->property_status =  PropertyStageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;

        if($this->client_id) {
            $this->client = Client::find($this->client_id);
            $this->property = new Property();
            $this->client_pre_closing = new ClientPreClosingChecklist();
//            dd($this->property);
        }
        if($this->client_property_id){
            $this->client_property = ClientProperty::find($this->client_property_id);
            $this->client = $this->client_property->client;
//            $this->client_id = $this->client->id;
            $this->property = $this->client_property->property;
            $this->client_pre_closing = $this->client_property->pre_closing_checklist;
            if(!$this->property)
                $this->property = new Property();
            if(!$this->client_pre_closing)
                $this->client_pre_closing = new ClientPreClosingChecklist();

        }
        else {
            $this->title = 'Add Client Info';
            $this->client = new Client();
            $this->property = new Property();
            $this->client_pre_closing= new ClientPreClosingChecklist();
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
        $this->client->stage = PropertyStageConstant::HOUSE_BOOKED;
        if($this->client->save()){
            return $this->redirect('/items/outstanding/after_dd');
        };
    }

    public function before_closing(){
//        $this->rules = ClientItemCheckListVariables::getValidationRulesBeforeClosing();
        //dd($this->property,$this->property->save());
        $this->validate($this->rules);
        try{
//            $this->client_pre_closing->client_id = $this->client->id;
            $this->client->stage = PropertyStageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
            DB::beginTransaction();
            if($this->client->save() && $this->property->save() && $this->client_pre_closing->save()){

                if($this->client_property ){
                    //$this->client_property->attach($this->property->id, ['pre_closing_checklist_id'=> $this->client_pre_closing->id,'status_id' => PropertyStageConstant::BEFORE_DUE_DILIGENCE_EXPIRE]);
                    $this->client_property->property_id = $this->property->id;
                    $this->client_property->client_id = $this->client->id;
                    $this->client_property->pre_closing_checklist_id = $this->client_pre_closing->id;
                    $this->client_property->status_id = PropertyStageConstant::BEFORE_DUE_DILIGENCE_EXPIRE;
                    DB::commit();
                    session()->flash('success', 'Item successfully updated.');
                }
                else{
                    $this->client->property()->attach($this->property->id, ['pre_closing_checklist_id'=> $this->client_pre_closing->id,'status_id' => PropertyStageConstant::BEFORE_DUE_DILIGENCE_EXPIRE]);
                    DB::commit();
                    session()->flash('success', 'Item successfully updated.');
                    // return $this->redirect('/items/outstanding/after_dd');
                }
            };
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
        }

    }
  public function child_component_update($key,$value){
       $this->child_components[$key] = $value;
      if(!in_array(false,$this->child_components)){
          session()->flash('success', 'Item successfully updated.');
           return $this->redirect('/items/outstanding/after_dd');
      }

  }
//    public function before_closing(){
//        $this->emit('before_closing');
////        if($this->emit('before_closing','client') && $this->emit('before_closing','property') && $this->emit('before_closing','client_pre_closing')){
////            session()->flash('success', 'Item successfully updated.');
////           return $this->redirect('/items/outstanding/after_dd');
////        };
//    }

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
            $this->$model->$checked_at = Carbon::now() ;
        }else{
            $this->$model->$checked_by = $this->property->getOriginal($checked_by);
            $this->$model->$checked_at = $this->property->getOriginal($checked_at);;
            $this->$model->$comment = $this->property->getOriginal($comment);;
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
        $this->validate($this->rules);
        $this->client->stage = PropertyStageConstant::BEFORE_DUE_DILIGENCE;
        if($this->client->save()){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/items/outstanding/before_dd');
        };
    }

    public function house_book_validate(){
        $this->validate($this->rules);

    }

    public function cancel_house(){
        $reset = array_diff_key($this->client->getAttributes(),array_flip($this->exceptArray));
        if($reset){
            foreach ($reset as $k=> $v){
                $reset[$k] = null;
            }
        }
        //dd($reset);

        $reset['stage'] = PropertyStageConstant::HOUSE_CANCELLED;
        //dd($reset,$this->client->id,$this->client->update($reset));
//        $this->client->stage = PropertyStageConstant::HOUSE_CANCELLED;
        if($this->client->update($reset)){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/house/cancelled');
        };
    }

    public function cancel_client(){

        $this->client->stage = PropertyStageConstant::DROPOUT_CLIENT;
        if($this->client->save()){
            session()->flash('success', 'Item successfully updated.');
            return $this->redirect('/house/dropout');
        };
    }


}
