<?php

if( $_POST ){
  $baslik = post("baslik");
  $yazi = post("yazi");

  if(empty($baslik) or empty($yazi)){
    $response = array(
      'class' => 'warning',
      'message' => 'Boş alan bırakılamaz.'
    );
  }else{
    $insert = DB::insert("INSERT INTO yardim(baslik,yazi) VALUES('$baslik', '$yazi')");
    if($insert){
      $response = array(
        'class' => 'success',
        'message' => 'Yardım başlığı başarıyla eklendi.'
      );
      header("Refresh:2;url=" . site_url("admin/yardim"));
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Yardım başlığı eklenemedi.'
      );
    }
  }
}

require view("admin/yardim-ekle");
