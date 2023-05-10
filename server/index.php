<?php
require_once("vendor/autoload.php");
use Pecee\SimpleRouter\SimpleRouter;

require_once './routes/web.php';

// Start the routing
echo SimpleRouter::start();
