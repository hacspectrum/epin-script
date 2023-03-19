<?php

if($id = get("id")){
  $banka = DB::getRow("SELECT * FROM bankalar WHERE id = '$id'");
  if(!$banka->id){
    header("Location: " . site_url("admin/bankalar"));
  }else{
    // banka var

    if( $_POST ){

      $banka_adi = post("banka_adi");
      $adsoyad = post("adsoyad");
      $iban = post("iban");
      $hesapno = post("hesapno");
      $subeno = post("subeno");
      $banka_gorsel = $_FILES["banka_gorsel"];
      $banka_type = post("type", true);

      if(empty($banka_adi) or empty($adsoyad) or empty($iban) or empty($hesapno)
        or empty($subeno) or empty($banka_type)){
        $response = array(
          'class' => 'warning',
          'message' => 'Boş alan bırakılamaz.'
        );
      }else{

        if(empty($banka_gorsel)){
          $banka_gorsel = fileUpload($banka_gorsel, 'public/banka', false);
        }else{
          $banka_gorsel = $banka->banka_gorsel;
        }

        $updateBanka = DB::exec("UPDATE bankalar SET banka_adi = '$banka_adi',
                                                     adsoyad = '$adsoyad',
                                                     iban = '$iban',
                                                     hesapno = '$hesapno',
                                                     subeno = '$subeno',
                                                     banka_gorsel = '$banka_gorsel',
                                                     banka_type = '$banka_type'  WHERE id = '$id'");
        if($updateBanka){
          $response = array(
            'class' => 'success',
            'message' => 'Banka hesabı başarıyla güncellendi.'
          );
          header("Refresh:2;url=" . site_url("admin/banka?id=" . $id));
        }else{
          $response = array(
            'class' => 'danger',
            'message' => 'Banka güncellenirken bir problem oluştu. Lütfen daha sonra tekrar deneyin.'
          );
        }
      }

    }
  }
}else{
  header("Location: " . site_url("admin/bankalar"));
}

require view("admin/banka-duzenle");
