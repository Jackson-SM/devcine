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

  //<?= (strlen($episode['title'] > 40) ? substr($episode['title'], 0,10)."..." : $episode['title'])
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
        <h1 class="title"><?= $serie['title']; ?></h1>
        <h4 class="info-serie"><?= $serie['year']." | ".$serie['duration']." Temporadas | ".$serie['gender']; ?></h4>
        <p class="sinopse"><?= $serie['sinopse']; ?></p>
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
        <div class="episodes-cards">
        <a href="" class="link-episode">
          <div class="episodes">
            <div class="card-episode">
              <div class="cover">
                <img src="/app/post/img/cape/stranger.jpg" alt="">
              </div>
              <div class="content-episode">
                <p>1. Capítulo um: O desaparecimento de Will Byers</p>
              </div>
            </div>
          </div>
          </a>
          <a href="" class="link-episode">
          <div class="episodes">
            <div class="card-episode">
              <div class="cover">
                <img src="/app/post/img/cape/stranger.jpg" alt="">
              </div>
              <div class="content-episode">
                <p>1. Capítulo um: O desaparecimento de Will Byers</p>
              </div>
            </div>
          </div>
          </a>
          <a href="" class="link-episode">
          <div class="episodes">
            <div class="card-episode">
              <div class="cover">
                <img src="/app/post/img/cape/stranger.jpg" alt="">
              </div>
              <div class="content-episode">
                <p>1. Capítulo um: O desaparecimento de Will Byers</p>
              </div>
            </div>
          </div>
          </a>
          <a href="" class="link-episode">
          <div class="episodes">
            <div class="card-episode">
              <div class="cover">
                <img src="/app/post/img/cape/stranger.jpg" alt="">
              </div>
              <div class="content-episode">
                <p>1. Capítulo um: O desaparecimento de Will Byers</p>
              </div>
            </div>
          </div>
          </a>
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
</body>
</html>