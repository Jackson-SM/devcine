<?php

namespace App\Core;

use App\Controllers\UserController;
use App\Models\User;

class Router {
  public function __construct($router) {
    $this->router = $router;
  }

  public function home($data) {
    (new RouterController())->createTemplate("templates/home/index.html", [
      "title" => "Home"
    ]);
  }

  public function login($data) {
    (new RouterController())->createTemplate("templates/login/index.html", [
      "title" => "Login",
      "error" => !empty($_COOKIE['error']),
      "url" => URL_LOCATION
    ]);
  }

  public function loginPost($data){
    echo var_dump($data);
  }

  public function register($data) {
    (new RouterController())->createTemplate("templates/register/index.html", [
      "title" => "Register",
      "error" => !empty($_COOKIE['error']),
      "url" => URL_LOCATION
    ]);
  }

  public function registerPost($data){
    $user = new User();
    $user->setEmail($data['email']);
    $user->setLogin($data['login']);
    $user->setName($data['name']);
    $user->setPassword($data['password']);
    $user->hashTransformPassword($user->getPassword());
    $user->setImgProfile($_FILES['file']);

    $userController = new UserController();
    $userController->create($user);
  }
}