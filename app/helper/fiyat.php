<?php

function fiyat($uye_id, $fiyat, $kategori_id = null){
  if( defined("LOGGED_IN") ){
    $uye = DB::getRow("SELECT bayi, bayi_indirim FROM uyeler WHERE id = '$uye_id'");
    if($uye->bayi == 0){
      return $fiyat;
    }else if($uye->bayi == 1){
      if($kategori_id != null){
      	$kategori_indirimi = DB::getVar("SELECT indirim FROM bayi_kategori_indirimleri WHERE uye_id = '$uye_id' AND kategori_id = '$kategori_id'");
      	if($kategori_indirimi != null){
      		return ((100 - $kategori_indirimi) / 100) * $fiyat;
      	}else{
      		return ((100 - $uye->bayi_indirim) / 100) * $fiyat;
      	}
      }else{
      	return ((100 - $uye->bayi_indirim) / 100) * $fiyat;
      }
    }
  }else{
    return $fiyat;
  }
}
