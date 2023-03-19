<?php

$callback_ip = ["77.223.135.234"];
$has_ip = false;

/**
 * Gelen verileri değişkene atıyoruz. Lütfen test ederken ve hatta üretimde dahi bu gelen verilerin logunu tutunuz.
 */

$callback_data = $_POST;
$bayiiKey = GPAY_KEY;
$siparis_id = $callback_data['siparis_id'];
$tutar = $callback_data['tutar'];
$islem_sonucu = $callback_data['islem_sonucu'];

$hash = md5(base64_encode(substr($bayiiKey, 0, 7) . substr($siparis_id, 0, 5) . strval($tutar) . $islem_sonucu));

if (getenv("HTTP_CLIENT_IP")) {
    $ip = getenv("HTTP_CLIENT_IP");
} elseif (getenv("HTTP_X_FORWARDED_FOR")) {
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    if (strstr($ip, ',')) {
        $tmp = explode(',', $ip);
        $ip = trim($tmp[0]);
    }
} else {
    $ip = getenv("REMOTE_ADDR");
}

foreach ($callback_ip as $c_ip) {
    if ($ip === $c_ip) {
        $has_ip = true;
        break;
    }
}

if($has_ip != true || $hash != $callback_data['hash']){
  die('4');
}

$insertApiPayCount = DB::getVar("SELECT COUNT(*) FROM pay_api WHERE trade_code = '" . $callback_data['siparis_id'] . "' && durum != '2'");
if($insertApiPayCount > 0){
  echo "1";
  exit();
}

$current = DB::getRow("SELECT * FROM pay_api WHERE trade_code = '" . $post["merchant_oid"] . "'");

if($islem_sonucu == 2){

  //ödeme onaylandı
  $eklenecekTutar = $callback_data['tutar'];
  $bakiyeEkle = DB::exec("UPDATE uyeler SET bakiye = bakiye + '" . $eklenecekTutar . "' WHERE id = '" . $current->uye_id . "'");
  $updateApiPay = DB::exec("UPDATE pay_api SET uye_id = '" . $current->uye_id . "', tutar = '$eklenecekTutar', durum = '1' WHERE trade_code = '" . $callback_data['siparis_id'] . "'");

  hareketEkle($current->uye_id, "payment_gpay", json_encode([
    'status' => 'success',
    'amount' => $eklenecekTutar
  ]));

}else if($islem_sonucu == 3){

  // ödeme iptal edildi
  $updateApiPay = DB::exec("UPDATE pay_api SET uye_id = '" . $current->uye_id . "', tutar = '$eklenecekTutar', durum = '0' WHERE trade_code = '" . $callback_data['siparis_id'] . "'");

  hareketEkle($current->uye_id, "payment_gpay", json_encode([
    'status' => 'error',
    'amount' => $eklenecekTutar
  ]));

  die('3');

}else if($islem_sonucu == 4 || $islem_sonucu == 5){

  // ödeme iptal edildi
  $updateApiPay = DB::exec("UPDATE pay_api SET uye_id = '" . $current->uye_id . "', tutar = '$eklenecekTutar', durum = '0' WHERE trade_code = '" . $callback_data['siparis_id'] . "'");

  hareketEkle($current->uye_id, "payment_gpay", json_encode([
    'status' => 'error',
    'amount' => $eklenecekTutar
  ]));

  die('3');

}

if($callback_data['tutar'] != DB::getVar("SELECT tutar FROM api_pay WHERE trade_code = '" . $callback_data['siparis_id'] . "'")){

  die('5');

}

echo "1";
exit;
