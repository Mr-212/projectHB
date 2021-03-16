<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:13 PM
 */
namespace App\Constants;
class ClientStatusConstant extends Base
{


    const CLIENT_ACTIVE = 1;
    const CLIENT_DROPOUT = 2;

    static $array = [
        self::CLIENT_ACTIVE => GeneralConstants::CLIENT_ACTIVE,
        self::CLIENT_DROPOUT => GeneralConstants::CLIENT_DROPOUT,
    ];
}