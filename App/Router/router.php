<?php

require_once  __DIR__."/../../vendor/autoload.php";

use CoffeeCode\Router\Router;
use \App\Middlewares\AuthMiddleware;
use App\Models\User;

$router = new Router(projectUrl: "http://".URL_BASE);

$router->namespace(namespace: "App\Core");

$router->group(null, AuthMiddleware::class);
$router->get("/", "Router:home");


$router->group("login", AuthMiddleware::class);
$router->get("/", "Router:login");
$router->post("/", "Router:loginPost");

$router->group("register", AuthMiddleware::class);
$router->get("/", "Router:register");
$router->post("/", "Router:registerPost");

$router->dispatch();

?>