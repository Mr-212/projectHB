<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:13 PM
 */

namespace App\Constants\Dropdowns;


class YesNoDropdown extends Base
{


    const NO = 'No';
    const YES = 'Yes';

    static $array = [
        '0' => self::NO,
        '1' => self::YES,
    ];
}