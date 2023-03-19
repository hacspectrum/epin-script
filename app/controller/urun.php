<?php

if( $id = url(2) ){
  // seourl varsa
  $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '$id'");

  if(!$urun->id){
    header("Location: " . site_url());
    exit();
  }else{
    // ürün varsa
    $kategori = DB::getRow("SELECT * FROM chip_kategoriler WHERE id = '".$urun->kategori_id."'");
  }

}else{
  header("Location: " . site_url());
}

require view("urun");

?>
