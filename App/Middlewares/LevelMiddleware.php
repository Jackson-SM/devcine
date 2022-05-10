<?php

namespace App\Middlewares;

use App\Controllers\UserController;
use CoffeeCode\Router\Router;

class LevelMiddleware {
  
  public function handle(Router $router): bool
  {
    $logged = isset($_SESSION['logged']);

    $level = null;

    if($logged) {
      $data = (new UserController())->readById($_SESSION['id']);
      $level = $data['level'];
      
      if($level > 1) {
        return true;
      }

      $router->redirect("/");
      return false;
    }
    
    $router->redirect('/');
    return false;
  }
}