<?php
require_once("vendor/autoload.php");

use Pecee\SimpleRouter\SimpleRouter;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With,Authorization,Content-Type');
header('Access-Control-Max-Age: 86400');
header('Content-Type: application/json');
require_once './routes/web.php';

// Start the routing
echo SimpleRouter::start();
