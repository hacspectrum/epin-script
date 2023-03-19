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

    if( post('urunBizeSat') ){

      $email = post("email",true);
      $password = post("password",true);
      $urunNo = post("urunNo",true);
      $adet = post("adet");

      if(empty($email) or empty($password) or empty($urunNo) or empty($adet)){
        echo json_encode(
          [
            'error' => true,
            'message' => 'Boş alan bırakamazsınız.'
          ]
        );
      }else{

        if(is_numeric($adet) && $adet > 0){
          $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '$urunNo'");
          $toplamFiyat = $urun->bizesat_fiyat * $adet;

          $bayi = DB::getVar("SELECT bayi FROM uyeler WHERE id = '" . session("uye_id") . "'");

          $insertBizeSat = DB::insert("INSERT INTO bize_sat(bayi,urun_id,uye_id,adet,email,password,verilecek_tutar) VALUES(?,?,?,?,?,?,?)",array(
            $bayi,
            $urun->id,
            session('uye_id'),
            $adet,
            $email,
            $password,
            $toplamFiyat
          ));

          if($insertBizeSat){
            echo json_encode(
              [
                'error' => false,
                'message' => 'Satış talebiniz alınmıştır. Satışlarım sekmesinden takip edebilirsiniz.'
              ]
            );
            hareketEkle(session("uye_id"), "bizesat", json_encode([
              'urun_id' => $urun->id,
              'adet' => $adet,
              'toplam_fiyat' => $toplamFiyat
            ]));
          }else{
            echo json_encode(
              [
                'error' => true,
                'message' => 'Satış işlemi gerçekleştirilemedi.'
              ]
            );
          }
        }else{
          echo json_encode(
            [
              'error' => true,
              'message' => 'Lütfen geçerli bir adet giriniz.'
            ]
          );
        }

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
    exit;
  }
