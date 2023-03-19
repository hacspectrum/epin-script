<?php

error_reporting(0);

if(file_exists(controller("payment_services/" . url(1)))){
  require controller("payment_services/" . url(1));
}else{
  header("Location: " . site_url());
  exit();
}
