<?php

if($id = get("id")){
  $bildirim = DB::getRow("SELECT * FROM cekim_bildirimleri WHERE id = '$id'");
  if(!$bildirim->id){
    header("Location: " . site_url("admin/cekim-bildirimleri"));
    exit();
  }else{
    // bildirim var
    if( get("islem") ){
      switch( get("islem") ){
        case "onayla":
          $update = DB::exec("UPDATE cekim_bildirimleri SET durum = '1' WHERE id = '$id'");
          $bakiyeDusur = DB::exec("UPDATE uyeler SET vgbakiye = vgbakiye - '" . $bildirim->miktar . "' WHERE id = '" . $bildirim->uye_id . "'");
        break;
        case "gecersiz":
          if($bildirim->durum == 1){
            $bakiyeArttir = DB::exec("UPDATE uyeler SET vgbakiye = vgbakiye + '" . $bildirim->miktar . "' WHERE id = '" . $bildirim->uye_id . "'");
          }
          $update = DB::exec("UPDATE cekim_bildirimleri SET durum = '2' WHERE id = '$id'");
        break;
      }
    }
  }
  header("Location: " . site_url("admin/cekim-bildirimleri"));
  exit();
}else{
  header("Location: " . site_url("admin/cekim-bildirimleri"));
  exit();
}
