<?php

if( $_POST ){

  $banka_adi = post("banka_adi");
  $adsoyad = post("adsoyad");
  $iban = post("iban");
  $hesapno = post("hesapno");
  $subeno = post("subeno");
  $banka_gorsel = $_FILES["banka_gorsel"];
  $banka_type = post("type", true);

  if( empty($banka_adi) or empty($adsoyad) or empty($iban) or empty($hesapno)
    or empty($subeno) or empty($banka_type) or empty($banka_gorsel) ){
    $response = array(
      'class' => 'warning',
      'message' => 'Boş alan bırakılamaz.'
    );
  }else{

    $banka_gorsel = fileUpload($banka_gorsel, "public/banka", false);

    if($banka_gorsel != null){
      $insertBanka = DB::insert("INSERT INTO bankalar(banka_adi,banka_gorsel,banka_type,adsoyad,iban,hesapno,subeno)
                                 VALUES(?,?,?,?,?,?,?)",array(
                                   $banka_adi,
                                   $banka_gorsel,
                                   $banka_type,
                                   $adsoyad,
                                   $iban,
                                   $hesapno,
                                   $subeno
                                 ));
      if($insertBanka){
        $response = array(
          'class' => 'success',
          'message' => 'Banka hesabı başarıyla eklendi.'
        );
        header("Refresh:2;url=" . site_url("admin/bankalar"));
      }else{
        $response = array(
          'class' => 'danger',
          'message' => 'Banka eklenirken bir problem oluştu. Lütfen daha sonra tekrar deneyin.'
        );
      }
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Resim yüklenemedi.'
      );
    }
  }

}

require view("admin/banka-ekle");
