<?php

if($id = get("id")){
  $delete = DB::exec("DELETE FROM slider WHERE id = '$id'");
  if($delete){
    header("Location: " . site_url('admin/slider'));
  }else{
    echo '<script>alert("Slider silinemedi!")</script>';
    header("Location: " . site_url('admin/slider'));
  }
}else{
  header("Location: " . site_url('admin/slider'));
}
