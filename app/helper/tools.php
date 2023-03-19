<?php

function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}

function kisalt($kelime, $str = 10){
	if (strlen($kelime) > $str)
	{
		if (function_exists("mb_substr")) $kelime = mb_substr($kelime, 0, $str, "UTF-8").'..';
		else $kelime = substr($kelime, 0, $str).'..';
	}
	return $kelime;
}
