<?php
  include 'database/db_connect.php';
  session_start();
  
  if(!$_SESSION['logged']){
      header('location: pages/home');
  }
  
  $user = "SELECT * FROM usuarios WHERE id = '$_SESSION[id_user]'";
  $result = mysqli_query($connect, $user);

  $data = mysqli_fetch_array($result);
  if($data == null){
    header('app/user/logout');
  }

  $postQueryFilm = "SELECT * FROM posts WHERE type = 'film'";
  $postQuerySerie = "SELECT * FROM posts WHERE type = 'serie'";

  $resultfilm = mysqli_query($connect, $postQueryFilm);
  $resultserie = mysqli_query($connect, $postQuerySerie);
  
  date_default_timezone_set('America/Sao_Paulo');
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
  <link rel="stylesheet" href="public/css/onload.css">
  <link rel="stylesheet" href="public/css/index/wrapper.css">
  <!--Dependencies-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>DevCine</title>
</head>

<body onLoad="loading()">
  <div class="load">
    <div class="pre">
    <i class='bx bx-loader-circle'></i>
    <h1>Carregando...</h1>
    </div>
  </div>
  <div class="content">
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
  <main class="main">
  <section class="apresentation">
    <div id="items-wrapper">
      <div class="btn-wrapper">
        <a href="" class="btn-wrapper-go"><i class='bx bx-last-page'></i></a>
        <a href="" class="btn-wrapper-back"><i class='bx bx-first-page' ></i></a>
      </div>
      <div class="menu-wrapper">
        <a href="" class="btn-menu-wrapper"><i class='bx bx-grid-alt'></i></a>
          <li style="--i:0;"><a href=""><i class='bx bxs-download'></i></a></li>
          <li style="--i:1;"><a href=""><i class='bx bxs-star'></i></a></li>
          <li style="--i:2;"><a href=""><i class='bx bxs-rocket'></i></a></li>
          <li style="--i:3;"><a href=""><i class='bx bxs-bell-ring'></i></a></li>
          <li style="--i:4;"><a href=""><i class='bx bxs-tv'></i></a></li>
          <li style="--i:5;"><a href=""><i class='bx bx-qr'></i></a></li>
          <li style="--i:6;"><a href=""><i class='bx bx-mobile'></i></a></li>
          <li style="--i:7;"><a href=""><i class='bx bxs-group'></i></a></li>
      </div>
      <div id="items">
        <div class="item"><img src="public/img/wrapper/films1.jpg" alt=""></div>
        <div class="item"><img src="public/img/wrapper/avengers.jpg" alt=""></div>
        <div class="item"><img src="public/img/wrapper/moana.jpg" alt=""></div>
        <div class="item"><img src="public/img/wrapper/star-wars.jpg" alt=""></div>
        <div class="item"><img src="public/img/wrapper/transformers.jpg" alt=""></div>
      </div>
    </div>
  </section>
    <section class="films" id="films">
      <h1>Filmes</h1>
      <div class="list-films-series">
            <?php
              while($posts = mysqli_fetch_assoc($resultfilm)){
                $datePost = $posts['date'];
                $currentDate = date('Y-m-d');
                $dateEnd = date('Y-m-d', strtotime('+2 days', strtotime($datePost)));
                if($currentDate < $dateEnd) {
                ?>
                  <div class="container new"> 
                <?php
                }else{
                  
                  ?>
                  <div class="container">
                  <?php
                }
            ?>
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
            <form action="pages/film/" method="POST">
              <button type="submit" class="watch">Reproduzir<i class='bx bx-play'></i></button>
              <input type="hidden" name="id" value="<?= $posts['id'] ?>">
            </form>
            <div class="info-film">
              <span><strong>Ano: </strong> <?= $posts['year']; ?></span>
              <span><strong>Duração: </strong> <?= $posts['duration']; ?></span>
              <div class="options-films">
                <a href="" class="btn-option"><i class='bx bx-dots-vertical'></i></a>
                <div class="dropdown">
                  <ul class="options">
                    <li><a href="" style="--i: 1;"><i class='bx bxs-trash-alt' ></i></a></li>
                    <li><a href="" style="--i: 2;"><i class='bx bxs-cog' ></i></a></>
                    <li><a href="" style="--i: 3;"><i class='bx bx-plus'></i></a></li>
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
                $dateSerie = $series['date'];
                $currentDate = date('Y-m-d');
                $dateEnd = date('Y-m-d', strtotime('+2 days', strtotime($dateSerie)));
                if($currentDate < $dateEnd) {
                ?>
                  <div class="container new"> 
                <?php
                }else{
                  
                  ?>
                  <div class="container">
                  <?php
                }
            ?>
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
            <form action="pages/serie/" method="POST">
              <button type="submit" class="watch">Reproduzir<i class='bx bx-play'></i></button>
              <input type="hidden" name="id" value="<?= $series['id'] ?>">
            </form>
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
                      <li class="option-li">
                        <button style="--i:0" class="button-open-dropdown">
                        <i class='bx bx-plus'></i>
                      </button>
                      <div class="dropdown-option">
                      <form action="pages/upload-season.php" method="POST">
                        <button type="submit" name="btn-upload-season">Temporada</button>
                        <input type="hidden" name="id_serie" value="<?= $series['id'] ?>">
                      </form>
                      <form action="pages/upload-episode.php" method="POST">
                        <button type="submit" name="btn-upload-episode">Episódio</button>
                        <input type="hidden" name="id_serie" value="<?= $series['id'] ?>">
                      </form>
                      </div>
                      </li>
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
  </main>
  </div>
  <script src="public/js/submenu.js"></script>
  <script src="public/js/menu-film.js"></script>
  <script src="public/js/wrapper/wrapper.js"></script>
  <script src="public/js/wrapper/btn-wrapper.js"></script>
  <script src="public/js/wrapper/menu-wrapper.js"></script>
  <script src="public/js/loading.js"></script>
  <script src="public/js/dropdown-option.js"></script>
</body>

</html>