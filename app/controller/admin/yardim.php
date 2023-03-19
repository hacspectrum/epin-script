<?php

$yardim = DB::get("SELECT * FROM yardim order by id DESC");

require view("admin/yardim");
