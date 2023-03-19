<?php

if($id = get("id")){
  $uye = DB::getRow("SELECT * FROM uyeler WHERE id = '$id'");
  if(isset($uye->id)){
    // üye var

    if($_POST['duzenlemeForm']):

      $email = post("email", true);
      $adsoyad = post("adsoyad", true);
      $phone_number = post("phone_number", true);
      $bayi = post("bayi", true);
      $bayi_indirimi = post("bayi_indirimi", true);
      $rutbe = post("rutbe", true);

      $yeni_sifre = post("yeni_sifre", true);
      if( $yeni_sifre != null ){
        $sifre = md5($yeni_sifre);
      }else{
        $sifre = $uye->password;
      }

      if(empty($email) or empty($adsoyad) or empty($phone_number)
          or $bayi == null or $rutbe == null or $bayi_indirimi == null){
        $response = array(
          'class' => 'warning',
          'message' => 'Boş alan bırakılamaz.'
        );
      }else{
        // update uye
        $update = DB::exec("UPDATE uyeler SET email = '$email',
                                              password = '$sifre',
                                              adsoyad = '$adsoyad',
                                              phone_number = '$phone_number',
                                              bayi = '$bayi',
                                              bayi_indirim = '$bayi_indirimi',
                                              rutbe = '$rutbe' WHERE id = '" . $uye->id . "'");

        if($update){
          $response = array(
            'class' => 'success',
            'message' => 'Üye başarıyla güncellendi.'
          );
          header("Refresh:2;url=" . site_url("admin/uye-duzenle?id=" . $uye->id));
        }else{
          $response = array(
            'class' => 'danger',
            'message' => 'Üye güncellenirken problem oluştu.'
          );
        }

      }

    endif;

    if( post("indirimEkle") ):

      $kategori_id = post("kategori_id");
      $indirim = post("indirim");
      $uye_id = get("id");

      if( $indirim > 0 ){
        $insert = DB::insert("INSERT INTO bayi_kategori_indirimleri(kategori_id,indirim,uye_id) VALUES(?,?,?)", array(
          $kategori_id,
          $indirim,
          $uye_id
        ));
        if($insert){
          $response = array(
            'class' => 'success',
            'message' => 'İndirim başarıyla eklendi.'
          );
          header("Refresh:1;url=" . site_url('admin/uye-duzenle?id=' . get('id')));
        }else{
          $response = array(
            'class' => 'danger',
            'message' => 'Eklenirken problem oluştu.'
          );
        }
      }

    endif;

  }else{

    header("Location: " . site_url("admin/uyeler"));
    exit();

  }
}else{

  header("Location: " . site_url("admin/uyeler"));
  exit();

}

require view("admin/uye-duzenle");
