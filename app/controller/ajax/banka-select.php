<?php

if( defined("LOGGED_IN") ){

  # key control
  $user_api_key = DB::getVar("SELECT api_key FROM uyeler WHERE id = '" . session("uye_id") . "'");
  if( $user_api_key != get("key") or !get("key") ){
    echo json_encode(
      [
        'error' => true,
        'message' => 'Giriş yapmalısınız.'
      ]
    );
    exit;
  }

  if( post("banka_id") ){

    $banka_id = post("banka_id");
    $banka = DB::getRow("SELECT * FROM bankalar WHERE id = '$banka_id'");
    if(!$banka->id){
      echo json_encode(
        [
          'error' => true,
          'message' => 'Böyle bir banka bulunamadı.'
        ]
      );
    }else{

      echo json_encode(
        [
          'error' => false,
          'message' => null,
          'response' => array(
            'adsoyad' => 'Adı Soyadı: ' . $banka->adsoyad,
            'iban' => 'IBAN: ' . $banka->iban,
            'hesapno' => 'Hesap No: ' . $banka->hesapno,
            'subeno' => 'Şube No: ' . $banka->subeno
          )
        ]
      );

    }

  }else{
    echo json_encode(
      [
        'error' => true,
        'message' => 'Boş alan bırakamazsınız.'
      ]
    );
  }
}else{
  echo json_encode(
    [
      'error' => true,
      'message' => 'Giriş yapmalısınız.'
    ]
  );
}
