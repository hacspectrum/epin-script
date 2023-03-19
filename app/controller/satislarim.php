<?php

$satislarim = DB::get("SELECT * FROM bize_sat WHERE uye_id = '" . session("uye_id") . "' order by id DESC");

require view("satislarim");
