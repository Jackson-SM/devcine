<?php

namespace App\Core;

use App\Controllers\UserController;
use App\Models\User;
use CoffeeCode\Router\Router as RouterApp;

class Router {
  public function __construct($router) {
    $this->router = $router;
  }

  public function home($data) {

    $id = null;
    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
    }

    $params = [
      "title" => "Home",
      "user" => (new  UserController())->readById($id)
    ];

    $renderPath = null;

    if(!$id) {
      $renderPath = "templates/index/index.html";
    }else{
      $renderPath = "templates/home/index.html";
    }

    (new RouterController())->createTemplate($renderPath, $params);
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
    $user->setName($data['name']);
    $user->setPassword($data['password']);
    $user->hashTransformPassword($user->getPassword());
    $user->setImgProfile($_FILES['file']);

    $userController = new UserController();
    $userController->create($user);

    $this->router->redirect("/login");
  }

  public function logout($data){
    session_unset();
    session_destroy();
    $this->router->redirect("/");
  }
}