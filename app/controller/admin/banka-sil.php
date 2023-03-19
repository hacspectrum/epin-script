<?php

if($id = get("id")){
  $delete = DB::exec("DELETE FROM bankalar WHERE id = '$id'");
  if($delete){
    header("Location: " . site_url('admin/bankalar'));
  }else{
    echo '<script>alert("Banka silinemedi!")</script>';
    header("Location: " . site_url('admin/bankalar'));
  }
}else{
  header("Location: " . site_url('admin/bankalar'));
}
