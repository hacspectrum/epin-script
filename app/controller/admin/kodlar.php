<?php

if(!isset($_GET["urun_id"])){
    header("Location: " . site_url("admin/urunler"));
    exit;
}

$urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '" . get("urun_id") . "'");
if(!isset($urun->id)){
    header("Location: " . site_url("admin/urunler"));
    exit;
}

$kodlar = DB::get("SELECT * FROM codes WHERE product_id = '" . $urun->id . "'");

require view("admin/kodlar");