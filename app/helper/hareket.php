<?php

function hareketEkle($uye_id, $hareket_tipi, $ek = null){
  $tarih = date("d.m.Y H:i");
  $insertHareket = DB::insert("INSERT INTO hareketler(hareket_tipi,uye_id,tarih,ek)
                               VALUES(?,?,?,?)", array(
                                 $hareket_tipi,
                                 $uye_id,
                                 $tarih,
                                 $ek
                               ));
  if($insertHareket){
    // başarılı
  }else{
    // başarısız
  }
}
