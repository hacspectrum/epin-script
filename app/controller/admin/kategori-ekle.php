<?php

if($_POST){

  $kategori_adi = post("kategori_adi", true);
  $gorsel = $_FILES["gorsel"];
  $anasayfa_gorunumu = post("anasayfa_gorunumu", true);
  $aciklama = post("aciklama");

  if(!$kategori_adi or !$gorsel or $anasayfa_gorunumu == null){
    echo '<div class="alert alert-warning">Boş alan bırakılamaz.</div>';
  }else{
    $gorsel = fileUpload($gorsel, 'public/kategori');
    $insert = DB::insert("INSERT INTO chip_kategoriler(kategori_adi,gorsel,anasayfa_gorunumu,aciklama) VALUES('$kategori_adi','$gorsel','$anasayfa_gorunumu','$aciklama')");
    if($insert){
      $response = array(
        'class' => 'success',
        'message' => 'Kategori başarıyla eklendi.'
      );
      header("Refresh:2;url=" . site_url('admin/kategoriler'));
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Kategori eklenirken problem oluştu!'
      );
    }
  }

}

require view('admin/kategori-ekle');
