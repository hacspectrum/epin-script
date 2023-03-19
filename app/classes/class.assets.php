<?php
/**
 * assets compressor
 */
$path = realpath(".") . '/app/thirdparty/vendor/matthiasmullie';
require_once $path . '/minify/src/Minify.php';
require_once $path . '/minify/src/CSS.php';
require_once $path . '/minify/src/JS.php';
require_once $path . '/minify/src/Exception.php';
require_once $path . '/minify/src/Exceptions/BasicException.php';
require_once $path . '/minify/src/Exceptions/FileImportException.php';
require_once $path . '/minify/src/Exceptions/IOException.php';
require_once $path . '/path-converter/src/ConverterInterface.php';
require_once $path . '/path-converter/src/Converter.php';

use MatthiasMullie\Minify;

class Assets
{
  public static function Compress()
  {

    // compress javascript (assets/js/jscript.js)
    self::Compress_JS();

    // compress stylesheet (assets/css/stylesheet.css)
    self::Compress_CSS();

  }

  private static function Compress_JS()
  {

    $sourcePath = realpath(".") . "/assets/js/jquery-3.2.1.min.js";
    $minifier = new Minify\JS($sourcePath);

    $otherSourcePaths = array(
      realpath(".") . "/assets/js/jquery.easing.min.js",
      realpath(".") . "/assets/js/popper.min.js",
      realpath(".") . "/assets/js/bootstrap.min.js",
      realpath(".") . "/assets/js/jquery.ticker.min.js",
      realpath(".") . "/assets/js/gijgo.min.js",
      realpath(".") . "/assets/js/axios.min.js",
      realpath(".") . "/assets/js/scripts.js",
    );

    foreach($otherSourcePaths as $source):
      $minifier->add($source);
    endforeach;

    $minifiedPath = realpath(".") . "/assets/js/jscript.js";
    $minifier->minify($minifiedPath);

  }

  private static function Compress_CSS()
  {

    $sourcePath = realpath(".") . "/assets/css/style.css";
    $minifier = new Minify\CSS($sourcePath);

    $otherSourcePaths = array(
      realpath(".") . "/assets/css/ionicons.css",
      realpath(".") . "/assets/css/animate.css",
      realpath(".") . "/assets/css/gijgo.min.css",
    );

    foreach($otherSourcePaths as $source):
      $minifier->add($source);
    endforeach;

    $minifiedPath = realpath(".") . "/assets/css/stylesheet.css";
    $minifier->minify($minifiedPath);

  }

}
