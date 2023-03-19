<?php

if($_POST){
  //post
  $gorsel = $_FILES["gorsel"];
  $baslik = post("baslik", true);
  $seourl = permalink($baslik);
  $yazi = post("yazi");

  if(!$gorsel or !$baslik or !$yazi){
    $response = array(
      'class' => 'warning',
      'message' => 'Boş alan bırakılamaz.'
    );
  }else {
    $uploadedImage = fileUpload($gorsel, 'public/makale');
    if($uploadedImage){
      $insertMakale = DB::insert("INSERT INTO makaleler(baslik,yazi,photo,seourl) VALUES('$baslik','$yazi','$uploadedImage','$seourl')");
      if($insertMakale){
        $response = array(
          'class' => 'success',
          'message' => 'Makale başarıyla eklendi.'
        );
        header("Refresh:2;url=" . site_url("admin/makaleler"));
      }else{
        $response = array(
          'class' => 'danger',
          'message' => 'Makale eklenirken bir sorun oluştu.'
        );
      }
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Görsel yüklenemedi. Lütfen tekrar deneyin.'
      );
    }
  }

}

require view("admin/makale-ekle");
