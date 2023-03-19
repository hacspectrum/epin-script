<?php

function fileUpload($file, $klasor = 'public', $ratio = true){
  $image = new Upload( $file );
  if ( $image->uploaded ) {
      $image->file_new_name_body = substr(base64_encode(uniqid(true)), 0, 20);
  		if($image->image_src_x > 1200 && $ratio == true){
        $image->image_convert = 'jpg';
        $image->jpeg_quality = 85;
        $image->image_resize = true;
        $image->image_x = 1200;
    		$image->image_ratio_y = true;
      }
      $image->allowed = array ( 'image/*' );
      //islem
      $image->Process( $klasor . '/' );
      if ( $image->processed ) {
        return $image->file_dst_name;
      }else{
        return false;
      }
      $image->clean();
  }else{
    return false;
  }
}
