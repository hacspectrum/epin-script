<?php

$kategoriler = DB::get("SELECT * FROM chip_kategoriler order by id DESC");

require view("admin/kategoriler");
