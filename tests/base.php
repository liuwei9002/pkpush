<?php
/**
 * User: Peter Wang
 * Date: 17/3/9
 * Time: 下午6:22
 */
define("ROOT_PATH", __DIR__."/../");
define("STORAGE_PATH", __DIR__."/../storage");
define("APPLICATION_PATH",__DIR__."/../application");
require_once __DIR__ . "/../vendor/autoload.php";
\Trensy\Foundation\Bootstrap\Bootstrap::getInstance(ROOT_PATH);