<?php

if($id = get("id")){
  $yardim = DB::getRow("SELECT * FROM yardim WHERE id = '$id'");

  if($_POST){
    $baslik = post("baslik");
    $yazi = post("yazi");

    if(empty($baslik) or empty($yazi)){
      $response = array(
        'class' => 'warning',
        'message' => 'Boş alan bırakılamaz.'
      );
    }else{
      $update = DB::exec("UPDATE yardim SET baslik = '$baslik', yazi = '$yazi' WHERE id = '$id'");
      if($update){
        $response = array(
          'class' => 'success',
          'message' => 'Yardım başlığı başarıyla güncellendi.'
        );
        header("Refresh:2;url=" . site_url("admin/yardim-duzenle") . "?id=" . $id);
      }else{
        $response = array(
          'class' => 'danger',
          'message' => 'Yardım başlığı güncellenemedi.'
        );
      }
    }
  }

}else{
  header("Location: " . site_url("admin/yardim"));
  exit();
}

require view("admin/yardim-duzenle");

?>
