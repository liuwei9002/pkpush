<?php
/**
 * User: Peter Wang
 * Date: 16/12/31
 * Time: 上午10:53
 */
define("ROOT_PATH", __DIR__."/../");
define("STORAGE_PATH", __DIR__."/../storage");
define("APPLICATION_PATH",__DIR__."/../application");
require_once __DIR__ . "/../vendor/autoload.php";

$path = APPLICATION_PATH . '/resource/static';
$staticDir = basename($path);
$tPath =  STORAGE_PATH . '/public/'.$staticDir;
$viewPath = APPLICATION_PATH . '/resource/views/default';
$ext = ["js", "css", "png", "gif", "jpg"];

$obj = new \Trensy\Mvc\View\Engine\Blade\Asset();
$obj->createDiffAsset($path, $tPath, $ext, $viewPath, $staticDir);
