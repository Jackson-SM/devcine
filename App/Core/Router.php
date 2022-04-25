<?php

namespace App\Core;

class Router {
  public function __construct($router) {
    $this->router = $router;
  }

  public function home($data) {
    (new RouterController())->createTemplate("templates/home/home.html", [
      "title" => "Home"
    ]);
  }
}