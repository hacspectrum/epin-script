<?php

class Helper {

  public static function Load()
  {
    $helperDir = realpath('.') . '/app/helper';
    if ($dh = opendir($helperDir)){
      while($file = readdir($dh)){
        if (is_file($helperDir . '/' . $file)){
          require $helperDir . '/' . $file;
        }
      }
    }
  }

}
