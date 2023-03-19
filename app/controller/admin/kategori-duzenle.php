<?php

if($id = get("id")){
  $kategori = DB::getRow("SELECT * FROM chip_kategoriler WHERE id = '$id'");

  if($_POST){

    $kategori_adi = post("kategori_adi", true);
    $gorsel = $_FILES["gorsel"];
    $gorsel = fileUpload($gorsel, 'public/kategori');
    if($gorsel == null){
      $gorsel = $kategori->gorsel;
    }
    $anasayfa_gorunumu = post("anasayfa_gorunumu",true);
    $aciklama = post("aciklama");

    if(!$kategori_adi or !$gorsel or $anasayfa_gorunumu == null){
      $response = array(
        'class' => 'warning',
        'message' => 'Boş alan bırakılamaz.'
      );
    }else{
      $update = DB::exec("UPDATE chip_kategoriler SET kategori_adi = '$kategori_adi',
                                                      gorsel = '$gorsel',
                                                      anasayfa_gorunumu = '$anasayfa_gorunumu',
                                                      aciklama = '$aciklama' WHERE id = '$id'");
      if($update){
        $response = array(
          'class' => 'success',
          'message' => 'Kategori başarıyla güncellendi.'
        );
        header("Refresh:2;url=" . site_url('admin/kategori-duzenle') . "?id=" . $id);
      }else{
        $response = array(
          'class' => 'danger',
          'message' => 'Kategori güncellenirken problem oluştu!'
        );
      }
    }

  }

}else{
  header("Location: " . site_url('admin/kategoriler'));
  exit();
}

require view('admin/kategori-duzenle');

?>
