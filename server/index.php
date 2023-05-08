<?php
require_once("vendor/autoload.php");
header("Content-type: application/json; charset=UTF-8");

$parts = explode("/",$_SERVER["REQUEST_URI"]);

if($parts[3] != 'products'){
  http_response_code(404);
  exit();
}
$type= $parts[4]?? NULL;
$request = new Request();
$request->processRequest($_SERVER["REQUEST_METHOD"], $type);