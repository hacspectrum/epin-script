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

  if( post("havaleEftSubmit") ){
    $banka = post("banka");
    $adsoyad = post("adsoyad");
    $tcno = post("tcno");
    $telefon = post("telefon");
    $tutar = post("tutar");

    if(empty($banka) or empty($adsoyad) or empty($tcno) or empty($telefon) or empty($tutar)){
      $response = array(
        'error' => true,
        'message' => 'Lütfen boş alan bırakmayınız. Tüm alanlar zorunludur.'
      );
    }else{
      if(strlen($adsoyad) > 5){
        if(is_numeric($tcno) && strlen($tcno) > 4){
          if(is_numeric($telefon) && strlen($telefon) > 9){
            if($tutar > 0){
              $merchant_id = PAYTR_MERCHANT_ID; // Mağaza numarası
              $merchant_key = PAYTR_MERCHANT_KEY; // Mağaza Parolası - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
              $merchant_salt = PAYTR_MERCHANT_SALT; // Mağaza Gizli Anahtarı - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.

              ## Kullanıcının IP adresi
              if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
                  $ip = $_SERVER["HTTP_CLIENT_IP"];
              } elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
                  $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
              } else {
                  $ip = $_SERVER["REMOTE_ADDR"];
              }

              $user_ip = $ip;  // !!! Eğer bu kodu sunucuda değil local makinanızda çalıştırıyorsanız buraya dış ip adresinizi(https://www.whatismyip.com/) yazmalısınız.

              $merchant_oid = substr(md5(uniqid(time())),0,10); //sipariş numarası: her işlemde benzersiz olmalıdır! Bu bilgi bildirim sayfanıza yapılacak bildirimde gönderilir.
              $email = session("email"); // Müşterinizin sitenizde kayıtlı eposta adresi
              $user_name = $adsoyad;
              $user_phone = $telefon;
              $payment_amount = $tutar * 100; //9.99 TL
              $payment_type = 'eft';
              $debug_on = 0; //hata mesajlarını ekrana bas

              ## İşlem zaman aşımı süresi - dakika cinsinden
              $timeout_limit = "30";

              ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir
              $test_mode = 1;

              $hash_str=$merchant_id.$user_ip.$merchant_oid.$email.$payment_amount.$payment_type.$test_mode;
              $paytr_token = base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));

              $post_vals = array(
                  'merchant_id' => $merchant_id,
                  'user_ip' => $user_ip,
                  'merchant_oid' => $merchant_oid,
                  'email' => $email,
                  'user_name' => $user_name,
                  'user_phone' => $user_phone,
                  'tc_no_last5' => $tcno,
                  'payment_amount' => $payment_amount,
                  'payment_type' => $payment_type,
                  'bank' => $banka,
                  'paytr_token' => $paytr_token,
                  'user_basket' => base64_encode(json_encode(array(
                    array("EpinOyun Bakiye Yüklemesi", post("tutar"), 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
                  ))),
                  'debug_on' => $debug_on,
                  'timeout_limit' => $timeout_limit,
                  'test_mode' => $test_mode
                );

              $ch = curl_init();
              curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_POST, 1) ;
              curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
              curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
              curl_setopt($ch, CURLOPT_TIMEOUT, 20);
              $result = @curl_exec($ch);

              if(curl_errno($ch))
              {
                // die("PAYTR EFT IFRAME connection error. err:".curl_error($ch));
                $response = array(
                  'class' => 'danger',
                  'message' => 'PAYTR tarafıyla ilgili problem oluştu.'
                );
              }
              curl_close($ch);

              $result = json_decode($result,1);

              if($result['status'] == 'success'){

                $insertApiPay = DB::insert("INSERT INTO pay_api(trade_code, durum, tutar, uye_id, api_type) VALUES(?,?,?,?,?)",array(
                  $merchant_oid,
                  2,
                  $payment_amount/100,
                  session("uye_id"),
                  "paytr"
                ));

                $token_url = "https://www.paytr.com/odeme/api/" . $result['token'];

                $response = array(
                  'error' => false,
                  'message' => 'success',
                  'token_url' => $token_url
                );

              }else{
                // die("PAYTR EFT IFRAME failed. reason:".$result['reason']);
                $response = array(
                  'error' => true,
                  'message' => 'PAYTR tarafıyla ilgili problem oluştu.'
                );
              }
            }else{
              $response = array(
                'error' => true,
                'message' => 'Lütfen geçerli bir tutar giriniz.'
              );
            }
          }else{
            $response = array(
              'error' => true,
              'message' => 'Lütfen geçerli bir telefon numarası girin.'
            );
          }
        }else{
          $response = array(
            'error' => true,
            'message' => 'Lütfen geçerli bir TC No girin. Son 5 hanesini girmeniz gerekmektedir.'
          );
        }
      }else{
        $response = array(
          'error' => true,
          'message' => 'Lütfen geçerli bir ad, soyad giriniz.'
        );
      }
    }
    echo json_encode($response);
  }else{
    echo json_encode(
      [
        'error' => true,
        'message' => 'Ters giden birşeyler var.'
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
