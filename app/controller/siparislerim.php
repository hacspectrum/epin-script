<?php

!defined("LOGGED_IN") ? die(header("Location: " . site_url())) : null;

$siparisler = DB::get("SELECT * FROM siparisler WHERE uye_id = '" . session("uye_id") . "' order by id DESC");

require view("siparislerim");
