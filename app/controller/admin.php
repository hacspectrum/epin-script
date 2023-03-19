<?php

if( !url(1) ){
  $_url[1] = 'index';
}

if( !session("login") ){
  $_url[1] = 'login';
}

if( DB::getVar("SELECT rutbe FROM uyeler WHERE id = '" . session("uye_id") . "'") != 1 ){
  header("Location: " . site_url());
  exit;
}

if(file_exists(controller('admin/' . url(1)))){
  require controller('admin/' . url(1));
}else{
  require controller('admin/index');
}
