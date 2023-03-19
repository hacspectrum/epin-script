<?php

if($seourl = url(1)){
	$makale = DB::getRow("SELECT * FROM makaleler WHERE seourl = '$seourl'");
	if(!$makale->id){
		header("Location: " . site_url());
	}else{
		// makale var
		$diger_makaleler = DB::get("SELECT * FROM makaleler WHERE id != '" . $makale->id . "'");
	}
}else{
	header("Location: " . site_url());
}

require view("makale");
