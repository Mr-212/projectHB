<?php

 function curl_request($url, $method = 'GET', $data = array(), $header = array())
{

    $curl = curl_init();
    $options_array  = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
    );
    if($data){
        $options_array[CURLOPT_POSTFIELDS] = $data ;
    }
    if($header){
        $options_array[CURLOPT_HTTPHEADER] = $header ;
    }
    curl_setopt_array($curl,$options_array);
    $result = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    $response = json_decode($result, true);
    return $response;
}

