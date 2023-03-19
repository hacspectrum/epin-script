<?php

function filterUrl($str, $control = false){
  if($control == true){
    return htmlspecialchars(addslashes(trim($str)));
  }else{
    return addslashes(trim($str));
  }
}

function get($name){
  if(isset($_GET[$name])){

    if (is_array($_GET[$name])){
      return array_map(function($item){
        return filterUrl($item);
      }, $_GET[$name]);
    }

    return strip_tags(filterUrl($_GET[$name]));

  }
  return false;
}

function post($name,$control = false){
  if(isset($_POST[$name])){

    if (is_array($_POST[$name])){
      return array_map(function($item){
        return filterUrl($item,$control);
      }, $_POST[$name]);
    }

    return filterUrl($_POST[$name]);

  }
  return false;
}
