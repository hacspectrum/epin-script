<?php

defined("LOGGED_IN") ? header("Location: " . site_url()) : null;

if( post("sifremiHatirlat") ){
  $email = post("email");
  if(!$email){
    $response = array(
      'class' => 'warning',
      'message' => 'Lütfen e-posta adresini giriniz.'
    );
  }else{
    if(DB::getVar("SELECT COUNT(*) FROM uyeler WHERE email = '$email'") > 0){
      $yeniSifre = md5(rand(100000,999999));
      $updateSifre = DB::exec("UPDATE uyeler SET password = '" . $yeniSifre . "' WHERE email = '$email'");

      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPAuth = false;
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPSecure = 'tls';
      $mail->Username = MAIL_ADRES;
      $mail->Password = MAIL_SIFRE;
      $mail->SetFrom($mail->Username, SITE_TITLE);
      $mail->AddAddress($email, DB::getVar("SELECT adsoyad FROM uyeler WHERE email = '$email'"));
      $mail->CharSet = 'UTF-8';
      $mail->Subject = 'Şifre Hatırlat - ' . str_replace(["http://","https://","www"],null,site_url(null));
      $content = '<div style="background: #fff; padding: 40px; font-size: 14px">
        <strong>Yeni Şifreniz: ' . $yeniSifre . '</strong> <br>
        <a href="' . site_url() . '">Giriş yapmak için tıklayınız.</a>
      </div>';
      $mail->MsgHTML($content);
      if($mail->Send()) {
          // e-posta başarılı ile gönderildi
          $response = array(
            'class' => 'success',
            'message' => 'Lütfen e-posta(' . $email . ') kutunuzu kontrol ediniz.'
          );
      } else {
          // bir sorun var, sorunu ekrana bastıralım
          // echo
          $response = array(
            'class' => 'danger',
            'message' => 'Hata oluştu.' . $mail->ErrorInfo
          );
      }
    }else{
      $response = array(
        'class' => 'danger',
        'message' => 'Böyle bir üye bulunamadı.'
      );
    }
  }
}

require view("sifremi-unuttum");
