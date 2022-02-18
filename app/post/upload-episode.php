<?php
require '../../database/db_connect.php';

if(isset($_POST['btn-upload'])){
  $title = mysqli_escape_string($connect, $_POST['title']);
  $episode_number = mysqli_escape_string($connect, $_POST['episode_number']);
  $sinopse = mysqli_escape_string($connect, $_POST['sinopse']);
  $file = $_FILES['file'];
  $season_id = $_POST['season'];

  $sql = "SELECT * FROM episodes WHERE season_id = '$season_id' AND episode_number = '$episode_number'";
  $result = mysqli_query($connect, $sql);

  if(mysqli_num_rows($result) > 0){
    echo "Existe";
  }else{
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = uniqid().".$extension";

    $sql = "INSERT INTO episodes (episode_number,season_id,title,sinopse,img_cover) VALUES ('$episode_number','$season_id','$title','$sinopse', '$newName')";
    $result = mysqli_query($connect,$sql);

    $sql = "SELECT * FROM episodes WHERE episode_number = '$episode_number' AND season_id = '$season_id'";
    $result = mysqli_query($connect,$sql);
    $data = mysqli_fetch_array($result);

    $path = "img/seasons_episodes/$season_id/$data[id]/";

    if($result){
      if(!file_exists($path)){
        mkdir($path,0777,true);
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