<?php

if($id = get("id")){
  $delete = DB::exec("DELETE FROM makaleler WHERE id = '$id'");
  if($delete){
    header("Location: " . site_url('admin/makaleler'));
  }else{
    echo '<script>alert("Makale silinemedi!")</script>';
    header("Location: " . site_url('admin/makaleler'));
  }
}else{
  header("Location: " . site_url('admin/makaleler'));
}
