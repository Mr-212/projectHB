<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 12/15/20
 * Time: 1:22 PM
 */

namespace App\Models\Support\Client;


class ClientItemCheckListVariables
{
    public static function getPaymentOptionList1(){
        return [
            1 =>  'due_diligence_option_payment_3_month',
            2 =>  'due_diligence_option_payment_6_month',
            3 =>  'due_diligence_option_payment_12_month',
        ];
    }
    public static function getPaymentOptionList(){
        return [
            1 =>  ['key' => 'payment_option_3_month' ,   'formula' => 1.03 ],
            2 =>  ['key' => 'payment_option_6_month' ,   'formula' => 1.06 ],
            3 =>  ['key' => 'payment_option_12_month',   'formula' => 1.10 ],
        ];
    }

    public static function getValidationRulesForHouseBook(){
        return [
            'client.applicant_name'=>'required|string',
            'client.applicant_email' =>'required|email',
            'client.applicant_phone' =>'required|integer',
            'client.partner_name' =>'string',
            'client.partner_email' =>'email',
            'client.partner_phone' =>'integer',
            'client.co_applicant_name' =>'string',
            'client.co_applicant_email' =>'',
            'client.co_applicant_phone' =>'integer',

            'client.additional_tenant_check' => '',
            'client.additional_tenant_name' => '',
            'client.mortgage_type_id' => 'required',
            'client.rental_verification_complete_check' => 'required',
            'client.rental_verification_check' => '',
            'client.welcome_down_payment' => '',
            'client.welcome_down_payment_complete_check' => '',


            'client.property_new_construction_check' =>'',
            "client.property_new_construction_builder_name" =>'',
            "client.property_country" =>'required|string',
            "client.property_state" =>'required|string',
            "client.property_city" =>'required|string',
            "client.property_zip" =>'required|integer',

            "client.property_purchase_price" => 'required|integer',
            "client.property_closing_cost" => 'required|integer',
            "client.property_closing_credit_general" => 'required',
            "client.property_annual_property_tax" => 'required|integer',

            "client.property_hoa_check" => '',
            "client.property_hoa_name" => '',
            "client.property_hoa_phone" => '',

            "client.property_repair_request_check" => '',
            "client.property_repair_request_item_names" => '',

            "client.property_lender_check" => '',
            "client.property_lender_name" => '',

            "client.property_closing_date_complete_check" => 'required',
            "client.property_closing_date" => '',

            "client.property_due_diligence_expire_complete_check" => 'required',
            "client.property_due_diligence_expire" => '',

            "client.due_diligence_rent" =>'required',
            "client.due_diligence_option_payment_check" =>'',
            "client.due_diligence_option_payment_3_month" =>'',
            "client.due_diligence_option_payment_6_month" =>'',
            "client.due_diligence_option_payment_12_month" =>'',
            "client.due_diligence_option_payment_date" =>'required',

            "client.letter_of_commitment_signed" =>'',
            "client.on_boarding_fee_payment_check" =>'',

            "client.due_diligence_inspection_check" =>'',
            "client.due_diligence_inspection_check_date" =>'',

            'client.appraisal_value_check' => '',
            'client.appraisal_value' => '',

            'client.driver_license_applicant' => '',
            'client.driver_license_co_applicant' => '',
            'client.soc_sec_card_applicant' => '',
            'client.soc_sec_card_co_applicant' => '',

            'client.renter_insurance_check' => '',
            'client.renter_insurance_company_name' => '',

            'client.flood_certificate_check' => '',
            'client.landlord_insurance_check' => '',

            'client.warranty_check' => '',
            'client.warranty_company_name' => '',

            'client.warranty_paid_by_seller_check' => '',

            'client.lease_check' => '',
            'client.lease_expire_date' => '',

            'client.termite_check' => '',
            'client.termite_paid_by' => '',

            'client.septic_inspection_check' => '',
            'client.clear_now_rent_payment_enrollment_check' => '',

            'client.prorated_rent_check' => '',
            'client.prorated_rent' => '',

            'client.other_check' => '',
            'client.other_value' => '',
        ];
    }
}