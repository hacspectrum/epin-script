<?php

if(defined("LOGGED_IN")):

  if(!get("sayfa")){
    header("Refresh:10;url=" . site_url("admin"));
  }
  
  $silinen = 0;
  /* 30 Günden fazla süren kayıtları temizlediği için kapatıyoruz.
  foreach($hareketler as $hr):
    $tarih1 = date_create($hr->tarih);
    $tarih2 = date_create(date("d.m.Y H:i"));
    $tarih_farki  = date_diff($tarih1, $tarih2);
    if($tarih_farki->format('%R%a') > 30):
      $delete = DB::exec("DELETE FROM hareketler WHERE id = '" . $hr->id . "'");
      if($delete){
        $silinen++;
      }
    endif;
  endforeach;
  */

  $sayfada = 10;

  $toplam_icerik = DB::getVar('SELECT COUNT(*) FROM hareketler');

  $toplam_sayfa = ceil($toplam_icerik / $sayfada);

  $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

  if($sayfa < 1) $sayfa = 1;
  if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

  $limit = ($sayfa - 1) * $sayfada;

  $hareketler = DB::get("SELECT * FROM hareketler WHERE uye_id IN(
      SELECT id FROM uyeler WHERE bayi = '0'
    ) order by id DESC LIMIT " . $limit . ", " . $sayfada);

  if(get("hareketArama")){
    $q = get("q");
    $hareketler = DB::get("SELECT * FROM hareketler WHERE uye_id IN(
        SELECT id FROM uyeler WHERE bayi = '0' AND email LIKE '%" . $q . "%'
      ) order by id DESC LIMIT " . $limit . ", " . $sayfada);
  }else{
    $hareketler = DB::get("SELECT * FROM hareketler WHERE uye_id IN(
        SELECT id FROM uyeler WHERE bayi = '0'
      ) order by id DESC LIMIT " . $limit . ", " . $sayfada);
  }

  $sayfa_goster = 11; // gösterilecek sayfa sayısı

endif;

require view('admin/index');
