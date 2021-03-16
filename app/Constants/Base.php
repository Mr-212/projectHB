<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 11/12/20
 * Time: 6:46 PM
 */

namespace App\Constants;

class Base
{

    public function __construct()
    {
    }

    public static function getList(){
        return static::$array;
    }

    public static function getValueByKey($val){

        return array_search($val ,array_flip(static::$array));
    }
    public static function getKeyByValue($val){

        return array_search($val ,static::$array);
    }
}