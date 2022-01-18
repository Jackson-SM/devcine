<?php
  include 'database/db_connect.php';
  session_start();
  
  if(!$_SESSION['logged']){
      header('location: pages/login');
  }
  
  $user = "SELECT * FROM usuarios WHERE id = '$_SESSION[id_user]'";
  $result = mysqli_query($connect, $user);

  $data = mysqli_fetch_array($result);
  if($data == null){
    $_SESSION['logged'] = false;
    header('location: pages/login');
  }

  $postQueryFilm = "SELECT * FROM posts WHERE type = 'film'";
  $postQuerySerie = "SELECT * FROM posts WHERE type = 'serie'";

  $resultfilm = mysqli_query($connect, $postQueryFilm);
  $resultserie = mysqli_query($connect, $postQuerySerie);
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
    <div class="logo">
    <i class='bx bx-cube'></i>
    <h1>Mega-Cine</h1>
    </div>
    <div class="nav">
    <input type="checkbox" name="checkbox" id="check">
      <label for="check">
        <i class='bx bx-menu-alt-right' id="btn"></i>
        <i class='bx bx-x' id="close"></i>
      </label>
      <div class="navbar-responsive">
        <ul class="category">
          <li><a href="#films">Filmes</a></li>
          <li><a href="#series">Séries</a></li>
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
                <label for="search" id="label-search">Ex: Homem de Ferro</label>
              </div>
            </div>
          </div>
          <li class="menu">
            <div class="photo-user">
              <?php
                if($data['img_profile'] == 'unknown'){
                  ?>
                    <i class='bx bxs-user'></i>
                  <?php
                }else{
                  ?>
                  <img src="app/user/img/<?= $data['id'] ?>/<?=$data['img_profile']?>" alt="">
                  <?php
                }
              ?>
            </div>
            <a href="" class="btn-menu"><?= $data['name']?><i class='bx bxs-chevron-up'></i></a>
            <div class="submenu">
              <ul class="menu-options-account">
                <?php
                if($_SESSION['level'] == 2){
                ?>
                <li><a href="pages/upload"><i class='bx bxs-cloud-upload'></i>Upload</a></li>
                <?php
                }
                ?>
                <li><a href=""><i class='bx bxs-customize'></i>Settings</a></li>
                <li><a href="app/user/logout.php"><i class='bx bxs-exit'></i>Logout</a></li>
                <li><a href=""><i class='bx bx-star'></i>Favorites</a></li>
                <li><a href=""><i class='bx bxs-help-circle'></i>Help</a></li>
                <li><a href=""><i class='bx bxs-user-detail'></i>Profile</a></li>
              </ul>
          </div>
        </li>
      </ul>
      </div>
    </div>
  </nav>
  <section class="apresentation">
    <img src="public/img/sections/apresentation/films.jpg" alt="">
  </section>
  <section class="main">
    <section class="films" id="films">
      <h1>Filmes</h1>
      <div class="list-films-series">
            <?php
              while($posts = mysqli_fetch_assoc($resultfilm)){
            ?>
        <div class="container">
          <div class="card">
              <img src="app/post/img/<?= $posts['id'] ?>/<?=$posts['img']?>">
          </div>
          <div class="info">
            <h1><?= $posts['title']; ?></h1>
            <p><strong>Sinopse:</strong> <?= (strlen($posts['sinopse']) > 200) ? substr($posts['sinopse'], 0, 400)."..." : $posts['sinopse']; ?></p>
            <?php
              $genders = explode(',',$posts['gender']);
            ?>
            <p class="genders"><strong>Gênero: </strong>
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
              <div class="options-films">
                <a href="" class="btn-option"><i class='bx bx-dots-vertical'></i></a>
                <div class="dropdown">
                  <ul class="options">
                    <li><a href="" class="delete"><i class='bx bxs-trash-alt' ></i></a></li>
                    <li><a href="" class="edit"><i class='bx bxs-cog' ></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>
    </section>
    <section class="series" id="series">
      <h1>Séries</h1>
      <div class="list-films-series">
      <?php
              while($series = mysqli_fetch_assoc($resultserie)){
            ?>
        <div class="container">
          <div class="card">
            <a href="" class="img-link">
              <img src="app/post/img/<?= $series['id'];?>/<?=$series['img'];?>">
            </a>
          </div>
          <div class="info">
            <h1><?= $series['title']; ?></h1>
            <p><strong>Sinopse:</strong> <?= (strlen($series['sinopse']) > 100) ? substr($series['sinopse'], 0, 255)."..." : $series['sinopse']; ?></p>
            <?php
              $genders = explode(',',$series['gender']);
            ?>
            <p class="genders"><strong>Gênero: </strong>
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
              <?php
              if($_SESSION['level'] == 2){
              ?>
              <div class="options-films">
                <a href="" class="btn-option"><i class='bx bx-dots-vertical'></i></a>
                <div class="dropdown">
                  <ul class="options">
                    <li><a href="" class="delete"><i class='bx bxs-trash-alt' ></i></a></li>
                    <li><a href="" class="edit"><i class='bx bxs-cog' ></i></a></li>
                  </ul>
                </div>
              </div>
              <?php
              }
              ?>
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
  <script src="public/js/menu-film.js"></script>
</body>

</html>