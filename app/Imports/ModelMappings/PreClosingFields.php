<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 3/5/21
 * Time: 3:09 PM
 */

namespace App\Imports\ModelMappings;


class PreClosingFields extends Base
{

        static $array =   [
            'save' =>'deal_save_checked',
            'appraisal' =>'appraisal_value',
            'appraisal_date' =>'appraisal_value_checked_at',
            'lease_expiration_date' =>'lease_expiration_date',
//            'lease_expiration_date' =>'lease_expiration_date',
            '3_mo_option' =>'payment_option_3_month',
            '6_mo_option' =>'payment_option_6_month',
            '12_mo_option' =>'payment_option_12_month',

            'payment_option_3_month' =>'payment_option_3_month',
            'payment_option_6_month' =>'payment_option_6_month',
            'payment_option_12_month' =>'payment_option_12_month',

            'proof_of_renters_insurance' => 'renters_insurance_checked',
            'welcome_pmt' => 'welcome_payment_checked',
            'welcome_payment_date' => 'welcome_payment_checked_at',
            'onboard_date' => 'on_boarding_checked_at',

            'total_option' => 'total_payment_options',
            'rent' => 'rent',
            'inspection_date' => 'inspection_checked_at',

        ];



//    static function  get_checked_fields(&$array){
//        if(!empty($array)){
//            foreach ($array as $k => $v){
//
//            }
//        }
//    }


    static function checklist(){
          return [
              'inspection_checked_at' => [
                'inspection_checked'=> 1
                ],
              'welcome_payment_checked_at' => [
                  'welcome_payment_checked' => 1
                ],

              'appraisal_value_checked_at' => [
                  'appraisal_value_checked' => 1
                ],

              'lease_expiration_date' => [
                  'lease_signed_checked_at' => 1
                ],

          ];
    }



}