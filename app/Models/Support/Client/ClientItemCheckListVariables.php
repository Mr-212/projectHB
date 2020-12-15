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
    public static function getPaymentOptionList(){
        return [
            1 =>  'due_diligence_option_payment_3_month',
            2 =>  'due_diligence_option_payment_6_month',
            3 =>  'due_diligence_option_payment_12_month',
        ];
    }

    public static function getValidationRulesWithoutRequired(){
        return [
            'client.additional_tenant_check' => '',
            'client.additional_tenant_name' => '',
            'client.mortgage_type_id' => '',
            'client.rental_verification_complete_check' => '',
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

            "client.due_diligence_rent" =>'',
            "client.due_diligence_option_payment_check" =>'',
            "client.due_diligence_option_payment_3_month" =>'',
            "client.due_diligence_option_payment_6_month" =>'',
            "client.due_diligence_option_payment_12_month" =>'',
            "client.due_diligence_option_payment_date" =>'',

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
            'client.landloard_insurance_check' => '',

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