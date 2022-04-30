<?php

require_once  __DIR__."/../../vendor/autoload.php";

use CoffeeCode\Router\Router;
use App\Middlewares\NotLoggedMiddleware;
use App\Models\User;

$router = new Router(projectUrl: "http://".URL_BASE);

$router->namespace(namespace: "App\Core");

$router->group(null);
$router->get("/", "Router:home");


$router->group("login", NotLoggedMiddleware::class);
$router->get("/", "Router:login");
$router->post("/", "Router:loginPost");

$router->group("register", NotLoggedMiddleware::class);
$router->get("/", "Router:register");
$router->post("/", "Router:registerPost");

$router->group("logout");
$router->get("/", "Router:logout");

$router->dispatch();

?>