<?php
  session_start();
  require '../../database/db_connect.php';

  if(empty($_SESSION['logged'])){
    header('location: ../../');
  }

  $id = mysqli_escape_string($connect,$_POST['id']);

  $sql = "SELECT * FROM episodes WHERE serie = '$id'";
  $episodeSQL = mysqli_query($connect,$sql);
  $episode = mysqli_fetch_array($episodeSQL);

  $sql = "SELECT * FROM posts WHERE id = '$id'";
  $serieSQL = mysqli_query($connect,$sql);
  $serie = mysqli_fetch_array($serieSQL);

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
     <section class="serie">
       <div class="serie-start">
          <div class="serie-info">
            <h1 class="title"><?= $serie['title']; ?></h1>
            <h4 class="info-serie"><?= $serie['year']." | ".$serie['duration']." Temporadas | ".$serie['gender']; ?></h4>
            <p class="sinopse"><?= $serie['sinopse']; ?></p>
          </div>
          <div class="options-serie">
            <form action="" method="POST">
              <?php
              if($_SESSION['level'] == 2){
              ?>
                <a href="" id="btn-menu"><i class='bx bx-plus'></i></a>
                <div class="dropdown">
                  <button><a href="" class="add">Temporada +</a></button>
                  <button><a href="" class="add">Episódio +</a></button>
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
        while($count <= $serie['duration']){
       ?>
      <div class="season">
        <div class="title-season">
          <h1>Temporada: <?= $count ?></h1>
        </div>
        <div class="episodes">
          <div class="episode">
            <div class="card-img">
              <img src="/app/post/img/cape/stranger.jpg" alt="">
            </div>
            <div class="episode-info">
              <div class="title-episode">
                <a href="">Reproduzir <i class='bx bx-play-circle'></i></a>
                <span>1. Title Lorem</span>
              </div>
              <div class="info">
                <p>Maio 13 2022</p>
                <p>44 Min</p>
              </div>
              <div class="sinopse">
                <p><?= (strlen($ola > 200) ? substr($ola, 0,200)."..." : $ola) ?></p>
              </div>
            </div>
          </div>
          <div class="episode">
            <div class="card-img">
              <img src="/app/post/img/cape/stranger.jpg" alt="">
            </div>
            <div class="episode-info">
              <div class="title-episode">
                <a href="">Reproduzir <i class='bx bx-play-circle'></i></a>
                <span>1. Title Lorem</span>
              </div>
              <div class="info">
                <p>Maio 13 2022</p>
                <p>44 Min</p>
              </div>
              <div class="sinopse">
                <p><?= (strlen($ola > 200) ? substr($ola, 0,200)."..." : $ola) ?></p>
              </div>
            </div>
          </div>
          <div class="episode">
            <div class="card-img">
              <img src="/app/post/img/cape/stranger.jpg" alt="">
            </div>
            <div class="episode-info">
              <div class="title-episode">
                <a href="">Reproduzir <i class='bx bx-play-circle'></i></a>
                <span>1. Title Lorem</span>
              </div>
              <div class="info">
                <p>Maio 13 2022</p>
                <p>44 Min</p>
              </div>
              <div class="sinopse">
                <p><?= (strlen($ola > 200) ? substr($ola, 0,200)."..." : $ola) ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        $count++;
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