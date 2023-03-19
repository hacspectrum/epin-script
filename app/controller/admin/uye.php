<?php

if($id = get("id")){
  $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '$id'");
  if(!$uye->id){
    header("Location: " . site_url("admin/uyeler"));
  }else{
    // üye var

    $gecmis_siparisler = DB::get("SELECT * FROM siparisler WHERE uye_id = '" . $uye->id . "' order by id DESC");

    if( get("islem") ){
      switch( get("islem") ){
        case "bakiye_sifirla":
          $update = DB::exec("UPDATE uyeler SET bakiye = '0' WHERE id = '".$uye->id."'");
        break;
        case "uye_yap":
          $update = DB::exec("UPDATE uyeler SET rutbe = '0' WHERE id = '".$uye->id."'");
        break;
        case "yonetici_yap":
          $update = DB::exec("UPDATE uyeler SET rutbe = '1' WHERE id = '".$uye->id."'");
        break;
        case "bayi":
          if( get("i") == 0 ){
            $update = DB::exec("UPDATE uyeler SET bayi = '0' WHERE id = '".$uye->id."'");
          }else if( get("i") == 1 ){
            $update = DB::exec("UPDATE uyeler SET bayi = '1' WHERE id = '".$uye->id."'");
          }
        break;
        case "uye_sil":
          $deleteUyelik = DB::exec("DELETE FROM uyeler WHERE id = '" . $uye->id . "'");
          if($deleteUyelik){
            header("Location: " . site_url("admin/uyeler"));
          }else{
            header("Location: " . site_url("admin/uye?id=" . $uye->id));
          }
        break;
      }
      header("Location: " . site_url("admin/uye?id=" . $uye->id));
    }

    if( post("bakiyeDegistir") ){
      $tutar = post("tutar");
      if(!empty($tutar)){
        switch( post("tip") ){
          case 1: // arttir
            $update = DB::exec("UPDATE uyeler SET bakiye = bakiye + '$tutar' WHERE id = '".$uye->id."'");
          break;
          case 2: // eksilt
            $update = DB::exec("UPDATE uyeler SET bakiye = bakiye - '$tutar' WHERE id = '".$uye->id."'");
          break;
        }
        header("Location: " . site_url("admin/uye?id=" . $uye->id));
      }
    }

    if( post("VGbakiyeDegistir") ){
      $tutar = post("tutar");
      if(!empty($tutar)){
        switch( post("tip") ){
          case 1: // arttir
            $update = DB::exec("UPDATE uyeler SET vgbakiye = vgbakiye + '$tutar' WHERE id = '".$uye->id."'");
          break;
          case 2: // eksilt
            $update = DB::exec("UPDATE uyeler SET vgbakiye = vgbakiye - '$tutar' WHERE id = '".$uye->id."'");
          break;
        }
        header("Location: " . site_url("admin/uye?id=" . $uye->id));
      }
    }


  }
}else{
  header("Location: " . site_url("admin/uyeler"));
}

require view("admin/uye");
