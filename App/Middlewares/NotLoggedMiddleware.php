<?php

namespace App\Middlewares;

use CoffeeCode\Router\Router;

class NotLoggedMiddleware {
  
  public function handle(Router $router): bool
  {
    $logged = isset($_SESSION['logged']);
    if(!$logged) {
      return true;
    }
    $router->redirect('/');
    return false;
  }
}