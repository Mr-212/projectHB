<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:13 PM
 */
namespace App\Constants;
class PropertyStageConstant extends Base
{


    const BEFORE_DUE_DILIGENCE = 1;
    const BEFORE_DUE_DILIGENCE_EXPIRE = 2;
    const HOUSE_BOOKED = 3;
    const HOUSE_SOLD = 4;
    const HOUSE_CANCELLED = 5;

    static $array = [
        self::BEFORE_DUE_DILIGENCE => GeneralConstants::BEFORE_DUE_DILIGENCE,
        self::BEFORE_DUE_DILIGENCE_EXPIRE => GeneralConstants::BEFORE_DUE_DILIGENCE_EXPIRE,
        self::HOUSE_BOOKED => GeneralConstants::HOUSE_BOOKED,
        self::HOUSE_SOLD => GeneralConstants::HOUSE_SOLD,
        self::HOUSE_CANCELLED => GeneralConstants::HOUSE_CANCELLED,

    ];
}