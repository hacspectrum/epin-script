<?php
$sayfada = 10; // sayfada gösterilecek içerik miktarını belirtiyoruz.

$toplam_icerik = DB::getVar("SELECT COUNT(*) FROM pay_api");
$toplam_sayfa = ceil($toplam_icerik / $sayfada);

$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;

if($sayfa < 1) $sayfa = 1;
if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;

$limit = ($sayfa - 1) * $sayfada;
$odemeler = DB::get("SELECT * FROM pay_api order by id DESC LIMIT " . $limit . ", " . $sayfada);
$sayfa_goster = 10;

// oto iptal
$iptalCount = 0;
foreach($odemeler as $odeme):
  if($odeme->durum == 2){
    $now = new DateTime();
    $created = new DateTime($odeme->created_at);
    $diff = date_diff($now, $created);
    $days = $diff->format('%d');
    $hours = $diff->format('%h');
    $mins = $diff->format('%i');

    $diffStr = NULL;

    if ($mins > 20) {
      $update = DB::exec("UPDATE pay_api SET durum = '0' WHERE id = '" . $odeme->id . "'");
      if($update){
        $iptalCount++;
      }
    }
  }
endforeach;

if($iptalCount > 0){
  echo '<script>setTimeout(function(){
    alert("Güncellenen ' . $iptalCount . ' ödeme var. Sayfa yenileniyor...");
    window.location.reload();
  },2500);</script>';
}

if( get("searchSiparisNo") ){
  if(get("siparis_no") != null){
    $odemeler = DB::get("SELECT * FROM pay_api WHERE trade_code LIKE '%" . get("siparis_no") . "%' order by id DESC");
  }
}

require view("admin/kredi-karti-odemeleri");
