<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 12/15/20
 * Time: 1:22 PM
 */

namespace App\Models\Support\Client;


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
            "property.county" =>'string|required',
            "property.state" =>'string|required',
            "property.city" =>'string|required',
            "property.zip" =>'string|required',

            "property.purchase_price" => 'integer|required',
            "property.closing_cost" => 'integer|required',
            "property.closing_credit_general" => 'integer|required',
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


            //pre closing rules
            'client_pre_closing.rental_verification_checked' =>'required',
            'client_pre_closing.rental_verification_checked_by' => '',
            'client_pre_closing.rental_verification_checked_at' => '',
            'client_pre_closing.rental_verification_checked_comment' => '',

            'client_pre_closing.welcome_payment_checked' => 'bool|required',
            'client_pre_closing.welcome_payment_checked_by' => '',
            'client_pre_closing.welcome_payment_checked_at' => '',
            'client_pre_closing.welcome_payment_checked_comment' => '',

            "client_pre_closing.deal_save_checked" =>'',
            "client_pre_closing.deal_save_checked_by" =>'',
            "client_pre_closing.deal_save_checked_at" =>'',
            "client_pre_closing.deal_save_checked_comment" =>'',

            "client_pre_closing.rent" =>'',
            "client_pre_closing.payment_option_select_checked" =>'',
            "client_pre_closing.payment_option_3_month" =>'',
            "client_pre_closing.payment_option_6_month" =>'',
            "client_pre_closing.payment_option_12_month" =>'',

            "client_pre_closing.payment_option_date" =>'',
            "client_pre_closing.payment_option_date_checked" =>'',

            "client_pre_closing.letter_of_commitment_checked" =>'required|bool',
            "client_pre_closing.letter_of_commitment_checked_at" =>'',
            "client_pre_closing.letter_of_commitment_checked_by" =>'',

            "client_pre_closing.on_boarding_fee_payment_checked" =>'',
            "client_pre_closing.on_boarding_fee_payment_checked_at" =>'',
            "client_pre_closing.on_boarding_fee_payment_checked_by" =>'',

            "client_pre_closing.inspection_checked" =>'required|bool',
            "client_pre_closing.inspection_checked_at" =>'',
            "client_pre_closing.inspection_checked_by" =>'',

//        "client_pre_closing.inspection_check_date" =>'',
            'client_pre_closing.termite_checked' => 'required|bool',
            'client_pre_closing.termite_checked_by' => '',
            'client_pre_closing.termite_checked_at' => '',
            'client_pre_closing.termite_paid_by' => '',

            'client_pre_closing.septic_inspection_checked' => '',

            'client_pre_closing.repair_credit_checked' => '',
            'client_pre_closing.repair_credit' => '',

            'client_pre_closing.appraisal_value_checked' =>'required|bool',
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

            'client_pre_closing.renter_insurance_checked' =>'required|bool',
            'client_pre_closing.renter_insurance_checked_at' => '',
            'client_pre_closing.renter_insurance_checked_by' => '',
            'client_pre_closing.renter_insurance_name' => '',

            'client_pre_closing.flood_certificate_checked' => 'required|bool',
            'client_pre_closing.flood_certificate_checked_at' => '',
            'client_pre_closing.flood_certificate_checked_by' => '',

            'client_pre_closing.landlord_insurance_checked' => 'required|bool',
            'client_pre_closing.landlord_insurance_checked_at' => '',
            'client_pre_closing.landlord_insurance_checked_by' => '',

            'client_pre_closing.warranty_checked' => 'required|bool',
            'client_pre_closing.warranty_checked_at' => '',
            'client_pre_closing.warranty_checked_by' => '',

            'client_pre_closing.warranty_company_name' => '',
            'client_pre_closing.warranty_paid_by_seller_checked' => '',


            'client_pre_closing.lease_signed_checked' => 'required|bool',
            'client_pre_closing.lease_signed_checked_at' => '',
            'client_pre_closing.lease_signed_checked_by' => '',

            'client_pre_closing.lease_expire_checked' => '',
            'client_pre_closing.lease_expire_date' => '',

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
            "client_pre_closing.landlord_insurance_checked_comment" =>'',
            "client_pre_closing.flood_certificate_checked_comment" =>'',
            "client_pre_closing.warranty_checked_comment" =>'',
            "client_pre_closing.lease_signed_checked_comment" =>'',
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