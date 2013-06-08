<?php

use Inflection\Inflection as Inflection;

require_once (ROOT . DS . 'config' . DS . 'config.php');
require_once (ROOT . DS . 'config' . DS . 'routing.php');
require_once (ROOT . DS . 'config' . DS . 'inflection.php');
require_once (ROOT . DS . 'library' . DS . 'shared.php');

ini_set('date.timezone', DATE_TIMEZONE);
$url = (array_key_exists('url', $_GET) ? $_GET['url'] : null);

ob_start();
setReporting();
callHook($url, $default, $routing, new Inflection());
