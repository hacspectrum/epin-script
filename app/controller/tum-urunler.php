<?php

$tum_urunler = DB::get("SELECT * FROM chip_kategoriler order by kategori_adi ASC");

require view("tum-urunler");