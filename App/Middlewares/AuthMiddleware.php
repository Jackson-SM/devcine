<?php

namespace App\Middlewares;

use CoffeeCode\Router\Router;

class AuthMiddleware {
  
  public function handle(Router $router): bool
  {
    $user = true;
    if($user) {
      return true;
    }
    $router->redirect('/name');
    return false;
  }
}