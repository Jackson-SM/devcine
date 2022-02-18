<?php
session_start();
require '../database/db_connect.php';

if($_SESSION['logged']){
  if(!($_SESSION['level'] ==  2)){
    header('location: ../');
  }
}else{
  header('location: login');
}

$id_serie = $_POST['id_serie'];
$sql = "SELECT * FROM seasons WHERE id_serie = '$id_serie'";
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) < 1){
  header('location: /');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/upload/upload.css">
  <link rel="stylesheet" href="../public/css/global.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>Upload Episode</title>
</head>

<body>
  <div class="container">
    <div class="center">
      <h1>Episode Upload</h1>
      <form action="../app/post/upload-episode.php" method="POST" enctype="multipart/form-data" autocomplete="off">

        <div class="input_content" id="title">
          <input type="text" name="title" required>
          <label for="title" id="label-effect"><i class='bx bxs-info-circle'></i>Título</label>
          <span></span>
        </div>

        <div class="input_content" id="episode_number">
          <input type="text" name="episode_number" required>
          <label for="episode_number" id="label-effect"><i class='bx bxs-comment-edit'></i>Número do episódio</label>
          <?php
          if(isset($_COOKIE['error'])){
          ?>
          <span>
            <?= $_COOKIE['error'] ?>
          </span>
          <?php
            }else if(isset($_COOKIE['sucess'])){
              ?>
              <span>
                <?= $_COOKIE['sucess'] ?>
              </span>
              <?php
            }
          ?>
          <span></span>
        </div>
        <div class="input_content textarea" id="sinopse-div">
          <textarea name="sinopse" id="sinopse" cols="50" rows="15" required></textarea>
          <label for="sinopse"><i class='bx bxs-message-detail'></i>Sinopse</label>
        </div>
        <div class="input_content select">
          <select name="season" id="season">
            <?php
              while($season = mysqli_fetch_assoc($result)){
            ?>
              <option value="<?= $season['id']; ?>"><?= $season['season_number']; ?> Temporada</option>
            <?php
              }
            ?>
          </select>
        </div>
        <div class="input_file" id="file-div">
          <input type="file" name="file" id="file">
          <label for="file" class="cover">
            <i class='bx bxs-file-image'></i>
            Enviar arquivo
          </label>
          <span class="archive-name" id="archiveName"></span>
        </div>
        <button type="submit" class="btn-upload" name="btn-upload"><i class='bx bxs-cloud-upload'></i>Upload</button>
      </form>
    </div>
  </div>
  <script src="../public/js/archiveName.js"></script>
</body>

</html>