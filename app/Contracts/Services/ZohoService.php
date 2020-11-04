<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 10/26/20
 * Time: 3:25 PM
 */

namespace App\Contracts\Services;


use App\Contracts\Interfaces\APIServices;
use App\Models\APIToken;

class ZohoService implements APIServices
{
    private $refresh_token = '1000.90fe5aa5a903cd3d549170dc1a063ba4.709085db186638d542acf9fb9032c163';
    private $api_name = 'zoho';
    private $service_model;
    private $client_secret;
    private $client_id;
    private $api_url;
    private $account_url = 'https://accounts.zoho.com/oauth/v2/token?';



    public function __construct()
    {
        $this->api_url = 'https://www.zohoapis.com/crm/v2';
        $this->resolveAPIClientIDSecret();
        $this->service_model = APIToken::class;

    }


    private function resolveAPIClientIDSecret(){

        if(env('APP_ENV') == 'local'){
            $this->client_id = '1000.YV5Q84UW9B6ZFVGNAFVMPGXGQVL35H';
            $this->client_secret = '2400579f4fe176fafb362c3f35b4faa426fbcc1b21';

        }else{
            $this->client_id = '1000.YV5Q84UW9B6ZFVGNAFVMPGXGQVL35H';
            $this->client_secret = '2400579f4fe176fafb362c3f35b4faa426fbcc1b21';
        }
    }


    public function getClientSecret(){
        return $this->client_secret;
    }


    public function getClientID(){
        return $this->client_id;
    }

    public function getRefreshToken()
    {
        $refresh_token = null;
        $file = $this->getTokenPath()."/zoho_token.json";

        if (file_exists($file)) {
            $file_content = file_get_contents($file);
            $token = json_decode($file_content);
            $refresh_token = $token->refresh_token;
        }
        return $refresh_token;

    }

     public function getAccessToken()
    {
        $access_token = null;
        //$is_token_exist= $this->service_model->where('name',$this->api_name)->first(['access_token']);
        $is_token_exist= json_decode(file_get_contents($this->getTokenPath()));
        //dd($is_token_exist);
//        if($is_token_exist){
//            $access_token = $is_token_exist->access_token;
//        }else{
            $access_token = $this->setAccessToken();
//        }

        return $access_token;

    }
    private function setAccessToken(){
        $access_token = null;
        $url = $this->account_url;
        $data = [
            "refresh_token" => $this->refresh_token,
            "grant_type" => "refresh_token",
            "client_id" => $this->client_id,
            "client_secret" => $this->client_secret,
        ];
        $response = curl_request($url,'POST',$data);
        if($response && isset($response['access_token'])){
            $access_token = $response['access_token'];
            file_put_contents($this->getTokenPath(), json_encode($response));
        }

        return $access_token;

    }

    private function getHeaders(){
        return array("Authorization: Zoho-oauthtoken   ". $this->getAccessToken());
    }


    private function getTokenPath(){

        $path = base_path() . "/Tokens";
        $file = $path.'/'.$this->api_name."_token.json";
        if(!is_dir($path)){
            mkdir($path,0755);
            $file = $file;
        }
        if(!file_exists($file)){
            touch($file);
        }

        return $file;
    }




    /////////////////////////////////////////
    ///
    public function getDeals(){
        $url = $this->api_url.'/Deals';
        $response = curl_request($url, 'GET','',$this->getHeaders());
        dd($response);
    }

    public function getDealByStage($stage = 'Onboard to Dream'){
        //dd($this->getHeaders());
        $stage = 'Closed Denied';
        $param =[
            'stage'=> $stage
        ];
        $param = http_build_query($param);

        $url = $this->api_url."/Deals?stage={$stage}";
        //dd($url);
        $response = curl_request($url, 'GET','',$this->getHeaders());
        dd($response);
    }



 }