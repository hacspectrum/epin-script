<?php

function chipcin_api_request($params = array()){
    $params['api_key'] = CHIPCIN_SIFRE;
    $params['api_mail'] = CHIPCIN_EMAIL;
    $url = "https://chipsatisi.com/request/";
    $options = array( 
        CURLOPT_RETURNTRANSFER 	=> true,
        CURLOPT_HEADER 			=> false,
        CURLOPT_ENCODING 		=> "",
        CURLOPT_AUTOREFERER 	=> true,
        CURLOPT_CONNECTTIMEOUT 	=> 15,
        CURLOPT_TIMEOUT 		=> 50,
        CURLOPT_MAXREDIRS 		=> 10,
        CURLOPT_SSL_VERIFYPEER 	=> false,
        CURLOPT_FOLLOWLOCATION 	=> true,
        CURLOPT_POST 			=> true,
        CURLOPT_POSTFIELDS 		=> $params,
        CURLOPT_USERAGENT		=> 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13'
    );
    $ch = curl_init($url);
    curl_setopt_array($ch, $options);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}