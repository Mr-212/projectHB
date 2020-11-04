<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/26/20
 * Time: 3:24 PM
 */

namespace App\Contracts\Interfaces;


interface APIServices
{
//    public function getClientID();
//    public function getClientSecret();
    public function getRefreshToken();
    public function getAccessToken();
//    public function setAccessToken();

}