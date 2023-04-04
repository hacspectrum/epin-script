<?php
  use Shopier\Exceptions\NotRendererClassException;
  use Shopier\Exceptions\RendererClassNotFoundException;
  use Shopier\Exceptions\RequiredParameterException;
  use Shopier\Models\Address;
  use Shopier\Models\Buyer;
  use Shopier\Renderers\AutoSubmitFormRenderer;
  use Shopier\Renderers\ButtonRenderer;
  use Shopier\Enums\ProductType;
  use Shopier\Shopier;

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

    if( post('urun') ){

      $email = post("email",true);
      $password = post("password",true);
      $urunNo = post("urunNo",true);
      $adet = post("adet", true);
      $musteri_aciklama = post("musteri_aciklama", true);

      $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '$urunNo'");

      $toplamFiyat = fiyat(session('uye_id'), $urun->fiyat * $adet, $urun->kategori_id);

      /*
      @@@
      * URUN KATEGORI TIPI
      ** 0 = NORMAL
      @@@  
      */

      if(empty($urunNo) or empty($adet)){
        echo json_encode(
          [
            'error' => true,
            'message' => 'Boş alan bırakamazsınız.'
          ]
        );
      }else{

        if($urun->stok == 1){
          /* islem no */
          $islemNo = rand(100000,999999);
          /* @ */

          $bayi = DB::getVar("SELECT bayi FROM uyeler WHERE id = '" . session("uye_id") . "'");
          $bakiye = DB::getVar("SELECT bakiye FROM uyeler WHERE id = '" . session("uye_id") . "'");

          if($bakiye<$toplamFiyat){
            echo json_encode(
              [
                'error' => true,
                'message' => 'Bakiyeniz yetersiz.'
              ]
            );
            exit;
          }
          
        
          $insertSiparis = DB::insert("INSERT INTO siparisler(islem_no,bayi,urun_id,uye_id,adet,email,password,odenen_tutar,musteri_aciklama) VALUES(?,?,?,?,?,?,?,?,?)",array(
            $islemNo,
            $bayi,
            $urun->id,
            session('uye_id'),
            $adet,
            $email,
            $password,
            $toplamFiyat,
            $musteri_aciklama
          ));

          hareketEkle(session("uye_id"), "siparis", json_encode([
            'urun_id' => $urun->id,
            'urun_tipi' => 'Normal',
            'adet' => $adet,
            'toplam_fiyat' => $toplamFiyat
          ]));

          if($insertSiparis){
            $updateUserBalance = DB::exec("UPDATE uyeler SET bakiye = bakiye - " . $toplamFiyat . " WHERE id = '" . session("uye_id") . "'");
            echo json_encode(
              [
                'error' => false,
                'message' => 'Siparişiniz başarıyla alınmıştır. Yönlendirileceksiniz. Siparişlerim sekmesinden durumu takip edebilirsiniz. İşlem Numarası: ' . $islemNo
              ]
            );
            exit;
          }else{
            echo json_encode(
              [
                'error' => true,
                'message' => 'Sipariş verilirken bir sorun oluştu. Lütfen daha sonra tekrar deneyiniz.'
              ]
            );
          }
        }else{
          echo json_encode(
            [
              'error' => true,
              'message' => 'Stokta ürün bulunamadı.'
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
    exit();

  }
