<?php
  require_once 'database/db_connect.php';

  session_start();
  if(!isset($_SESSION['logged'])){
    echo 'Não logado';
  }else{
    echo 'logado';
  }
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Css-->
  <link rel="stylesheet" href="public/css/index/navbar.css">
  <link rel="stylesheet" href="public/css/global.css">
  <link rel="stylesheet" href="public/css/index/main.css">
  <link rel="stylesheet" href="public/css/index/apresentation.css">
  <!--Dependencies-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <title>DevCine</title>
</head>

<body>
  <nav class="navbar">
    <div>
      <h1>Dev-Cine</h1>
    </div>
    <ul class="category">
      <li><a href="">Filmes</a></li>
      <li><a href="">Séries</a></li>
      <li><a href="">Categorias</a></li>
      <li><a href="">Loja</a></li>
    </ul>
    <ul class="user">
      <div class="search-container">
        <input type="checkbox" name="show-search" id="show-search">
        <label for="show-search"><i class="fas fa-search"></i></label>
        <input type="search" placeholder="Pesquise aqui" name="search" id="search">
      </div>
      <li><a href="pages/login.html" class="btn-login">Entrar</a></li>
      <li><a href="pages/register.html" class="btn-register">Registrar</a></li>
    </ul>
  </nav>
  <section class="apresentation">
    <img src="public/img/sections/apresentation/films.jpg" alt="">
  </section>
  <section class="main">
    <section class="films">
      <h1>Filmes</h1>
      <div class="container">
        <a href="" class="card-link">
          <div class="card">
            <div>
              <img src="public/img/sections/main/films/loki.jpg">
            </div>
            <h1>Loki</h1>
          </div>
        </a>
      </div>
    </section>
    <section class="series">
      <div class="division"></div>
      <h1>Séries</h1>
      <div class="container">
        <a href="" class="card-link">
          <div class="card">
            <div>
              <img src="public/img/sections/main/films/loki.jpg">
            </div>
            <h1>Loki</h1>
          </div>
        </a>
        <a href="" class="card-link">
          <div class="card">
            <div>
              <img src="public/img/sections/main/films/loki.jpg">
            </div>
            <h1>Loki</h1>
          </div>
        </a>
        <a href="" class="card-link">
          <div class="card">
            <div>
              <img src="public/img/sections/main/films/loki.jpg">
            </div>
            <h1>Loki</h1>
          </div>
        </a>
        <a href="" class="card-link">
          <div class="card">
            <div>
              <img src="public/img/sections/main/films/loki.jpg">
            </div>
            <h1>Loki</h1>
          </div>
        </a>
        <a href="" class="card-link">
          <div class="card">
            <div>
              <img src="public/img/sections/main/films/loki.jpg">
            </div>
            <h1>Loki</h1>
          </div>
        </a>
      </div>
    </section>
  </section>
</body>

</html>