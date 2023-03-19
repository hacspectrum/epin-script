<?php

if(defined("LOGGED_IN")){

  $odemeBildirimleri = DB::get("SELECT * FROM odeme_bildirimleri WHERE uye_id = '" . session("uye_id") . "' order by id DESC LIMIT 10");

  $cekimBildirimleri = DB::get("SELECT * FROM cekim_bildirimleri WHERE uye_id = '" . session("uye_id") . "' order by id DESC LIMIT 10");

  if( isset($_GET["q"]) ):
    if( get("q") == "cekim" ){
      $active = "cekim";
    }else if( get("q") == "odeme" ){
      $active = "odeme";
    }
  endif;

  require view("bildirimler");

}else{

  header("Location: " . site_url());

}
