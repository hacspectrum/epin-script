<?php

if(defined("LOGGED_IN")):
    header("Location: " . site_url());
    exit;
endif;

require view("uye-ol");