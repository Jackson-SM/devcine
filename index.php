<?php
  require_once 'database/db_connect.php';

  session_start();
  if(!isset($_SESSION['logged'])){
    header('location: pages/login.html');
  }

  $user = "SELECT * FROM usuarios WHERE id = '$_SESSION[id_user]'";
  $result = mysqli_query($connect, $user);
  $data = mysqli_fetch_array($result);

  $postQueryFilm = "SELECT * FROM posts WHERE type = 'film'";
  $postQuerySerie = "SELECT * FROM posts WHERE type = 'serie'";

  $resultfilm = mysqli_query($connect, $postQueryFilm);
  $resultserie = mysqli_query($connect, $postQuerySerie)
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
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
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
      <div>
        <div class="search-container">
          <div>
            <input type="checkbox" name="show-search" id="show-search">
            <label for="show-search"><i class="fas fa-search"></i></label>
            <input type="search" placeholder="Pesquise aqui" name="search" id="search">
          </div>
        </div>
      </div>
      <li class="menu">
        <a href="" class="btn-menu"><?= $data['name']?><i class='bx bxs-chevron-up'></i></a>
        <div class="submenu close">
          <ul>
            <li><a href="">Update Film</a></li>
          </ul>
        </div>
    </li>
    </ul>
  </nav>
  <section class="apresentation">
    <img src="public/img/sections/apresentation/films.jpg" alt="">
  </section>
  <section class="main">
    <section class="films">
      <h1>Filmes</h1>
      <div class="list-films-series">
            <?php
              while($posts = mysqli_fetch_assoc($resultfilm)){
            ?>
        <div class="container">
          <div class="card">
            <a href="" class="img-link">
              <img src="public/img/sections/main/films/<?= $posts['img'] ?>">
            </a>
          </div>
          <div class="info">
            <h1><?= $posts['title']; ?></h1>
            <p><strong>Sinopse:</strong> <?= (strlen($posts['sinopse']) > 100) ? substr($posts['sinopse'], 0, 255)."..." : $posts['sinopse']; ?></p>
            <?php
              $genders = explode(',',$posts['gender']);
            ?>
            <p><strong>Gênero: </strong>
            <?php
              foreach ($genders as $gender) {
            ?>
            <span class="gender"><?= $gender ?></span>
            <!--html-->
            <?php
              }
            ?>
            </p>
            <a href="" class="watch">Reproduzir<i class='bx bx-play'></i></a>
            <div class="info-film">
              <span><strong>Ano: </strong> <?= $posts['year']; ?></span>
              <span><strong>Duração: </strong> <?= $posts['duration']; ?></span>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </section>
    <section class="series">
      <h1>Séries</h1>
      <div class="list-films-series">
      <?php
              while($series = mysqli_fetch_assoc($resultserie)){
            ?>
        <div class="container">
          <div class="card">
            <a href="" class="img-link">
              <img src="public/img/sections/main/films/<?= $series['img'] ?>">
            </a>
          </div>
          <div class="info">
            <h1><?= $series['title']; ?></h1>
            <p><strong>Sinopse:</strong> <?= (strlen($series['sinopse']) > 100) ? substr($series['sinopse'], 0, 255)."..." : $series['sinopse']; ?></p>
            <?php
              $genders = explode(',',$series['gender']);
            ?>
            <p><strong>Gênero: </strong>
            <?php
              foreach ($genders as $gender) {
            ?>
            <span class="gender"><?= $gender ?></span>
            <!--html-->
            <?php
              }
            ?>
            </p>
            <a href="" class="watch">Reproduzir<i class='bx bx-play'></i></a>
            <div class="info-film">
              <span><strong>Ano: </strong> <?= $series['year']; ?></span>
              <span><strong>Temporadas: </strong> <?= $series['duration']; ?></span>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </section>
  </section>
  <script src="public/js/submenu.js"></script>
</body>

</html>