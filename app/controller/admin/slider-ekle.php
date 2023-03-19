<?php

if($_POST){
  // post
  $slideImage = $_FILES["slideImage"];
  $uploadedImage = fileUpload($slideImage, "public/slider", false);

  if(empty($uploadedImage)){
    $response = array(
      'class' => 'warning',
      'message' => 'Boş alan bırakamazsınız.'
    );
  }else{
    $insertSlide = DB::insert("INSERT INTO slider(gorsel) VALUES('$uploadedImage')");
    if($insertSlide){
      $response = array(
        'class' => 'success',
        'message' => 'Slide başarıyla eklendi.'
      );
      header("Refresh:2;url=" . site_url("admin/slider"));
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Slide eklenirken hata oluştu.'
      );
    }
  }
}

require view("admin/slider-ekle");
