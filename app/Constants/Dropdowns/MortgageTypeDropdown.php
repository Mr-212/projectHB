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


class MortgageTypeDropdown extends Base
{


    const FHA = 1;
    const VA = 2;
    const USDA = 3;
    const CONVENTIONAL = 4;
    const NON_QM = 5;

    static $array = [
        self::FHA => GeneralConstants::FHA,
        self::VA => GeneralConstants::VA,
        self::USDA => GeneralConstants::USDA,
        self::CONVENTIONAL => GeneralConstants::CONVENTIONAL,
        self::NON_QM => GeneralConstants::NON_QM,
    ];
}