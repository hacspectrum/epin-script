<?php

$config = array();

$config['db'] = [
  'host' => 'localhost',
  'name' => 'phpscrip_epin',
  'user' => 'phpscrip_epin',
  'pass' => 'e2T'
];

// mysql defines
define("MYSQL_HOST", $config['db']['host']);
define("MYSQL_DB", $config['db']['name']);
define("MYSQL_USER", $config['db']['user']);
define("MYSQL_PASS", $config['db']['pass']);

// default language
$config['default_language'] = 'tr';

// time language
date_default_timezone_set('Europe/Istanbul');
setlocale(LC_TIME, "turkish");

// system defines
define('dir', realpath('.'));
define('controller', dir . '/app/controller');
define('ajax_controller', dir . '/app/controller/ajax');
define('view' , dir . '/app/view');
define('url', 'http://' . $_SERVER['SERVER_NAME']);

// media defines
define('PUBLIC_IMAGE', url . '/public');

// meta
define('SITE_TITLE', DB::getVar("SELECT site_title FROM genel_ayarlar WHERE id = '1'"));
define('META_DESCRIPTION', DB::getVar("SELECT meta_description FROM genel_ayarlar WHERE id = '1'"));
define('META_KEYWORDS', DB::getVar("SELECT meta_keywords FROM genel_ayarlar WHERE id = '1'"));

// things
define('HAKKIMIZDA_METNI', DB::getVar("SELECT hakkimizda_metni FROM genel_ayarlar WHERE id = '1'"));
define('TELEFON', DB::getVar("SELECT telefon FROM genel_ayarlar WHERE id = '1'"));
define('SKYPE', DB::getVar("SELECT skype FROM genel_ayarlar WHERE id = '1'"));
define('MASABULUCU', DB::getVar("SELECT masabulucu FROM genel_ayarlar WHERE id = '1'"));
define('ADRES', DB::getVar("SELECT masabulucu FROM genel_ayarlar WHERE id = '1'"));
define('FACEBOOK_URL', DB::getVar("SELECT facebook_url FROM genel_ayarlar WHERE id = '1'"));
define('TWITTER_URL', DB::getVar("SELECT twitter_url FROM genel_ayarlar WHERE id = '1'"));
define('INSTAGRAM_URL', DB::getVar("SELECT instagram_url FROM genel_ayarlar WHERE id = '1'"));

// payment services defines
###########################
# PAYTR
define('PAYTR_MERCHANT_ID', DB::getVar("SELECT PAYTR_MERCHANT_ID FROM diger_ayarlar WHERE id = '1'"));
define('PAYTR_MERCHANT_KEY', DB::getVar("SELECT PAYTR_MERCHANT_KEY FROM diger_ayarlar WHERE id = '1'"));
define('PAYTR_MERCHANT_SALT', DB::getVar("SELECT PAYTR_MERCHANT_SALT FROM diger_ayarlar WHERE id = '1'"));

# GPAY
define('GPAY_USERNAME', DB::getVar("SELECT GPAY_USERNAME FROM diger_ayarlar WHERE id = '1'"));
define('GPAY_KEY', DB::getVar("SELECT GPAY_KEY FROM diger_ayarlar WHERE id = '1'"));

# Chipcin
define('CHIPCIN_EMAIL', DB::getVar("SELECT CHIPCIN_EMAIL FROM diger_ayarlar WHERE id = '1'"));
define('CHIPCIN_SIFRE', DB::getVar("SELECT CHIPCIN_SIFRE FROM diger_ayarlar WHERE id = '1'"));

// game card api defines
###########################
# TempoPlay
define('TEMPOPLAY_KEY' , DB::getVar("SELECT TEMPO_POKER_API_KEY FROM diger_ayarlar WHERE id = '1'"));
# EnjoyPoker
define('ENJOYPOKER_KEY' , DB::getVar("SELECT ENJOY_POKER_API_KEY FROM diger_ayarlar WHERE id = '1'"));
# TurnPoker
define('TURNPOKER_KEY' , DB::getVar("SELECT TURN_POKER_API_KEY FROM diger_ayarlar WHERE id = '1'"));
# API Array
global $GAMECARD_API_ARRAY;
$GAMECARD_API_ARRAY = array(
  array(
    'id' => 0,
    'name' => 'TEMPO POKER',
    'api_url' => 'https://tempoplay.com/api/api.php',
    'api_key' => TEMPOPLAY_KEY
  ),
  array(
    'id' => 1,
    'name' => 'ENJOY POKER',
    'api_url' => 'https://enjoy.tempoplay.com/api/api.php',
    'api_key' => ENJOYPOKER_KEY
  ),
  array(
    'id' => 2,
    'name' => 'TURN POKER',
    'api_url' => 'https://turngs.com/api/api.php',
    'api_key' => TURNPOKER_KEY
  )
);

/* define('GAMECARD_API_ARRAY', array(
  array(
    'id' => 0,
    'name' => 'TEMPO POKER',
    'api_url' => 'https://tempoplay.com/api/api.php',
    'api_key' => TEMPOPLAY_KEY
  ),
  array(
    'id' => 1,
    'name' => 'ENJOY POKER',
    'api_url' => 'https://enjoy.tempoplay.com/api/api.php',
    'api_key' => ENJOYPOKER_KEY
  ),
  array(
    'id' => 2,
    'name' => 'TURN POKER',
    'api_url' => 'https://turngs.com/api/api.php',
    'api_key' => TURNPOKER_KEY
  )
)); */

# EKSTRA SCRIPT
define('EKSTRA_SCRIPT', DB::getVar("SELECT EKSTRA_SCRIPT FROM diger_ayarlar WHERE id = '1'"));

# Facebook App
define('FACEBOOK_APP_ID', DB::getVar("SELECT FACEBOOK_API_ID FROM diger_ayarlar WHERE id = '1'"));
define('FACEBOOK_APP_SECRET', DB::getVar("SELECT FACEBOOK_API_SECRET FROM diger_ayarlar WHERE id = '1'"));
define('FACEBOOK_APP_GRAPH_VERSION', DB::getVar("SELECT FACEBOOK_APP_GRAPH_VERSION FROM diger_ayarlar WHERE id = '1'"));

# PHPMailer
define('MAIL_ADRES', DB::getVar("SELECT MAIL_ADRES FROM diger_ayarlar WHERE id = '1'"));
define('MAIL_SIFRE', DB::getVar("SELECT MAIL_SIFRE FROM diger_ayarlar WHERE id = '1'"));

# SHOPIER
define('SHOPIER_API_KEY', DB::getVar("SELECT SHOPIER_API_KEY FROM diger_ayarlar WHERE id = '1'"));
define('SHOPIER_API_SECRET', DB::getVar("SELECT SHOPIER_API_SECRET FROM diger_ayarlar WHERE id = '1'"));

// login define
if ( @$_SESSION["login"] == true ){
  define('LOGGED_IN',true);
}
