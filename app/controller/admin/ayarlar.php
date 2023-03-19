<?php

$ayar = DB::getRow("SELECT * FROM genel_ayarlar WHERE id = '1'");

if($_POST){
  $hakkimizda = post("hakkimizda");
  $skype = post("skype");
  $telefon = post("telefon");
  $masabulucu = post("masabulucu");
  $adres = post("adres");
  $anasayfa_yazi_baslik = null;
  $anasayfa_yazi = null;
  $meta_desc = post("meta_desc");
  $meta_keyw = post("meta_keyw");
  $site_title = post("site_title");
  $instagram_url = post("instagram_url");
  $facebook_url = post("facebook_url");
  $twitter_url = post("twitter_url");
  $anasayfa_kategori_listeleme_basligi = post("anasayfa_kategori_listeleme_basligi", true);

  $update = DB::exec("UPDATE genel_ayarlar SET hakkimizda_metni = '$hakkimizda',
                                               anasayfa_kategori_listeleme_basligi = '$anasayfa_kategori_listeleme_basligi',
                                               skype = '$skype',
                                               telefon = '$telefon',
                                               masabulucu = '$masabulucu',
                                               adres = '$adres',
                                               anasayfa_yazi_baslik = '$anasayfa_yazi_baslik',
                                               anasayfa_yazi = '$anasayfa_yazi',
                                               site_title = '$site_title',
                                               meta_keywords = '$meta_keyw',
                                               meta_description = '$meta_desc',
                                               twitter_url = '$twitter_url',
                                               facebook_url = '$facebook_url',
                                               instagram_url = '$instagram_url' WHERE id = '1'");

  if($update){
    $response = array(
      'class' => 'success',
      'message' => 'Güncelleme başarıyla tamamlandı!'
    );
    header("Refresh:2;url=" . site_url("admin/ayarlar"));
  }else{
    $response = array(
      'class' => 'danger',
      'message' => 'Güncellenemedi.'
    );
  }
}

require view("admin/ayarlar");
