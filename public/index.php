<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('ROOT_PATH', ROOT . DS . 'library' . DS . 'DEMO');

require dirname(__DIR__) . DS . 'vendor' . DS . 'autoload.php';

$url = (array_key_exists('url', $_GET) ? $_GET['url'] : null);
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
