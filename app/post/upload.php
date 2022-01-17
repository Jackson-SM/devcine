<?php
require '../../database/db_connect.php';
session_start();
if($_SESSION['logged']){
  if(!($_SESSION['level'] ==  2)){
    header('location: ../../');
  }
}else{
  header('location: ../../pages/login');
}

if(isset($_POST['btn-upload'])){
  if(empty($_POST['title']) or empty($_POST['sinopse']) or empty($_POST['gender']) or empty($_POST['year']) or empty($_POST['duration'])
  or empty($_POST['type'])){
      $error = 'Preencha todos os campos';
      setcookie('error', $error, time()+2,'/','megacine.com', false);
      header('location: ../../pages/upload');
  }else{
    $title = mysqli_escape_string($connect,$_POST['title']);
    $sinopse = mysqli_escape_string($connect, $_POST['sinopse']);
    $gender = mysqli_escape_string($connect,$_POST['gender']);
    $year = mysqli_escape_string($connect, $_POST['year']);
    $duration = mysqli_escape_string($connect, $_POST['duration']);
    $img = $_FILES['file'];
    $type = mysqli_escape_string($connect, $_POST['type']);

    $sql = "SELECT title FROM posts WHERE title = '$title'";
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) > 0){
      $error = 'Título já existente';
      setcookie('error', $error, time()+2,'/','megacine.com', false);
      header('location: ../../pages/upload');
    }else{
      $img = $_FILES['file'];
      $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
      $newName = uniqid().".$extension";
      $sql = "INSERT INTO posts (title,sinopse,gender,year,duration,img,type) VALUES ('$title','$sinopse','$gender','$year','$duration','$newName','$type')";
      $result = mysqli_query($connect,$sql);

      $sql = "SELECT * FROM posts WHERE title = '$title' AND type = '$type'";
      $result = mysqli_query($connect, $sql);
      $dataFilm = mysqli_fetch_array($result);
      $path = "img/$dataFilm[id]/";

      if(!is_dir($path)){
        mkdir($path);
      }
      if(move_uploaded_file($img['tmp_name'], $path.$newName)){
       header('location: ../../');
      }
      /*
      $result = mysqli_query($connect,$sql);
      $sucess = 'Upload feito com sucesso.';
      setcookie('sucess', $sucess, time()+2,'/','megacine.com', false);
      header('location: ../../pages/upload');
      */
    }
  }
}


?>