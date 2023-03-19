<?php

function ajax_controller($name){
  return ajax_controller . '/' . $name . '.php';
}

function controller($name){
  return controller . '/' . $name . '.php';
}

function view($name){
  return view . '/' . $name . '.php';
}

function __($langCode){
  global $lang;
  if(isset($lang[strtolower($langCode)]))
    return $lang[strtolower($langCode)];
  return $langCode;
}
