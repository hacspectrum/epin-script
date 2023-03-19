<?php

if($_POST){

  $urun_adi = post("urun_adi", true);
  $chip_miktar = 0;

  $fiyat = post("fiyat", true);

  $bizesat_durum = 0;
  $bizesat_fiyat = 0;

  $kategori = post("kategori", true);
  $siralama = post("siralama", true);
  if(!$siralama):
    $siralama = 0;
  endif;

  $seourl = permalink($urun_adi);
  $makale = post("makale");
  $stok = post("stok");

  $api_amount = 0;
  $api_id = 0;
  $api_type = 0;

  if(!$urun_adi or !$fiyat or empty($kategori) or !$seourl or $stok == null){
    $response = array(
      'class' => 'warning',
      'message' => 'Boş alan bırakılamaz.'
    );
  }else{
    $insert = DB::insert("INSERT INTO chip_urunler(urun_adi,chip_miktar,fiyat,bizesat_durum,bizesat_fiyat,kategori_id,seourl,makale,stok,api_amount,api_id,api_type,api_chipcin,api_chipcin_id,api_chipcin_cat_id,siralama)
                          VALUES('$urun_adi',
                                 '$chip_miktar',
                                 '$fiyat',
                                 '$bizesat_durum',
                                 '$bizesat_fiyat',
                                 '$kategori',
                                 '$seourl',
                                 '$makale',
                                 '$stok',
                                 '$api_amount',
                                 '$api_id',
                                 '$api_type',
                                 '0',
                                 '0',
                                 '0',
                                 '$siralama'
                               )");
    if($insert){
      $response = array(
        'class' => 'success',
        'message' => 'Ürün başarıyla eklendi.'
      );
      header("Refresh:2;url=" . site_url('admin/urunler'));
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Ürün eklenirken problem oluştu. '.DB::errorInfo()[2]
      );
    }
  }

}

require view('admin/urun-ekle');
