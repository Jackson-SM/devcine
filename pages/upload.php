<?php
session_start();
if($_SESSION['logged']){
  if(!($_SESSION['level'] ==  2)){
    header('location: ../');
  }
}else{
  header('location: login');
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
  <title>Upload</title>
</head>

<body>
  <div class="container">
    <div class="center">
      <h1>Upload Mega-Cine</h1>
      <form action="../app/post/upload" method="POST" enctype="multipart/form-data">
        <div class="input_content">
          <input type="text" name="title" required>
          <label for="title" id="label-effect"><i class="material-icons">create</i>Título</label>
        </div>
        <div class=" input_content">
          <input type="text" name="title" required>
          <label for="gender" id="label-effect"><i class="material-icons">info</i>Gênero</label>
        </div>
        <div class="input_content">
          <input type="number" name="title" required>
          <label for="year" id="label-effect"><i class="material-icons">event</i>Ano</label>
        </div>
        <div class="input_content">
          <input type="text" name="duration" required>
          <label for="duration" id="label-effect"><i class="material-icons">alarm</i>Duração / Temporadas</label>
        </div>
        <div class="input_content">
          <select name="type" id="type">
            <option value="film" name="film">Filme</option>
            <option value="serie" name="serie">Série</option>
          </select>
        </div>
        <div class="input_content">
          <textarea name="sinopse" id="sinopse" cols="40" rows="15" required></textarea>
          <label for="sinopse"><i class="material-icons">message</i>Sinopse</label>
        </div>
        <div class="input_content file">
          <label for="file" class="cover"><i class='bx bxs-save'></i>Enviar arquivo</label>
          <span class="archive-name" id="archiveName"></span>
          <input type="file" name="file" id="file">
        </div>
        <button type="submit" class="btn-upload" name="btn-upload"><i class='bx bxs-cloud-upload'></i>Upload</button>
      </form>
    </div>
  </div>
  <script src="../public/js/archiveName.js"></script>
</body>

</html>