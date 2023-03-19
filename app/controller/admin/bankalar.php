<?php

$bankalar = DB::get("SELECT * FROM bankalar order by id DESC");

require view("admin/bankalar");
