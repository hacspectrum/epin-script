<?php

$sayfada = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.

$toplam_icerik = DB::getVar("SELECT COUNT(*) FROM siparisler");
$toplam_sayfa = ceil($toplam_icerik / $sayfada);

$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

if($sayfa < 1) $sayfa = 1;
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

$limit = ($sayfa - 1) * $sayfada;
$siparisler = DB::get("SELECT * FROM siparisler order by id DESC LIMIT " . $limit . ", " . $sayfada);

$sayfa_goster = 10;

if( get("durumListele") ){
  if( get("durum") != null ){
    $siparisler = DB::get("SELECT * FROM siparisler WHERE durum = '" . get("durum") . "' order by id DESC");
  }
}

if( get("searchEmail") ){
  if( get("email") != null ){
    $siparisler = DB::get("SELECT * FROM siparisler WHERE uye_id IN(
      SELECT id FROM uyeler WHERE email LIKE '%" . get("email") . "%'
    ) order by id DESC");
  }
}

if( get("searchIslemNo") ){
  if( get("islem_no") != null ){
    $siparisler = DB::get("SELECT * FROM siparisler WHERE islem_no = '" . get("islem_no") . "' order by id DESC");
  }
}

if( post("itemDeleteSubmit") ){

  $items = post("deleteItem");

  $count = 0;
  foreach($items as $item):
    $deleteItem = DB::exec("DELETE FROM siparisler WHERE id = '$item'");
    $count++;
  endforeach;
  if($count > 0){
    $response = array(
      'class' => 'success',
      'message' => 'Silme işlemi başarıyla gerçekleşti.'
    );
    header("Refresh:2; url=" . site_url("admin/siparisler"));
  }

}

require view("admin/siparisler");
