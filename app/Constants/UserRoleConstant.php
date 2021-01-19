<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:13 PM
 */
namespace App\Constants;
class UserRoleConstant extends Base
{


    const SUPER_ADMIN = 1;
    const ADMIN = 2;
    const USER = 2;

    static $array = [
        self::SUPER_ADMIN => GeneralConstants::SUPER_ADMIN,
        self::ADMIN => GeneralConstants::ADMIN,
        self::USER => GeneralConstants::USER,
    ];
}