<?php
/** http://localhost:888/... */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

use vendor\core\Router;

require_once 'vendor/config/config.php';

Router::dispatch();