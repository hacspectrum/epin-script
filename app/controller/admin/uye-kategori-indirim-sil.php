<?php

if($id = get("id")){
	$delete = DB::exec("DELETE FROM bayi_kategori_indirimleri WHERE id = '" . $id . "'");

	header("Location: " . site_url("admin/uye-duzenle?id=" . get("uye_id")));
}else{
	header("Location: " . site_url("admin"));
	exit;
}