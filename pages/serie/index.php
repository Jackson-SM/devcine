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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/public/css/film-serie/serie.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title><?= $serie['title']; ?></title>
</head>
<body>
  
  <!-- 
    <div class="player">
    <i class='bx bxs-caret-right-circle'></i>
  </div>
  -->
</body>
</html>