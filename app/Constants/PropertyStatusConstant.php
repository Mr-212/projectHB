<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:13 PM
 */
namespace App\Constants;
class PropertyStatusConstant extends Base
{


    const BEFORE_DUE_DILIGENCE = 1;
    const BEFORE_DUE_DILIGENCE_EXPIRE = 2;
    const HOUSE_BOOKED = 3;
    const HOUSE_SOLD = 4;
    const HOUSE_CANCELLED = 5;
    const HOUSE_VACANT = 6;
    const HOUSE_EVICTED = 7;
    const CLIENT_DROPOUT = 8;

    static $array = [
        self::BEFORE_DUE_DILIGENCE => GeneralConstants::BEFORE_DUE_DILIGENCE,
        self::BEFORE_DUE_DILIGENCE_EXPIRE => GeneralConstants::BEFORE_DUE_DILIGENCE_EXPIRE,
        self::HOUSE_BOOKED => GeneralConstants::HOUSE_BOOKED,
        self::HOUSE_SOLD => GeneralConstants::HOUSE_SOLD,
        self::HOUSE_CANCELLED => GeneralConstants::HOUSE_CANCELLED,
        self::HOUSE_VACANT => GeneralConstants::HOUSE_VACANT,
        self::HOUSE_EVICTED => GeneralConstants::HOUSE_EVICTED,
        self::CLIENT_DROPOUT => GeneralConstants::CLIENT_DROPOUT,

    ];
}