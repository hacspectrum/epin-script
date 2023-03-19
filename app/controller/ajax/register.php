<?php
  function tckimlik($tckimlik){ 
      $ilkt = null;
      $sont = null;
      $tumt = null;
      $olmaz=array('11111111110','22222222220','33333333330','44444444440','55555555550','66666666660','7777777770','88888888880','99999999990'); 
      if($tckimlik[0]==0 or !ctype_digit($tckimlik) or strlen($tckimlik)!=11){ return false;  } 
      else{ 
          for($a=0;$a<9;$a=$a+2){ $ilkt=$ilkt+$tckimlik[$a]; } 
          for($a=1;$a<9;$a=$a+2){ $sont=$sont+$tckimlik[$a]; } 
          for($a=0;$a<10;$a=$a+1){ $tumt=$tumt+$tckimlik[$a]; } 
          if(($ilkt*7-$sont)%10!=$tckimlik[9] or $tumt%10!=$tckimlik[10]){ return false; } 
          else{  
              foreach($olmaz as $olurmu){ if($tckimlik==$olurmu){ return false; } } 
              return true; 
          } 
      } 
  } 
  if( post('register') ){
    $tc = post("tc",true);
    $adsoyad = post("adsoyad",true);
    $email = post("email",true);
    $password = post("password",true);
    $phone_number = post("phone_number",true);
    $sozlesme = post("sozlesme", true) ? post("sozlesme", true) : null;

    if(!$adsoyad or !$email or !$password or !$phone_number or !$tc){
      echo json_encode(
        [
          'error' => true,
          'message' => "Boş alan bırakılamaz."
        ]
      );
    }elseif(tckimlik($_POST['tc'])){
      if(is_numeric($phone_number)){
        if(strlen($adsoyad) > 5){
          if(DB::getVar("SELECT COUNT(*) FROM uyeler WHERE email = '$email'") > 0){
            echo json_encode(
              [
                'error' => true,
                'message' => 'Bu e-posta adresi zaten kayıtlı.'
              ]
            );
          }else{
            if(empty($sozlesme) || !$sozlesme){
              echo json_encode(
                [
                  'error' => true,
                  'message' => 'Üyelik sözleşmesini onaylamanız gerekmektedir.'
                ]
              );
            }else{
              $insert = DB::insert("INSERT INTO uyeler(adsoyad,email,password,phone_number,tc) VALUES(?,?,?,?,?)", array(
                $adsoyad,
                $email,
                md5($password),
                $phone_number,
                $tc
              ));
              if($insert){
                echo json_encode(
                  [
                    'error' => false,
                    'message' => 'Üyeliğiniz başarıyla oluşturulmuştur. Giriş yapabilirsiniz.'
                  ]
                );
              }else{
                echo json_encode(
                  [
                    'error' => true,
                    'message' => 'Üyeliğiniz oluşturulurken sorun oluştu. Lütfen daha sonra tekrar deneyin.'
                  ]
                );
              }
            }
          }
        }else{
          echo json_encode(
            [
              'error' => true,
              'message' => 'Lütfen geçerli bir ad soyad girin.'
            ]
          );
        }
      }else{
        echo json_encode(
          [
            'error' => true,
            'message' => 'Lütfen geçerli bir telefon numarası girin.'
          ]
        );
      }
    }else{
     echo json_encode(
          [
            'error' => true,
            'message' => 'Lütfen geçerli bir TC kimlik numarası girin.'
          ]
        );
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
