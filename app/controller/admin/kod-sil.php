<?php

if($id = get("code_id")){
    DB::exec("DELETE FROM codes WHERE id = '$id'");
}

header("Location: " . $_SERVER['HTTP_REFERER']);
exit;