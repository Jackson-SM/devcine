<?php

require_once  __DIR__."/../../vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(projectUrl: "http://".URL_BASE);

$router->namespace(namespace: "App\Core");

$router->group(group: null);
$router->get("/", handler: "Router:home");


$router->dispatch();

?>