<?php
require_once("vendor/autoload.php");
use Pecee\SimpleRouter\SimpleRouter;

require_once './routes/web.php';

//SimpleRouter::enableMultiRouteRendering(false);
// Start the routing
echo SimpleRouter::start();
// SimpleRouter::get('/products/{$type}', function ($type) {
//   echo 'product with type: ' . $type;
// });