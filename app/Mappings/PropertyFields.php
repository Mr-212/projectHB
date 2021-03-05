<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 3/5/21
 * Time: 3:09 PM
 */

namespace App\Mappings;


class PropertyFields
{
    static function getMapping(){
        return  [
            'builder' =>'new_construction_builder',
            'house_address' =>'house_number_and_street',
            'house address' =>'house_number_and_street',
            'gross_rent' =>'gross_monthly_rent',
            'annual_tax' =>'annual_property_tax',
            'insurance' =>'annual_insurance_fee',
            'net_rent' =>'net_monthly_rent',
            'closing_costs' =>'closing_cost',
            'purchase_date' =>'closing_date',
            'appraisal' =>'appraisal_value',
            'lease_expiration_date' =>'lease_expiration_date',
//            'lease_expiration_date' =>'lease_expiration_date',
            '3_mo_option' =>'payment_option_3_month',
            '6_mo_option' =>'payment_option_6_month',
            '12_mo_option' =>'payment_option_12_month',
            'proof_of_renters_insurance' => 'renters_insurance_checked',
            'welcome_pmt' => 'welcome_payment_checked_at',
            'welcome_payment_date' => 'welcome_payment_checked_at',
            'onboard_date' => 'on_boarding_checked_at',
            'fhava' => 'on_boarding_checked_at',


        ];
    }

}