<?php
  session_start();
  require '../../database/db_connect.php';

  if(empty($_SESSION['logged'])){
    header('location: ../../');
  }

  $id = mysqli_escape_string($connect,$_POST['id']);

  $sql = "SELECT * FROM seasons WHERE id_serie = '$id'";
  $seasonSQL = mysqli_query($connect,$sql);
  $seasonInfo = mysqli_fetch_array($seasonSQL);
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
   <main>
     <section class="serie" style="
     background: linear-gradient(to right,rgb(0, 0, 0),rgba(0, 0, 0, 0.926),rgba(0, 0, 0, 0.782),rgba(0, 0, 0, 0.300),rgba(0, 0, 0, 0.467),rgba(0, 0, 0, 0.289),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097)),linear-gradient(to top,rgb(0, 0, 0),rgba(0, 0, 0, 0.602),rgba(0, 0, 0, 0.400),rgba(0, 0, 0, 0.165),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0.097),rgba(0, 0, 0, 0),rgba(0, 0, 0, 0)),url(/app/post/img/seasons_episodes/<?= $seasonInfo['id']?>/<?= $seasonInfo['img_background']?>);
     background-repeat: no-repeat;
     background-size: cover;
     background-position: center;
     ">
       <div class="serie-start">
          <div class="serie-info">
            <h1 class="title"><?= $serie['title']; ?></h1>
            <h4 class="info-serie"><?= $serie['year']." | ".$serie['duration']." Temporadas | ".$serie['gender']; ?></h4>
            <p class="sinopse"><?= $serie['sinopse']; ?></p>
          </div>
        </div>
     </section>
     <section class="seasons">
     
     </section>
     <section class="recommendations">
        <div class="card-recommendation">
          <img src="/public/img/wrapper/films1.jpg" alt="">
        </div>
        <div class="card-recommendation">
          <img src="/public/img/wrapper/transformers.jpg" alt="">
        </div>
        <div class="card-recommendation">
          <img src="/public/img/wrapper/avengers.jpg" alt="">
        </div>
        <div class="card-recommendation">
          <img src="/public/img/wrapper/moana.jpg" alt="">
        </div>
        <div class="card-recommendation">
          <img src="/public/img/wrapper/moana.jpg" alt="">
        </div>
     </section>
   </main>

   <footer>

   </footer>
  <!-- 
    <div class="player">
    <i class='bx bxs-caret-right-circle'></i>
  </div>
  -->
  <script src="/public/js/series/dropdown.js"></script>
</body>
</html>