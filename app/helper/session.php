<?php

function session($name){
  return @$_SESSION[$name];
}

function create_sessions($array){
  foreach($array as $key => $val){
    $_SESSION[$key] = $val;
  }
}
