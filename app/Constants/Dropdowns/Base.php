<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:46 PM
 */

namespace App\Constants\Dropdowns;


class Base
{

    public function __construct()
    {
    }

    public static function getList(){
        return static::$array;
    }

    public static function getKey($val){
        return array_search($val ,self::$array);
    }
}