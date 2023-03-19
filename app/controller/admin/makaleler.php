<?php

$makaleler = DB::get("SELECT * FROM makaleler order by id DESC");

require view("admin/makaleler");
