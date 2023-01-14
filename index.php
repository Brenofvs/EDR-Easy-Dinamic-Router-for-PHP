<?php

require "./vendor/autoload.php";

use Source\Helpers\Router;

echo "<h1>Main Index</h1>";
$router = new Router();
$router->loadPage();
