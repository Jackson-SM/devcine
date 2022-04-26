<?php

require_once  __DIR__."/../../vendor/autoload.php";

use CoffeeCode\Router\Router;
use \App\Middlewares\AuthMiddleware;

$router = new Router(projectUrl: "http://".URL_BASE);

$router->namespace(namespace: "App\Core");

$router->group(null, AuthMiddleware::class);
$router->get("/", "Router:home");

$router->group("name", AuthMiddleware::class);
$router->get("/", function($data) {
  echo 'Ola Name';
});


$router->dispatch();

?>