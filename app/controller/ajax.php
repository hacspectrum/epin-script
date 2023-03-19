<?php

header('Content-Type: application/json');

# ajax page (type)
$type = url(1);

if(file_exists(ajax_controller($type))){
  require ajax_controller($type);
}else{
  echo json_encode(
    [
      'error' => true,
      'message' => 'Böyle bir servis yok!'
    ]
  );
}

?>
