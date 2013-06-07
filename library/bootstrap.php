<?php
use DEMO\Tools\Logger as Logger;
use Inflection\Inflection as Inflection;

require_once (ROOT . DS . 'config' . DS . 'config.php');
require_once (ROOT . DS . 'config' . DS . 'routing.php');
require_once (ROOT . DS . 'config' . DS . 'inflection.php');
require_once (ROOT . DS . 'library' . DS . 'shared.php');

ini_set('date.timezone', DATE_TIMEZONE);

ob_start();
$logger = new Logger('');
$inflect = new Inflection();
setReporting();
callHook();
