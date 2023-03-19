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

  if( post('krediKartiYukleme') ){
    $odeme_turu = post("odeme_turu",true);
    $yuklenecek_miktar = post("yuklenecekMiktar",true);
    $adres = post("adres",true);

    if ( $yuklenecek_miktar <= 0 ) die(json_encode(
      [
        'error' => true,
        'message' => 'Geçerli bir miktar girin.'
      ]
    ));

    if(empty($odeme_turu) or empty($yuklenecek_miktar)){
      echo json_encode(
        [
          'error' => true,
          'message' => 'Boş alan bırakılamaz.'
        ]
      );
    }else{

      switch($odeme_turu){
        default:
        case "paytr":

        	## 1. ADIM için örnek kodlar ##

        	####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
        	#
        	## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
        	$merchant_id 	= PAYTR_MERCHANT_ID;
        	$merchant_key 	= PAYTR_MERCHANT_KEY;
        	$merchant_salt	= PAYTR_MERCHANT_SALT;
        	#
        	## Müşterinizin sitenizde kayıtlı veya form vasıtasıyla aldığınız eposta adresi
        	$email = session("email");
        	#
        	## Tahsil edilecek tutar.
          #uklenecek_miktar = $yuklenecek_miktar + ($yuklenecek_miktar * 0.04);
          $komisyon = $yuklenecek_miktar * 0.04;
        	$payment_amount	= $yuklenecek_miktar * 100; //9.99 için 9.99 * 100 = 999 gönderilmelidir.
        	#
        	## Sipariş numarası: Her işlemde benzersiz olmalıdır!! Bu bilgi bildirim sayfanıza yapılacak bildirimde geri gönderilir.
        	$merchant_oid = substr(md5(uniqid(time())),0,10);
        	#
        	## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız ad ve soyad bilgisi
        	$user_name = session("adsoyad");
        	#
        	## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız adres bilgisi
        	$user_address = $adres;
        	#
        	## Müşterinizin sitenizde kayıtlı veya form aracılığıyla aldığınız telefon bilgisi
        	$user_phone = DB::getVar("SELECT phone_number FROM uyeler WHERE id = '".session("uye_id")."'");
        	#
        	## Başarılı ödeme sonrası müşterinizin yönlendirileceği sayfa
        	## !!! Bu sayfa siparişi onaylayacağınız sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        	## !!! Siparişi onaylayacağız sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        	$merchant_ok_url = site_url('bakiye');
        	#
        	## Ödeme sürecinde beklenmedik bir hata oluşması durumunda müşterinizin yönlendirileceği sayfa
        	## !!! Bu sayfa siparişi iptal edeceğiniz sayfa değildir! Yalnızca müşterinizi bilgilendireceğiniz sayfadır!
        	## !!! Siparişi iptal edeceğiniz sayfa "Bildirim URL" sayfasıdır (Bakınız: 2.ADIM Klasörü).
        	$merchant_fail_url = site_url();
        	#
        	## Müşterinin sepet/sipariş içeriği
        	#
        	$user_basket = base64_encode(json_encode(array(
        		array("Bakiye Yüklemesi", $yuklenecek_miktar, 1), // 1. ürün (Ürün Ad - Birim Fiyat - Adet )
        	)));

        	############################################################################################

        	## Kullanıcının IP adresi
        	if( isset( $_SERVER["HTTP_CLIENT_IP"] ) ) {
        		$ip = $_SERVER["HTTP_CLIENT_IP"];
        	} elseif( isset( $_SERVER["HTTP_X_FORWARDED_FOR"] ) ) {
        		$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        	} else {
        		$ip = $_SERVER["REMOTE_ADDR"];
        	}

        	## !!! Eğer bu örnek kodu sunucuda değil local makinanızda çalıştırıyorsanız
        	## buraya dış ip adresinizi (https://www.whatismyip.com/) yazmalısınız. Aksi halde geçersiz paytr_token hatası alırsınız.
        	$user_ip = $ip;
        	##

        	## İşlem zaman aşımı süresi - dakika cinsinden
        	$timeout_limit = "30";

        	## Hata mesajlarının ekrana basılması için entegrasyon ve test sürecinde 1 olarak bırakın. Daha sonra 0 yapabilirsiniz.
        	$debug_on = 0;

          ## Mağaza canlı modda iken test işlem yapmak için 1 olarak gönderilebilir.
          $test_mode = 0;

        	$no_installment	= 0; // Taksit yapılmasını istemiyorsanız, sadece tek çekim sunacaksanız 1 yapın

        	## Sayfada görüntülenecek taksit adedini sınırlamak istiyorsanız uygun şekilde değiştirin.
        	## Sıfır (0) gönderilmesi durumunda yürürlükteki en fazla izin verilen taksit geçerli olur.
        	$max_installment = 0;

        	$currency = "TL";

        	####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
        	$hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
        	$paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
        	$post_vals=array(
        			'merchant_id'=>$merchant_id,
        			'user_ip'=>$user_ip,
        			'merchant_oid'=>$merchant_oid,
        			'email'=>$email,
        			'payment_amount'=>$payment_amount,
        			'paytr_token'=>$paytr_token,
        			'user_basket'=>$user_basket,
        			'debug_on'=>$debug_on,
        			'no_installment'=>$no_installment,
        			'max_installment'=>$max_installment,
        			'user_name'=>$user_name,
        			'user_address'=>$user_address,
        			'user_phone'=>$user_phone,
        			'merchant_ok_url'=>$merchant_ok_url,
        			'merchant_fail_url'=>$merchant_fail_url,
        			'timeout_limit'=>$timeout_limit,
        			'currency'=>$currency,
              'test_mode'=>$test_mode
        		);

        	$ch=curl_init();
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
        		die("PAYTR IFRAME connection error. err:".curl_error($ch));

        	curl_close($ch);

        	$result = json_decode($result,1);

        	if($result['status']=='success'){

            $insertApiPay = DB::insert("INSERT INTO pay_api(trade_code, durum, tutar, komisyon, uye_id, api_type) VALUES(?,?,?,?,?,?)",array(
              $merchant_oid,
              2,
              $payment_amount/100,
              $komisyon,
              session("uye_id"),
              "paytr"
            ));

            $token = $result['token'];

        	}else{
            echo json_encode(
              [
                'error' => true,
                'message' => 'PAYTR tarafıyla ilgili problem oluştu.'
              ]
            );
            exit;
          }
          $url = 'https://www.paytr.com/odeme/guvenli/' . $token;
        break;
        case "gpay":
          $order_id = substr(md5(uniqid(time())),0,10);
          $url = 'https://gpay.com.tr/ApiRequest';
          $yuklenecek_miktar = $yuklenecek_miktar + ($yuklenecek_miktar * 0.04);
          $komisyon = $yuklenecek_miktar * 0.04;
          $data = array(
            'username' => GPAY_USERNAME,
            'key' => GPAY_KEY,
            'order_id' => $order_id,
            'amount' => $yuklenecek_miktar,
            'currency' => '949',
            'return_url' => site_url('bakiye'),
            'phone' => null,
            // 'selected_payment' => '',
            'products' => array(
              array(
                'product_name' => 'EpinOyun Bakiye Yüklemesi',
                'product_amount' => $yuklenecek_miktar,
                'product_currency' => '949',
                'product_type' => 'Bakiye',
                'product_img' => asset_url('images/logo.png')
              )
            )
          );

          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

          $result = curl_exec($ch);
          curl_close($ch);

          $json_data = json_decode($result);
          $url = null;
          if ($json_data->state === 0) {
            // var_dump($json_data->error_code, $json_data->message);
            echo json_encode(
              [
                'error' => true,
                'message' => 'Boş alan bırakmayınız.'
              ]
            );
            exit;
          } else {
            $insertApiPay = DB::insert("INSERT INTO pay_api(trade_code, durum, tutar, komisyon, uye_id, api_type) VALUES(?,?,?,?,?)",array(
              $order_id,
              2,
              $yuklenecek_miktar,
              $komisyon,
              session("uye_id"),
              "gpay"
            ));
            $url = $json_data->link;
          }
        break;
      }

      if($url != null){
        echo json_encode(
          [
            'error' => false,
            'message' => null,
            'token_url' => $url
          ]
        );
      }else{
        echo json_encode(
          [
            'error' => true,
            'message' => 'Hata ile karşılaşıldı.',
          ]
        );
      }

    }
  }else{
    echo json_encode(
      [
        'error' => true,
        'message' => 'Lütfen tutar giriniz.'
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
