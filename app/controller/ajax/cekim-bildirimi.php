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

  if( post("cekimBildirimi") ){

    $banka_adi = post("banka_adi", true);
    $adsoyad = post("adsoyad", true);
    $iban = post("iban", true);
    $hesapno = post("hesapno", true);
    $subeno = post("subeno", true);
    $miktar = post("miktar", true);

    if(empty($banka_adi) or empty($adsoyad) or empty($iban) or empty($hesapno) or empty($subeno) or empty($miktar)){
      echo json_encode(
        [
          'error' => true,
          'message' => 'Boş alan bırakılamaz.'
        ]
      );
    }else{
      // boş değilse

      if(strlen($banka_adi) > 3){
        if(strlen($iban) > 20){
          if(strlen($adsoyad) > 5){
            if(strlen($hesapno) > 4){
              if(strlen($subeno) > 3){
                if($miktar >= 10){
                  if(DB::getVar("SELECT vgbakiye FROM uyeler WHERE id = '" . session("uye_id") . "'") < $miktar){
                    echo json_encode(
                      [
                        'error' => true,
                        'message' => 'Çekim işlemi için bakiyeniz yeterli değildir.'
                      ]
                    );
                  }else{
                    $insertCekimTalebi = DB::insert("INSERT INTO cekim_bildirimleri(banka_adi,adsoyad,iban,hesapno,subeno,miktar,uye_id)
                                                     VALUES('$banka_adi','$adsoyad','$iban','$hesapno','$subeno','$miktar','" . session("uye_id") . "')");
                    if($insertCekimTalebi){
                      echo json_encode(
                        [
                          'error' => false,
                          'message' => 'Çekim talebiniz başarıyla alınmıştır. Bakiye sekmesinde gelişmeleri takip edebilirsiniz.'
                        ]
                      );
                      hareketEkle(session("uye_id"), "cekimbildirimi", json_encode([
                        'miktar' => $miktar
                      ]));
                    }else{
                      echo json_encode(
                        [
                          'error' => true,
                          'message' => 'Çekim talebiniz oluşturulamadı.'
                        ]
                      );
                    }
                  }
                }else{
                  echo json_encode(
                    [
                      'error' => true,
                      'message' => 'Minimum çekim miktarı <strong>10VG (10TL)</strong>\'dir.'
                    ]
                  );
                }
              }else{
                echo json_encode(
                  [
                    'error' => true,
                    'message' => 'Geçerli bir şube numarası girin.'
                  ]
                );
              }
            }else{
              echo json_encode(
                [
                  'error' => true,
                  'message' => 'Geçerli bir hesap numarası girin.'
                ]
              );
            }
          }else{
            echo json_encode(
              [
                'error' => true,
                'message' => 'Geçerli bir ad soyad girin.'
              ]
            );
          }
        }else{
          echo json_encode(
            [
              'error' => true,
              'message' => 'Geçerli bir IBAN numarası girin.'
            ]
          );
        }
      }else{
        echo json_encode(
          [
            'error' => true,
            'message' => 'Geçerli bir banka adı girin.'
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
