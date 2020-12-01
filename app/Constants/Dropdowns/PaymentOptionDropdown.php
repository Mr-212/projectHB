<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:13 PM
 */

namespace App\Constants\Dropdowns;
use App\Constants\Base;
use App\Constants\GeneralConstants;


class PaymentOptionDropdown extends Base
{


    const PAYMENT_OPTION_3_MONTH = 1;
    const PAYMENT_OPTION_6_MONTH = 2;
    const PAYMENT_OPTION_12_MONTH = 3;


    static $array = [
        self::PAYMENT_OPTION_3_MONTH => GeneralConstants::PAYMENT_OPTION_3_MONTH,
        self::PAYMENT_OPTION_6_MONTH => GeneralConstants::PAYMENT_OPTION_6_MONTH,
        self::PAYMENT_OPTION_12_MONTH => GeneralConstants::PAYMENT_OPTION_12_MONTH,
    ];
}