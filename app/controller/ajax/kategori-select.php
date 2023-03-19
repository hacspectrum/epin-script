<?php

if( defined("LOGGED_IN") ){

  if( post("catNo") ){

    $catNo = post("catNo");
    if( DB::getVar("SELECT COUNT(*) FROM chip_kategoriler WHERE id = '" . $catNo . "'") > 0 ){
      $api_type = DB::getVar("SELECT kategori_type FROM chip_kategoriler WHERE id = '$catNo'");

      echo json_encode(
        [
          'error' => false,
          'message' => '',
          'type' => $api_type
        ]
      );

    }else{
      echo json_encode(
        [
          'error' => true,
          'message' => 'Kategori bulunamadı.'
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
      'message' => 'Lütfen giriş yapın.'
    ]
  );

}
