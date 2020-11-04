<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/26/20
 * Time: 6:02 PM
 */

namespace App\Services;


class APITokenResolverService
{

    private $client_id;
    private $client_secret;
    private  $api_url;

    public function __construct($api_url,$clientID,$client_secret)
    {
        $this->client_id = $clientID;
    }

}