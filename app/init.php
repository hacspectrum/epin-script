<?php
ini_set('display_errors', 'On');
ini_set('post_max_size', '100M');
ini_set('upload_max_filesize', '100M');
ini_set('session.gc_maxlifetime', 6000);
session_set_cookie_params(6000);

session_start();
ob_start();

// Helper
require __DIR__ . '/classes/class.helper.php';
// DB
require __DIR__ . '/classes/class.db.php';
// PHPMailer
require __DIR__ . '/classes/class.phpmailer.php';
// Upload Class (Verot.Net)
require __DIR__ . '/classes/class.upload.php';
// GameCard
require __DIR__ . '/classes/class.gamecard.php';

// helper loader
Helper::Load();
// config file
require 'system/config.php';

// language files
require 'language/' . $config['default_language'] . '/lang.php';

// thirdparty (composer)
require_once __DIR__ . '/thirdparty/vendor/autoload.php';