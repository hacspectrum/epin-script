<?php

$urunler = DB::get("SELECT * FROM chip_urunler order by id DESC");

if( get("kategoriListele") ){
  if( get("kategori_no") != null ){
    $urunler = DB::get("SELECT * FROM chip_urunler WHERE kategori_id = '" . get("kategori_no") . "' order by id DESC");
  }
}

require view("admin/urunler");
