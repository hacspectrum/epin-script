<?php

if($id = get("id")){
  $makale = DB::getRow("SELECT * FROM makaleler WHERE id = '$id'");

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
      if(empty($uploadedImage)){
        $uploadedImage = $makale->photo;
      }

      if($uploadedImage){
        $update = DB::exec("UPDATE makaleler SET baslik = '$baslik',
                                                 seourl = '$seourl',
                                                 yazi = '$yazi',
                                                 photo = '$uploadedImage' WHERE id = '$id'");
        if($update){
          $response = array(
            'class' => 'success',
            'message' => 'Makala başarıyla güncellendi.'
          );
          header("Refresh:2;url=" . site_url("admin/makale-duzenle") . "?id=" . $id);
        }else{
          $response = array(
            'class' => 'danger',
            'message' => 'Makale güncellenirken problem oluştu.'
          );
        }
      }else{
        $response = array(
          'class' => 'danger',
          'message' => 'Görsel yüklenemedi.'
        );
      }
    }
  }

}else{
  header("Location: " . site_url("admin/makaleler"));
}

require view("admin/makale-duzenle");
