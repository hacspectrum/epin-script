<?php

if($id = get("id")){
  $bildirim = DB::getRow("SELECT * FROM odeme_bildirimleri WHERE id = '$id'");
  if(!$bildirim->id){
    header("Location: " . site_url("admin/odeme-bildirimleri"));
    exit();
  }else{
    // bildirim var
    if( get("islem") ){
      switch( get("islem") ){
        case "onayla":
          $update = DB::exec("UPDATE odeme_bildirimleri SET durum = '1' WHERE id = '$id'");
          $bakiyeArttir = DB::exec("UPDATE uyeler SET bakiye = bakiye + '".$bildirim->miktar."' WHERE id = '" . $bildirim->uye_id . "'");
        break;
        case "gecersiz":
          if($bildirim->durum == 1){
            $bakiyeDusur = DB::exec("UPDATE uyeler SET bakiye = bakiye - '".$bildirim->miktar."' WHERE id = '" . $bildirim->uye_id . "'");
          }
          $update = DB::exec("UPDATE odeme_bildirimleri SET durum = '2' WHERE id = '$id'");
        break;
      }
    }
  }
  header("Location: " . site_url("admin/odeme-bildirimleri"));
  exit();
}else{
  header("Location: " . site_url("admin/odeme-bildirimleri"));
  exit();
}
