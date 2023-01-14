<?php
require "../vendor/autoload.php";

use Source\Helpers\Router;

echo "<h1>Admin Index</h1>";

$router = new Router();
$router->loadPage();
