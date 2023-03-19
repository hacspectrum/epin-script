<?php

$sayfada = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.

$toplam_icerik = DB::getVar("SELECT COUNT(*) FROM uyeler");
$toplam_sayfa = ceil($toplam_icerik / $sayfada);

$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

if($sayfa < 1) $sayfa = 1;
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

$limit = ($sayfa - 1) * $sayfada;
$uyeler = DB::get("SELECT * FROM uyeler order by id DESC LIMIT " . $limit . ", " . $sayfada);

$sayfa_goster = 10;

if( get("bakiyeListele") ){
  if( get("tip") != null ){
    switch(get("tip")){
      case 0:
        $uyeler = DB::get("SELECT * FROM uyeler order by bakiye DESC");
      break;
      case 1:
        $uyeler = DB::get("SELECT * FROM uyeler order by bakiye ASC");
      break;
    }
  }
}

if( get("bayiListele") ){
  $uyeler = DB::get("SELECT * FROM uyeler WHERE bayi = '1'");
}

if( get("searchEmail") ){
  if( get("email") != null ){
    $uyeler = DB::get("SELECT * FROM uyeler WHERE email LIKE '%" . get("email") . "%' order by id DESC");
  }else{
  	$uyeler = DB::get("SELECT * FROM uyeler WHERE adsoyad LIKE '%" . get("name") . "%' order by id DESC");
  }
}

require view("admin/uyeler");
