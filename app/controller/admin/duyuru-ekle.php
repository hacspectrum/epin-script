<?php

if( $_POST ):

  $duyuru_metni = post("duyuru_metni", true);

  if(!$duyuru_metni){
    $response = array(
      'class' => 'warning',
      'message' => 'Boş alan bırakılamaz.'
    );
  }else{
    $insertDuyuru = DB::insert("INSERT INTO duyurular(duyuru) VALUES('$duyuru_metni')");
    if($insertDuyuru){
      $response = array(
        'class' => 'success',
        'message' => 'Duyuru başarıyla eklendi.'
      );
      header("Refresh:2;url=" . site_url('admin/duyurular'));
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Duyuru eklenemedi.'
      );
    }
  }

endif;

require view("admin/duyuru-ekle");
