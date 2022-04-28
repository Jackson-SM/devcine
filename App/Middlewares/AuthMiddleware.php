<?php

namespace App\Middlewares;

use CoffeeCode\Router\Router;

class AuthMiddleware {
  
  public function handle(Router $router): bool
  {
    $logged = $_SESSION['logged'];
    if($logged) {
      return true;
    }
    $router->redirect('/');
    return false;
  }
}