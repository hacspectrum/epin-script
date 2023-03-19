<?php

!defined("LOGGED_IN") ? exit(header("Location: " . site_url())) : null;

$hesap = DB::getRow("SELECT * FROM uyeler WHERE id = '" . session("uye_id") . "'");

if(post("hesabimGuncelle")):
    $adsoyad = post("adsoyad",true);
    $m_password = post("m_password",true);
    $y_password = post("y_password",true);
    $y_password_r = post("y_password_r",true);
    if($y_password == null){
        $n_password = md5($m_password);
        $y_password = 1;
        $y_password_r = 1;
    }else{
        $n_password = md5($y_password);
    }
    if(empty($adsoyad) || empty($m_password) || empty($y_password) || empty($y_password_r)){
        $response = array(
            "class"=>"warning",
            "message"=>"Boş alan bırakılamaz."
        );
    }else{
        if(md5($m_password)==$hesap->password){
            if($y_password == $y_password_r){
                $updateAccount = DB::exec("UPDATE uyeler SET adsoyad = '$adsoyad', password = '" . $n_password . "' WHERE id = '" . session("uye_id") . "'");
                if($updateAccount){
                    $response = array(
                        "class"=>"success",
                        "message"=>"Bilgiler başarıyla güncellendi."
                    );
                    header("Refresh:1;url=" . site_url("hesabim"));
                }else{
                    if(DB::errorInfo()[2]==null){
                        $response = array(
                            "class"=>"success",
                            "message"=>"Bilgiler başarıyla güncellendi."
                        );
                        header("Refresh:1;url=" . site_url("hesabim"));
                    }else{
                        $response = array(
                            "class"=>"danger",
                            "message"=>"Bilgileriniz güncellenemedi."
                        );
                    }
                }
            }else{
                $response = array(
                    "class"=>"warning",
                    "message"=>"Şifreler uyuşmuyor."
                );
            }
        }else{
            $response = array(
                "class"=>"danger",
                "message"=>"Mevcut şifre yanlış."
            );
        }
    }
endif;

require view("hesabim");