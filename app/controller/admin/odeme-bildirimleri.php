<?php

$odemeBildirimleri = DB::get("SELECT * FROM odeme_bildirimleri order by id DESC");

if( post("searchEmail") ){
  if( post("email") != null ){
    $odemeBildirimleri = DB::get("SELECT * FROM odeme_bildirimleri WHERE uye_id IN(
      SELECT id FROM uyeler WHERE email LIKE '%" . post("email") . "%'
    ) order by id DESC");
  }
}

if( get("durumListele") ){
  if( get("durum") != null ){
    $odemeBildirimleri = DB::get("SELECT * FROM odeme_bildirimleri WHERE durum = '" . get("durum") . "' order by id DESC");
  }
}

if( post("itemDeleteSubmit") ){

  $items = post("deleteItem");

  $count = 0;
  foreach($items as $item):
    $deleteItem = DB::exec("DELETE FROM odeme_bildirimleri WHERE id = '$item'");
    $count++;
  endforeach;
  if($count > 0){
    $response = array(
      'class' => 'success',
      'message' => 'Silme işlemi başarıyla gerçekleşti.'
    );
    header("Refresh:2; url=" . site_url("admin/odeme-bildirimleri"));
  }
  
}

require view("admin/odeme-bildirimleri");
