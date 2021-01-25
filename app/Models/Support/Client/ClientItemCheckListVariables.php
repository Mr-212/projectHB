<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 12/15/20
 * Time: 1:22 PM
 */

namespace App\Models\Support\Client;


use App\Rules\AcceptedWithCondition;
use Illuminate\Validation\Rule;

class ClientItemCheckListVariables
{

    const DEFAULT_CLOSING_COST = 3500;

    public static function getPaymentOptionList(){
        return [
            1 =>  ['key' => 'payment_option_3_month' ,   'formula' => 1.03 ],
            2 =>  ['key' => 'payment_option_6_month' ,   'formula' => 1.06 ],
            3 =>  ['key' => 'payment_option_12_month',   'formula' => 1.10 ],
        ];
    }

    public static function getValidationRulesForHouseBook(){

        return [
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



            'property.mortgage_type_id' => '',
            'property.new_construction_check' =>'',
            "property.new_construction_builder" =>'',
            'property.house_number_and_street' =>'required',
            "property.county" => 'string|required',
            "property.state" => 'string|required',
            "property.city" => 'string|required',
            "property.zip" => 'string|required',

            "property.purchase_price" => '',
            "property.closing_cost" => '',
            "property.closing_credit_general" => '',
            "property.annual_property_tax" => '',

            "property.hoa_check" => '',
            "property.hoa_name" => '',
            "property.hoa_phone" => '',


            "property.lender_check" => '',
            "property.lender_name" => '',

            "property.closing_date" => '',
            "property.due_diligence_expire_date" => '',


            "pre_closing.rental_verification_checked" => 'accepted',
            'pre_closing.rental_verification_checked_by' => '',
            'pre_closing.rental_verification_checked_at' => '',
            'pre_closing.rental_verification_checked_comment' => '',

            'pre_closing.welcome_payment_checked' => 'accepted',
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

            "pre_closing.letter_of_commitment_checked"=>"accepted",
            "pre_closing.letter_of_commitment_checked_at" =>'',
            "pre_closing.letter_of_commitment_checked_by" =>'',

            "pre_closing.on_boarding_fee_payment_checked" =>'accepted',
            "pre_closing.on_boarding_fee_payment_checked_at" =>'',
            "pre_closing.on_boarding_fee_payment_checked_by" =>'',

            "pre_closing.inspection_checked" =>'required|bool',
            "pre_closing.inspection_checked_at" =>'',
            "pre_closing.inspection_checked_by" =>'',


            'pre_closing.termite_checked' => 'accepted',
            'pre_closing.termite_checked_by' => '',
            'pre_closing.termite_checked_at' => '',
            'pre_closing.termite_paid_by' => '',

            'pre_closing.septic_inspection_checked' => '',

            'pre_closing.repair_credit_checked' => '',
            'pre_closing.repair_credit' => '',

            'pre_closing.appraisal_value_checked' =>'accepted',
            'pre_closing.appraisal_value_checked_by' => '',
            'pre_closing.appraisal_value_checked_at' => '',
            'pre_closing.appraisal_value' => '',

//            'pre_closing.driver_license_applicant_checked' => 'exclude_unless:client.co_applicant_email,null|accepted',
            'pre_closing.driver_license_applicant_checked' => 'accepted_if_not_null:client.co_applicant_email',
//
//            'pre_closing.driver_license_applicant_checked' => [new AcceptedWithCondition('client.co_applicant_email',null)],
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

            'pre_closing.renter_insurance_checked' =>'accepted',
            'pre_closing.renter_insurance_checked_at' => '',
            'pre_closing.renter_insurance_checked_by' => '',
            'pre_closing.renter_insurance_name' => '',

            'pre_closing.flood_certificate_checked' => 'accepted',
            'pre_closing.flood_certificate_checked_at' => '',
            'pre_closing.flood_certificate_checked_by' => '',

            'pre_closing.landlord_insurance_checked' => 'accepted',
            'pre_closing.landlord_insurance_checked_at' => '',
            'pre_closing.landlord_insurance_checked_by' => '',

            'pre_closing.warranty_checked' => 'accepted',
            'pre_closing.warranty_checked_at' => '',
            'pre_closing.warranty_checked_by' => '',

            'pre_closing.warranty_company_name' => '',
            'pre_closing.warranty_paid_by_seller_checked' => '',


            'pre_closing.lease_signed_checked' => 'accepted',
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
    }

    public static function getItemsToBeChecked(){

        return [
            'client' =>[
                'rental_verification_checked' =>[
                    'rental_verification_checked_by',
                    'rental_verification_checkedt_at'
                ],
            ],
        ];
    }

    public static function validateClientRules(){
        return  [

                'client.applicant_name' => 'required|string',
                'client.applicant_email' =>'required|email|unique:clients,applicant_email',

                'client.applicant_phone' =>'required',
                'client.partner_name' =>'string',
                'client.partner_email' =>'email',
                'client.partner_phone' =>'',
                'client.co_applicant_name' =>'string',
                'client.co_applicant_email' =>'',
                'client.co_applicant_phone' =>'',

                'client.additional_tenant_check' => '',
                'client.additional_tenant_name' => '',


//                'client.mortgage_type_id' => '',
//                'client.rental_verification_checked' => '',
//                'client.rental_verification_checked_by' => '',
//                'client.rental_verification_checked_at' => '',
//                'client.rental_verification_checked_comment' => '',
//                'client.welcome_payment_checked' => '',
//                'client.welcome_payment_checked_by' => '',
//                'client.welcome_payment_checked_at' => '',
//                'client.welcome_payment_checked_comment' => '',
        ];
    }
}