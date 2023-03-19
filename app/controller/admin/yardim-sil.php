<?php

if($id = get("id")){
  $delete = DB::exec("DELETE FROM yardim WHERE id = '$id'");
  if($delete){
    header("Location: " . site_url('admin/yardim'));
  }else{
    echo '<script>alert("Yardım başlığı silinemedi!")</script>';
    header("Location: " . site_url('admin/yardim'));
  }
}else{
  header("Location: " . site_url('admin/yardim'));
}
