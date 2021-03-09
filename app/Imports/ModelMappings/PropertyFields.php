<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 3/5/21
 * Time: 3:09 PM
 */

namespace App\Imports\ModelMappings;


class PropertyFields extends Base
{

       public static $array = [
            'tenant1' =>'tenant1',
            'tenant2' =>'tenant2',
            'tenant3' =>'tenant3',
            'tenant4' =>'tenant4',

            'builder' =>'new_construction_builder',

            'house_address' =>'house_number_and_street',
            'house address' =>'house_number_and_street',
            'city' =>'city',
            'county' =>'county',
            'state' =>'state',
            'zip' =>'zip',

            'gross_rent' =>'gross_monthly_rent',
            'annual_tax' =>'annual_property_tax',
            'insurance' =>'annual_insurance_fee',
            'net_rent' =>'net_monthly_rent',

            'closing_costs' => 'closing_cost',
            'closing_cost' => 'closing_cost',

            'purchase_date' =>'closing_date',
//            'appraisal' =>'appraisal_value',
            'fhava' => 'mortgage_type_id',
            'hoa' => 'hoa_annual_fee',
            'purchase_price' => 'purchase_price',
            'closing_credit_general' => 'closing_credit_general',
            'repair_credit' => 'repair_credit',
//            'days_held' => 'days_held',
            'lender' => 'lender_name',

        ];


}