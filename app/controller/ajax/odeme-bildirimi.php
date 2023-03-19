<?php

if( defined("LOGGED_IN") ){

  # key control
  $user_api_key = DB::getVar("SELECT api_key FROM uyeler WHERE id = '" . session("uye_id") . "'");
  if( $user_api_key != get("key") ){
    echo json_encode(
      [
        'error' => true,
        'message' => 'Giriş yapmalısınız.'
      ]
    );
    exit;
  }

  if( post("odemeBildirimi") ){

    $banka_id = post("banka", true);
    $odeme_yapan_kisi = post("odeme_yapan_kisi", true);
    $odeme_tarihi = post("odeme_tarihi", true);
    $miktar = post("miktar", true);

    if(!$banka_id or !$miktar){
      echo json_encode(
        [
          'error' => true,
          'message' => 'Boş alan bırakılamaz.'
        ]
      );
    }else{

      $insertOdemeBildirimi = DB::insert("INSERT INTO odeme_bildirimleri(banka_id,uye_id,odeme_yapan_kisi,tarih,miktar) VALUES(?,?,?,?,?)", array(
        $banka_id,
        session("uye_id"),
        $odeme_yapan_kisi,
        $odeme_tarihi,
        $miktar
      ));

      if($insertOdemeBildirimi){
        echo json_encode(
          [
            'error' => false,
            'message' => 'Ödeme bildirimi başarıyla oluşturuldu. En kısa zamanda incelenecektir.'
          ]
        );
      }else{
        echo json_encode(
          [
            'error' => true,
            'message' => 'Ödeme bildirimi yapılırken hata oluştu. Lütfen daha sonra tekrar deneyiniz.'
          ]
        );
      }

    }

  }else{
    echo json_encode(
      [
        'error' => true,
        'message' => 'Boş alan bırakılamaz.'
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
