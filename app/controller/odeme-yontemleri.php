<?php

$paytr_bankalar = DB::get("SELECT * FROM bankalar WHERE banka_type = 'paytr'");

$bankalar = DB::get("SELECT * FROM bankalar WHERE order by banka_adi ASC");

if( get("krediKartiPhoneNumberUpdate") == 1 ){

  if(post("phone_number")):
    $phone_number = post("phone_number");
    if( is_numeric($phone_number) && strlen($phone_number) == 11) {
      $updatePhoneNumber = DB::exec("UPDATE uyeler SET phone_number = '$phone_number' WHERE id = '" . session("uye_id") . "' ");
      if($updatePhoneNumber){
        $responsePhoneUpdate = array(
          'class' => 'success',
          'message' => 'Telefon numaranız başarıyla güncellendi.'
        );
      }else{
        if(DB::errorInfo()[2] == null){
        	$responsePhoneUpdate = array(
		      'class' => 'success',
		      'message' => 'Telefon numaranız başarıyla güncellendi.'
		    );
        }else{
        	$responsePhoneUpdate = array(
	          'class' => 'danger',
	          'message' => 'Telefon numaranız güncellenirken bir problem oluştu.'
	        );
        }
      }
    }else{
      $responsePhoneUpdate = array(
        'class' => 'danger',
        'message' => 'Lütfen geçerli bir telefon numarası giriniz.'
      );
    }
    
  endif;
}

if( $page = url(1) ){
  if(session("login")){
    switch($page){
      case "havale-eft":
        require view("odeme-yontemleri/havale-eft");
      break;
      case "hesap-numaralari":
        require view("odeme-yontemleri/hesap-numaralari");
      break;
      case "western-union":

        if( post("westernUnion") ):
          $banka_id = 5;
          $odeme_yapan_kisi = post("odeme_yapan_kisi", true);
          $mtcn = post("mtcn", true);
          $odeme_tarihi = post("odeme_tarihi", true);
          $miktar = post("miktar", true);

          if(!$banka_id or !$miktar or !$odeme_yapan_kisi or !$odeme_tarihi or !$mtcn){
            $response = array(
              'class' => 'warning',
              'message' => 'Boş alan bırakılamaz.'
            );
          }else{

            $insertOdemeBildirimi = DB::insert("INSERT INTO odeme_bildirimleri(banka_id,uye_id,odeme_yapan_kisi,tarih,miktar) VALUES(?,?,?,?,?)", array(
              $banka_id,
              session("uye_id"),
              $odeme_yapan_kisi . ' - MTCN: '. $mtcn,
              $odeme_tarihi,
              $miktar
            ));

            if($insertOdemeBildirimi){
              $response = array(
                'class' => 'success',
                'message' => '<strong>Western Union</strong> ödeme bildiriminiz başarıyla oluşturuldu. En kısa zamanda incelenecektir.'
              );
            }else{
              $response = array(
                'class' => 'danger',
                'message' => 'Ödeme bildirimi yapılırken hata oluştu. Lütfen daha sonra tekrar deneyiniz.'
              );
            }

          }
        endif;

        require view("odeme-yontemleri/western-union");
      break;
      default:
        header("Location: " . site_url("odeme-yontemleri"));
      break;
    }
  }else{
    header("Location: " . site_url("odeme-yontemleri"));
  }
}else{
  // varsayılan bakiye sayfası
  require view("bakiye");
}
