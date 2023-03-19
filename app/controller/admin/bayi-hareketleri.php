<?php

if(!get("sayfa")){
  header("Refresh:10;url=" . site_url("admin/bayi-hareketleri"));
}

$hareketler = DB::get("SELECT * FROM hareketler WHERE uye_id IN(
    SELECT id FROM uyeler WHERE bayi = '1'
  ) order by id DESC");

$sayfada = 10;

$toplam_icerik = DB::getVar("SELECT COUNT(*) FROM hareketler WHERE uye_id IN(
    SELECT id FROM uyeler WHERE bayi = '1'
  )");

$toplam_sayfa = ceil($toplam_icerik / $sayfada);

$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

if($sayfa < 1) $sayfa = 1;
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

$limit = ($sayfa - 1) * $sayfada;
$hareketler = DB::get("SELECT * FROM hareketler WHERE uye_id IN(
    SELECT id FROM uyeler WHERE bayi = '1'
  ) order by id DESC LIMIT " . $limit . ", " . $sayfada);

$sayfa_goster = 11; // gösterilecek sayfa sayısı

require view("admin/bayi-hareketleri");
