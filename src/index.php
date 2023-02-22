<?php
/** http://localhost:888/... */

use vendor\core\Router;

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once 'vendor/config/config.php';
require_once 'vendor/autoload.php';

Router::dispatch();