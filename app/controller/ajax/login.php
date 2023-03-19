<?php

  if( post('login') ){

    $email = post('email');
    $password = post('password');

    if(empty($email) or empty($password)){
      echo json_encode(
        [
          'error' => true,
          'message' => 'Boş alan bırakamazsınız.'
        ]
      );
    }else{

      $userControl = DB::getVar("SELECT COUNT(*) FROM uyeler WHERE email = '$email' && password = '" . md5($password) . "'");

      if($userControl > 0){

        $user = DB::getRow("SELECT * FROM uyeler WHERE email = '$email' && password = '" . md5($password) . "'");

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

        echo json_encode(
          [
            'error' => false,
            'message' => 'Başarıyla giriş yapıldı.'
          ]
        );
        hareketEkle($user->id, "giris", json_encode([
          'giris_tarihi' => date("d.m.Y H:i")
        ]));

      }else{
        echo json_encode(
          [
            'error' => true,
            'message' => 'Kullanıcı adı veya şifre yanlış.'
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

?>
