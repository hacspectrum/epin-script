<?php

if($id = get("id")){
  $delete = DB::exec("DELETE FROM duyurular WHERE id = '$id'");
  if($delete){
    header("Location: " . site_url('admin/duyurular'));
  }else{
    echo '<script>alert("Duyuru silinemedi!")</script>';
    header("Location: " . site_url('admin/duyurular'));
  }
}else{
  header("Location: " . site_url('admin/duyurular'));
}
