<?php

require 'app/init.php';

if(get("chipcin") == "aqk12300vmpü0f99"){

  $waitingChipSatisiComOrders = DB::get("SELECT * FROM siparisler WHERE durum = '0' AND chipcin_pid != ''");

  foreach($waitingChipSatisiComOrders as $order):
    
    $json = json_decode(chipcin_api_request(array(
      'action' => 'order', 
      'id' => $order->chipcin_pid
    )));

    if($json->type == "success"){
      
      if($json->result->status == "cancel"){
        DB::exec("UPDATE siparisler SET durum = '2', yorum = '" . $json->result->note . "' WHERE id = '" . $order->id . "'");
      }

      if($json->result->status == "complete"){
        DB::exec("UPDATE siparisler SET durum = '1', api_code = '" . $json->result->meta->apicodes . "', yorum = '" . $json->result->note . "' WHERE id = '" . $order->id . "'");
      }

    }
    
  endforeach;

}else{

  header("Location: " . site_url());
  exit;

}