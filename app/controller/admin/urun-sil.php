<?php

if($id = get("id")){
  $delete = DB::exec("DELETE FROM chip_urunler WHERE id = '$id'");
  if($delete){
    header("Location: " . site_url('admin/urunler'));
  }else{
    echo '<script>alert("Ürün silinemedi!")</script>';
    header("Location: " . site_url('admin/urunler'));
  }
}else{
  header("Location: " . site_url('admin/urunler'));
}
