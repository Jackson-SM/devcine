<?php
  session_start();
  require '../../database/db_connect.php';

  if(empty($_SESSION['logged'])){
    header('location: ../../');
  }

  $id = mysqli_escape_string($connect,$_POST['id']);

  $sql = "SELECT * FROM seasons WHERE id_serie = '$id'";
  $seasonSQL = mysqli_query($connect,$sql);
  if(mysqli_num_rows($seasonSQL) < 1){
    header('location: /');
  }

  $sql = "SELECT * FROM posts WHERE id = '$id'";
  $serieSQL = mysqli_query($connect,$sql);
  $serie = mysqli_fetch_assoc($serieSQL);

  $count = 1;

  $ola = "Em 6 de Novembro, 1983 na pequena cidade de Hawkins, Indiana, o garoto de 12 anos, Will Byers desaparece misteriosamente. A mãe de Will, Joyce, torna-se frenética e tenta encontrar Will enquanto o chefe de polícia Jim Hopper começa a investigar, e assim fazem também os amigos de Will: Dustin, Mike e Lucas.";

  //
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/series-films/serie.css">
  <link rel="stylesheet" href="/public/css/global.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?= $serie['title']; ?></title>
</head>
<body>
  <nav>
    <div>
      <h1>Mega-cine</h1>
    </div>
    <div class="options-theme">
      <label for="check">
        <i class='bx bxs-adjust-alt'></i>
      </label>
      <input type="checkbox" name="check" id="check" />
    </div>
  </nav>
   <main>
     <section class="serie" style="background: linear-gradient(to right,rgb(0, 0, 0),rgba(0, 0, 0, 0.926),rgba(0, 0, 0, 0.782),rgba(0, 0, 0, 0.300),rgba(0, 0, 0, 0.467),rgba(0, 0, 0, 0.289),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097)),linear-gradient(to top,rgb(0, 0, 0),rgba(0, 0, 0, 0.402),rgba(0, 0, 0, 0.700),rgba(0, 0, 0, 0.165),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)),url(/app/post/img/cape/stranger.jpg);
     background-repeat: no-repeat;
     background-size: cover;
     background-position: bottom;
     ">
       <div class="serie-start">
          <div class="serie-info">
            <h1 class="title"><?= $serie['title']; ?></h1>
            <h4 class="info-serie"><?= $serie['year']." | ".$serie['duration']." Temporadas | ".$serie['gender']; ?></h4>
            <p class="sinopse"><?= $serie['sinopse']; ?></p>
          </div>
          <div class="options-serie">
            <form action="/app/post/" method="POST">
              <?php
              if($_SESSION['level'] == 2){
              ?>
                <a href="" id="btn-menu"><i class='bx bx-plus'></i></a>
                <div class="dropdown">
                  <button type="submit" name="season"><a href="" class="add">Temporada +</a></button>
                  <button type="submit" name="episode"><a href="" class="add">Episódio +</a></button>
                </div>
              <?php
                }
              ?>
              <a href=""><i class='bx bx-star'></i></a>
              <a href=""><i class='bx bxs-download'></i></a>
            </form>
          </div>
        </div>
     </section>
     <section class="seasons">
     <?php
       while($season = mysqli_fetch_assoc($seasonSQL)){
      ?>
      <div class="season">
        <div class="title-season">
          <h1>Temporada: <?= $season['season_number']; ?></h1>
        </div>
        <div class="episodes">
          <?php

          $sql = "SELECT * FROM episodes WHERE season_id = $season[id]";
          $episodeSQL = mysqli_query($connect,$sql);
          while($episode = mysqli_fetch_assoc($episodeSQL)){
          ?>
          <div class="episode">
            <div class="card-img">
              <img src="/app/post/img/seasons_episodes/<?= $episode['season_id'].'/'.$episode['episode_number'].'/'.$episode['img_cover']; ?>" alt="">
            </div>
            <div class="episode-info">
              <div class="title-episode">
                <a href="">Reproduzir <i class='bx bx-play-circle'></i></a>
                <span><?= $episode['title']; ?></span>
              </div>
              <div class="info">
                <p>Maio 13 2022</p>
                <p>44 Min</p>
              </div>
              <div class="sinopse">
                <p><?= (strlen($episode['sinopse'] > 200) ? substr($episode['sinopse'], 0,200)."..." : $episode['sinopse']); ?></p>
              </div>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
      <?php
        }
      ?>
     </section>
   </main>
  <!-- 
    <div class="player">
    <i class='bx bxs-caret-right-circle'></i>
  </div>
  -->
  <script src="/public/js/series/dropdown.js"></script>
</body>
</html>