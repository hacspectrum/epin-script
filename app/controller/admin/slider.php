<?php

$slider = DB::get("SELECT * FROM slider order by id DESC");

require view("admin/slider");
