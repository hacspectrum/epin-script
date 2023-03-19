<?php

if($id = get("id")){
  $siparis = DB::getRow("SELECT * FROM bize_sat WHERE id = '$id'");
  if(!$siparis->id){
    header("Location: " . site_url("admin/satislar"));
    exit();
  }else{
    // bu sipariş var
    $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '" . $siparis->uye_id . "'");
    $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . $siparis->urun_id . "'");

    if( get('islem') ){
      switch( get('islem') ){
        case "teslim":
          $guncelle = DB::exec("UPDATE bize_sat SET durum = '1' WHERE id = '$id'");
          $bakiyeArttir = DB::exec("UPDATE uyeler SET vgbakiye = vgbakiye + '" . $siparis->verilecek_tutar . "' WHERE id = '" . $siparis->uye_id . "'");
        break;
        case "iptal":
          if( post("iptalEtmeFormu") ):
            $iptal_sebebi = post("iptal_sebebi");
            if(!empty($iptal_sebebi)){
              if( $siparis->durum == 1 ){
                $bakiyeDusur = DB::exec("UPDATE uyeler SET vgbakiye = vgbakiye - '" . $siparis->verilecek_tutar . "' WHERE id = '" . $siparis->uye_id . "'");
              }
              $guncelle = DB::exec("UPDATE bize_sat SET durum = '2', yorum = '$iptal_sebebi' WHERE id = '$id'");
            }
          endif;
        break;
      }
      header("Location: " . site_url("admin/satis?id=" . $id));
    }

  }
}else{
  header("Location: " . site_url("admin/satislar"));
  exit();
}

require view("admin/satis");
