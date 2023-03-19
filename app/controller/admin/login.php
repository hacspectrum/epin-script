<?php

if(post("login")){

  $email = post("email");
  $password = post("password");

  if(!$email or !$password){
    $response = array(
      'class' => 'warning',
      'message' => 'Boş alan bırakılamaz.'
    );
  }else{
    // boş değilse
    if(DB::getVar("SELECT COUNT(*) FROM uyeler WHERE email = '$email' AND password = '".md5($password)."' AND rutbe = '1'")){
      // üyelik varsa ve yetkiliyse
      $user = DB::getRow("SELECT * FROM uyeler WHERE email = '$email' AND password = '".md5($password)."' AND rutbe = '1'");

      $siparis_code = md5(uniqid(true));
      $create_siparis_code = DB::exec("UPDATE uyeler SET siparis_code = '$siparis_code' WHERE id = '" . $user->id . "'");

      # create api key
      $new_api_key = md5(uniqid(mt_rand(), true));
      $updateApiKey = DB::exec("UPDATE uyeler SET api_key = '$new_api_key', last_login_ip = '" . GetIP() . "' WHERE id = '" . $user->id . "'");
      #

      $sessionArray = array(
        'login' => true,
        'api_key' => $new_api_key,
        'uye_id' => $user->id,
        'email' => $user->email,
        'adsoyad' => $user->adsoyad
      );

      create_sessions($sessionArray);

      $response = array(
        'class' => 'success',
        'message' => 'Başarıyla giriş yapıldı. Yönlendiriliyorsunuz...'
      );

      header('Refresh:2;url=' . site_url('admin'));
    }else{
      // üyelik yanlışsa veya yetkili değilse
      $response = array(
        'class' => 'danger',
        'message' => 'Kullanıcı veya Şifre yanlış!'
      );
    }
  }

}

require view("admin/login");
