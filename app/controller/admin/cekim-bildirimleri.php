<?php

$cekimBildirimleri = DB::get("SELECT * FROM cekim_bildirimleri order by id DESC");

if( post("searchEmail") ){
  if( post("email") != null ){
    $cekimBildirimleri = DB::get("SELECT * FROM cekim_bildirimleri WHERE uye_id IN(
      SELECT id FROM uyeler WHERE email LIKE '%" . post("email") . "%'
    ) order by id DESC");
  }
}

if( get("durumListele") ){
  if( get("durum") != null ){
    $cekimBildirimleri = DB::get("SELECT * FROM cekim_bildirimleri WHERE durum = '" . get("durum") . "' order by id DESC");
  }
}

require view("admin/cekim-bildirimleri");
