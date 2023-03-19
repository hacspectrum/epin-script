<?php

if($id = get("id")){
  $delete = DB::exec("DELETE FROM chip_kategoriler WHERE id = '$id'");
  if($delete){
    header("Location: " . site_url('admin/kategoriler'));
  }else{
    echo '<script>alert("Kategori silinemedi!")</script>';
    header("Location: " . site_url('admin/kategoriler'));
  }
}else{
  header("Location: " . site_url('admin/kategoriler'));
}
