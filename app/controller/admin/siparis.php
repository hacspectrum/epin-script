<?php

if($id = get("id")){
  $siparis = DB::getRow("SELECT * FROM siparisler WHERE id = '$id'");
  if(!$siparis->id){
    header("Location: " . site_url("admin/siparisler"));
    exit();
  }else{
    // bu sipariş var
    $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '" . $siparis->uye_id . "'");
    $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . $siparis->urun_id . "'");

    if( get('islem') ){
      switch( get('islem') ){
        case "teslim":
          if($siparis->durum == 0 && post("teslimEtmeFormu")){
            $guncelle = DB::exec("UPDATE siparisler SET durum = '1', aciklama = '" . post("aciklama") . "' WHERE id = '$id'");
          }
        break;
        case "iptal":
          if($siparis->durum == 0){
            if( post("iptalEtmeFormu") ):
              $iptal_sebebi = post("iptal_sebebi");
              if(!empty($iptal_sebebi)){
                $guncelle = DB::exec("UPDATE siparisler SET durum = '2', yorum = '$iptal_sebebi' WHERE id = '$id'");
                if($guncelle){
                  $bakiyeArttir = DB::exec("UPDATE uyeler SET bakiye = bakiye + '" . $siparis->odenen_tutar . "' WHERE id = '" . $uye->id . "'");
                }
                header("Location: " . site_url("admin/siparis?id=" . $id));
              }
            endif;
          }
        break;
      }
      header("Location: " . site_url("admin/siparis?id=" . $id));
    }

  }
}else{
  header("Location: " . site_url("admin"));
}

require view("admin/siparis");
