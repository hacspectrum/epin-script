<?php

function meta($url){
  switch($url){
    default:
    case null:
    case "index":
      $title = SITE_TITLE;
      $meta["description"] = META_DESCRIPTION;
      $meta["keywords"] = META_KEYWORDS;
    break;
    case "kategori":
      if($id = url(2)){
        $kategori = DB::getRow("SELECT * FROM chip_kategoriler WHERE id = '$id'");
        $title = $kategori->kategori_adi . " - " . SITE_TITLE;
        $meta["description"] = META_DESCRIPTION;
        $meta["keywords"] = META_KEYWORDS;
      }
    break;
    case "urun":
      if($seourl = url(1)){
        $urun = DB::getRow("SELECT * FROM chip_urunler WHERE seourl = '$seourl'");
        $title = $urun->urun_adi . " - " . SITE_TITLE;
        $meta["description"] = $urun->urun_adi . " satın al, chip satın al. Güvenilir ve hızlıca chip satın alın!";
        $meta["keywords"] = strtolower($urun->urun_adi) . ', ' . META_KEYWORDS;
      }
    break;
    case "makale":
      if($seourl = url(1)){
        $makale = DB::getRow("SELECT * FROM makaleler WHERE seourl = '$seourl'");
        $title = $makale->baslik . " - " . SITE_TITLE;
        $meta["description"] = strip_tags(html_entity_decode($makale->yazi));
        $meta["keywords"] = META_KEYWORDS;
      }
    break;
    case "hakkimizda":
      $title = "Hakkımızda - " . SITE_TITLE;
      $meta["description"] = META_DESCRIPTION;
      $meta["keywords"] = META_KEYWORDS;
    break;
    case "yardim":
      $title = "Yardım - " . SITE_TITLE;
      $meta["description"] = META_DESCRIPTION;
      $meta["keywords"] = META_KEYWORDS;
    break;
    case "bakiye":
      $title = "Bakiye - " . SITE_TITLE;
      $meta["description"] = META_DESCRIPTION;
      $meta["keywords"] = META_KEYWORDS;
    break;
    case "satislarim":
      $title = "Satışlarım - " . SITE_TITLE;
      $meta["description"] = META_DESCRIPTION;
      $meta["keywords"] = META_KEYWORDS;
    break;
    case "siparislerim":
      $title = "Siparişlerim - " . SITE_TITLE;
      $meta["description"] = META_DESCRIPTION;
      $meta["keywords"] = META_KEYWORDS;
    break;
  }
  return '<title>' . $title . '</title>
  <meta name="description" content="' . $meta["description"] . '">
  <meta name="keywords" content="' . $meta["keywords"] . '">
  <meta itemprop="name" content="' . $title . '">
  <link rel="canonical" href="' . site_url(get("url")) . '" itemprop="url"/>';
}
