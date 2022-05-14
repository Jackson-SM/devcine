<?php

namespace App\Core;

use App\Auth\AuthLogin;
use App\Controllers\DashboardController;
use App\Controllers\UserController;
use App\Controllers\VideoController;
use App\Models\User;
use App\Models\Video;
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

    $params = null;

    $renderPath = null;

    if(!$id) {
      $renderPath = "templates/index/index.html";
      $params = [
        "title" => "Index"
      ];
    }else{
      $renderPath = "templates/home/index.html";
      $params = [
        "title" => "Home",
        "user" => (new  UserController())->readById($id),
        "films" => (new VideoController())->readByFilms(),
        "series" => (new VideoController())->readBySeries()
      ];
    }

    (new RouterController())->createTemplate($renderPath, $params);
  }

  public function login($data) {
    (new RouterController())->createTemplate("templates/login/index.html", [
      "title" => "Login",
      "error" => !empty($_COOKIE['error']),
    ]);
  }

  public function loginPost($data){
    $user = new User();
    
    $user->setEmail($data['email']);
    $user->setPassword($data['password']);

    $authLogin = new AuthLogin();
    $authLogin->login($user);

    var_dump($_SESSION);
  }

  public function register($data) {
    (new RouterController())->createTemplate("templates/register/index.html", [
      "title" => "Register",
      "error" => !empty($_COOKIE['error']),
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

  public function panel($data) {

    $id = null;
    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
    }

    (new RouterController())->createTemplate("templates/panel/index.html", [
      "title" => "Painel",
      "user" => (new  UserController())->readById($id),
      "cards" => [
        [
          "title" => "Usuários",
          "value" => (new DashboardController())->readByNumbersUsers(),
          "last_month" => "46",
          "icon" => "bx bxs-user-account",
        ],
        [
          "title" => "Filmes",
          "value" => (new DashboardController())->readByFilms(),
          "last_month" => "6",
          "icon" => "bx bxs-video",
        ],
        [
          "title" => "Séries",
          "value" => (new DashboardController())->readBySeries(),
          "last_month" => "5",
          "icon" => "bx bxs-videos",
        ]
        ],
        "mini_cards" => [
          [
            "title" => "Purchases",
            "value" => "5029",
            "last_month" => "143",
            "icon" => "bx bxs-shopping-bags",
          ],
          [
            "title" => "Logged Now",
            "value" => "1203",
            "last_month" => "2592",
            "icon" => "bx bxs-user-plus",
          ],
          [
            "title" => "Likes",
            "value" => "8192",
            "last_month" => "304",
            "icon" => "bx bxs-heart",
          ]
        ]
    ]);
  }

  
  public function upload($data) {
    (new RouterController())->createTemplate("templates/upload/index.html", [
      "title" => "Upload"
    ]);
  }

  public function uploadVideo($data){
    (new RouterController())->createTemplate("templates/upload_video/index.html");
  }
  public function uploadVideoPost($data){

    $video = new Video();

    $video->setTitle($data['title']);
    $video->setSinopse($data['sinopse']);
    $video->setDuration($data['duration']);
    $video->setType($data['type']);
    $video->setYear($data['year']);
    $video->setImgCover($_FILES['file']);
    $video->setGender($data['gender']);

    (new VideoController())->create($video);
  }

  public function uploadSeason($data) {
    (new RouterController())->createTemplate("templates/upload_season/index.html");
  }

  public function uploadEpisode($data) {
    (new RouterController())->createTemplate("templates/upload_episode/index.html");
  }
}