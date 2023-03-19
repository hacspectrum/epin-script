<?php

if($id = get("id")){
  $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '$id'");

  if($_POST){

    $urun_adi = post("urun_adi", true);
    $chip_miktar = 0;

    $fiyat = post("fiyat", true);
    $fiyat == null ? $fiyat = 0 : null;

    $bizesat_durum = 0;
    $bizesat_fiyat = 0;

    $kategori = post("kategori", true);
    $siralama = post("siralama");

    $seourl = permalink($urun_adi);
    $makale = post("makale");
    $stok = post("stok");

    $api_amount = 0; // api amount
    $api_id = 0; // api array id
    $api_type = 0; // api type

    if(empty($urun_adi) or empty($fiyat) or empty($kategori) or empty($makale)
      or empty($seourl)){
      $response = array(
        'class' => 'warning',
        'message' => 'Boş alan bırakılamaz.'
      );
    }else{
      $update = DB::exec("UPDATE chip_urunler SET urun_adi = '$urun_adi',
                                                  chip_miktar = '$chip_miktar',
                                                  fiyat = '$fiyat',
                                                  bizesat_durum = '$bizesat_durum',
                                                  bizesat_fiyat = '$bizesat_fiyat',
                                                  kategori_id = '$kategori',
                                                  seourl = '$seourl',
                                                  stok = '$stok',
                                                  makale = '$makale',
                                                  api_amount = '$api_amount',
                                                  api_id = '$api_id',
                                                  api_type = '$api_type',
                                                  siralama = '$siralama' WHERE id = '$id'");
      if($update){
        $response = array(
          'class' => 'success',
          'message' => 'Ürün başarıyla güncellendi.'
        );
        header("Refresh:2;url=" . site_url('admin/urun-duzenle') . "?id=" . $id);
      }else{
        if(DB::errorInfo()[2] == null){
          $response = array(
            'class' => 'success',
            'message' => 'Başarıyla güncellendi.'
          );
          header("Refresh:2;url=" . site_url('admin/urun-duzenle') . "?id=" . $id);
        }else{
          $response = array(
            'class' => 'danger',
            'message' => 'Ürün güncellenirken problem oluştu! ' . DB::errorInfo()[2]
          );
        }
      }
    }

  }
}else{
  header("Location: " . site_url("admin/urunler"));
  exit();
}

require view('admin/urun-duzenle');
