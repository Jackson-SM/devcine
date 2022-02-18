<?php
session_start();
require '../../database/db_connect.php';

if(isset($_POST['btn-upload'])){
  $season_number = mysqli_escape_string($connect, $_POST['season_number']);
  $sinopse = mysqli_escape_string($connect, $_POST['sinopse']);
  $file = $_FILES['file'];
  $id_serie = $_POST['id_serie'];

  $sql = "SELECT * FROM seasons WHERE id_serie = '$id_serie' AND season_number = '$season_number'";
  $result = mysqli_query($connect, $sql);
  
  if(mysqli_num_rows($result) > 0){
    echo "Existe";
  }else{
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = uniqid().".$extension";

    $sql = "INSERT INTO seasons (season_number,sinopse,img_background,id_serie) VALUES ('$season_number','$sinopse','$newName','$id_serie')";
    $result = mysqli_query($connect,$sql);

    $sql = "SELECT * FROM seasons WHERE season_number = '$season_number' AND id_serie = '$id_serie'";
    $result = mysqli_query($connect,$sql);
    
    $data = mysqli_fetch_array($result);
    $path = "img/seasons_episodes/$data[id]/";

    if($result){
      if(!file_exists($path)){
        mkdir($path, 0777, true);
      }
  
      if(move_uploaded_file($file['tmp_name'],$path.$newName)){
        header('location: /');
      }
    }else{
      header('location: /');
    }
  }
}


?>