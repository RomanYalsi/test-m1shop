<?php

namespace Project;
use Project\Core;

define('APPLICATION_ENV', getenv('APPLICATION_ENV') ?: 'local');

error_reporting(E_ALL);

define('PROTOCOL', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://');
define('URL', PROTOCOL . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');
define('WWW_PATH', realpath(__DIR__));
define('ROOT_PATH', realpath(__DIR__ . '/..') . '/');
define('APP_PATH', ROOT_PATH . 'App/');
define('VIEWS_PATH', APP_PATH . 'Views/');
try
{
    require ROOT_PATH . 'Core/AutoLoader.php';
    Core\AutoLoader::getInstance()->init();
    $params = ['name' => (!empty($_GET['p']) ? $_GET['p'] : 'blog'), 'action' => (!empty($_GET['a']) ? $_GET['a'] : 'index')];
    Core\Router::run($params);
}
catch (\Exception $e)
{
    echo $e->getMessage();
}