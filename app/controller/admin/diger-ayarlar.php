<?php

$diger_ayarlar = DB::getRow("SELECT * FROM diger_ayarlar WHERE id = '1'");

if( $_POST ){

  $PAYTR_MERCHANT_ID = post("PAYTR_MERCHANT_ID");
  $PAYTR_MERCHANT_KEY = post("PAYTR_MERCHANT_KEY");
  $PAYTR_MERCHANT_SALT = post("PAYTR_MERCHANT_SALT");

  $GPAY_USERNAME = post("GPAY_USERNAME");
  $GPAY_KEY = post("GPAY_KEY");

  $CHIPCIN_EMAIL = post("CHIPCIN_EMAIL");
  $CHIPCIN_SIFRE = post("CHIPCIN_SIFRE");

  $MAIL_ADRES = post("MAIL_ADRES");
  $MAIL_SIFRE = post("MAIL_SIFRE");

  $EKSTRA_SCRIPT = post("EKSTRA_SCRIPT");

  $TEMPOPLAY_API_KEY = post("TEMPOPLAY_API_KEY");
  $ENJOYPLAY_API_KEY = post("ENJOYPLAY_API_KEY");
  $TURNPOKER_API_KEY = post("TURNPOKER_API_KEY");

  $FACEBOOK_API_ID = post("FACEBOOK_API_ID");
  $FACEBOOK_API_SECRET = post("FACEBOOK_API_SECRET");
  $FACEBOOK_APP_GRAPH_VERSION = post("FACEBOOK_APP_GRAPH_VERSION");

  $SHOPIER_API_KEY = post("SHOPIER_API_KEY", true);
  $SHOPIER_API_SECRET = post("SHOPIER_API_SECRET", true);

  $update = DB::exec("UPDATE diger_ayarlar SET PAYTR_MERCHANT_ID = '$PAYTR_MERCHANT_ID',
                                               PAYTR_MERCHANT_KEY = '$PAYTR_MERCHANT_KEY',
                                               PAYTR_MERCHANT_SALT = '$PAYTR_MERCHANT_SALT',
                                               GPAY_USERNAME = '$GPAY_USERNAME',
                                               GPAY_KEY = '$GPAY_KEY',
                                               MAIL_ADRES = '$MAIL_ADRES',
                                               MAIL_SIFRE = '$MAIL_SIFRE',
                                               EKSTRA_SCRIPT = '$EKSTRA_SCRIPT',
                                               TEMPO_POKER_API_KEY = '$TEMPOPLAY_API_KEY',
                                               ENJOY_POKER_API_KEY = '$ENJOYPLAY_API_KEY',
                                               TURN_POKER_API_KEY = '$TURNPOKER_API_KEY',
                                               FACEBOOK_APP_GRAPH_VERSION = '$FACEBOOK_APP_GRAPH_VERSION',
                                               FACEBOOK_API_SECRET = '$FACEBOOK_API_SECRET',
                                               FACEBOOK_API_ID = '$FACEBOOK_API_ID',
                                               SHOPIER_API_KEY = '$SHOPIER_API_KEY',
                                               SHOPIER_API_SECRET = '$SHOPIER_API_SECRET' WHERE id = '" . $diger_ayarlar->id . "'");
  if($update){
    $response = array(
      'class' => 'success',
      'message' => 'Başarıyla güncellendi.'
    );
    header("Refresh:1;url=" . site_url("admin/diger-ayarlar"));
  }else{
    $response = array(
      'class' => 'danger',
      'message' => 'Güncellenirken problem oluştu. ' . DB::errorInfo()[2]
    );
  }

}

require view("admin/diger-ayarlar");
