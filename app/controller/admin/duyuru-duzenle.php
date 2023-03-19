<?php

if( $id = get("id") ){
  $duyuru = DB::getRow("SELECT * FROM duyurular WHERE id = '$id'");
  if(!$duyuru->id){
    header("Location: " . site_url("admin/duyurular"));
  }else{
    // duyuru var
    if( $_POST ){
      $duyuru_metni = post("duyuru_metni", true);

      if(!$duyuru_metni){
        $response = array(
          'class' => 'warning',
          'message' => 'Boş alan bırakılamaz.'
        );
      }else{
        $updateDuyuru = DB::exec("UPDATE duyurular SET duyuru = '$duyuru_metni' WHERE id = '$id'");
        if($updateDuyuru){
          $response = array(
            'class' => 'success',
            'message' => 'Duyuru başarıyla güncellendi.'
          );
          header("Refresh:2;url=" . site_url('admin/duyuru-duzenle?id=' . $id));
        }else{
          $response = array(
            'class' => 'danger',
            'message' => 'Duyuru güncellenemedi. ' . DB::errorInfo()[2]
          );
        }
      }
    }
  }
}else{
  header("Location: " . site_url("admin/duyurular"));
}

require view("admin/duyuru-duzenle");
