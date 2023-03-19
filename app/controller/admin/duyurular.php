<?php

$duyurular = DB::get("SELECT * FROM duyurular order by id DESC");

require view("admin/duyurular");
