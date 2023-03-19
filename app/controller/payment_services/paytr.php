<?php

	error_reporting(0);
	## 2. ADIM için örnek kodlar ##

	$post = $_POST;

	####################### DÜZENLEMESİ ZORUNLU ALANLAR #######################
	#
	## API Entegrasyon Bilgileri - Mağaza paneline giriş yaparak BİLGİ sayfasından alabilirsiniz.
	$merchant_key 	= PAYTR_MERCHANT_KEY;
	$merchant_salt	= PAYTR_MERCHANT_SALT;
	###########################################################################

	####### Bu kısımda herhangi bir değişiklik yapmanıza gerek yoktur. #######
	#
	## POST değerleri ile hash oluştur.
	$hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
	#
	## Oluşturulan hash'i, paytr'dan gelen post içindeki hash ile karşılaştır (isteğin paytr'dan geldiğine ve değişmediğine emin olmak için)
	## Bu işlemi yapmazsanız maddi zarara uğramanız olasıdır.
	if( $hash != $post['hash'] )
		die('PAYTR notification failed: bad hash');
	###########################################################################

	## BURADA YAPILMASI GEREKENLER
	## 1) Siparişin durumunu $post['merchant_oid'] değerini kullanarak veri tabanınızdan sorgulayın.
	## 2) Eğer sipariş zaten daha önceden onaylandıysa veya iptal edildiyse  echo "OK"; exit; yaparak sonlandırın.

  $insertApiPayCount = DB::getVar("SELECT COUNT(*) FROM pay_api WHERE trade_code = '" . $post['merchant_oid'] . "' && durum != '2'");
  if($insertApiPayCount > 0){
		echo "OK";
		exit;
  }

	$current = DB::getRow("SELECT * FROM pay_api WHERE trade_code = '" . $post["merchant_oid"] . "'");

	if( $post['status'] == 'success' ) { ## Ödeme Onaylandı

		## BURADA YAPILMASI GEREKENLER
		## 1) Siparişi onaylayın.
		## 2) Eğer müşterinize mesaj / SMS / e-posta gibi bilgilendirme yapacaksanız bu aşamada yapmalısınız.
		if($post['total_amount']){
			$eklenecekTutar = $post['total_amount'] / 100;
			$eklenecekTutar = $eklenecekTutar - $current->komisyon;
		}else if($post['payment_amount']){
			$eklenecekTutar = $post['payment_amount'] / 100;
			$eklenecekTutar = $eklenecekTutar - $current->komisyon;
		}

		$bakiyeEkle = DB::exec("UPDATE uyeler SET bakiye = bakiye + '" . $eklenecekTutar . "' WHERE id = '" . $current->uye_id . "'");
		$updateApiPay = DB::exec("UPDATE pay_api SET durum = '1' WHERE trade_code = '" . $post['merchant_oid'] . "'");

		hareketEkle($current->uye_id, "payment_paytr", json_encode([
			'status' => 'success',
			'amount' => $eklenecekTutar
		]));

	} else { ## Ödemeye Onay Verilmedi

		## BURADA YAPILMASI GEREKENLER
		## 1) Siparişi iptal edin.
		## 2) Eğer ödemenin onaylanmama sebebini kayıt edecekseniz aşağıdaki değerleri kullanabilirsiniz.
		## $post['failed_reason_code'] - başarısız hata kodu
		## $post['failed_reason_msg'] - başarısız hata mesajı
		$updateApiPay = DB::exec("UPDATE pay_api SET durum = '0' WHERE trade_code = '" . $post["merchant_oid"] . "'");

		hareketEkle($current->uye_id, "payment_paytr", json_encode([
			'status' => 'error',
			'amount' => $eklenecekTutar
		]));

		exit;

	}

	## Bildirimin alındığını PayTR sistemine bildir.
	echo "OK";
	exit;
