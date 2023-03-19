<?php

$satislar = DB::get("SELECT * FROM bize_sat order by id DESC");

require view('admin/satislar');
