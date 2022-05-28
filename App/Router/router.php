<?php

require_once  __DIR__."/../../vendor/autoload.php";

use App\Middlewares\LevelMiddleware;
use App\Middlewares\LoggedMiddleware;
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

$router->group("logout", LoggedMiddleware::class);
$router->get("/", "Router:logout");

$router->group("panel", [LoggedMiddleware::class, LevelMiddleware::class]);
$router->get("/", "Router:panel");

$router->group("upload", [LevelMiddleware::class, LoggedMiddleware::class]);

$router->get("/video", "Router:uploadVideo");
$router->post("/video", "Router:uploadVideoPost");


$router->get("/season", "Router:uploadSeason");
$router->get("/episode", "Router:uploadEpisode");

$router->dispatch();

?>