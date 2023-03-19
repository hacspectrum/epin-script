<?php

if($id = url(2)){
  $kategori = DB::getRow("SELECT * FROM chip_kategoriler WHERE id = '$id'");
  if(!$kategori->id){
    header("Location: " . site_url());
  }else{
    // kategori var
    $urunler = DB::get("SELECT * FROM chip_urunler WHERE kategori_id = '$id' order by siralama DESC");
    $urunler_bizesat = DB::get("SELECT * FROM chip_urunler WHERE api_type = '0' AND bizesat_durum = '1' AND kategori_id = '$id' order by siralama DESC");
    $urunler_gamecard = DB::get("SELECT * FROM chip_urunler WHERE api_type = '1' AND bizesat_durum = '0' AND kategori_id = '$id' order by siralama DESC");
  }
}else{
  header("Location: " . site_url());
}

require view("kategori");
