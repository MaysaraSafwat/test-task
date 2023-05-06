<?php
require_once("vendor/autoload.php");
echo "hey there!";
$db = new MYSQLHandler("products");
var_dump($db);
?>