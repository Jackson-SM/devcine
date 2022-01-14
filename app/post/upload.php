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
  if(empty($_POST['title']) or empty($_POST['sinopse']) or empty($_POST['gender']) or empty($_POST['year']) or empty($_POST['duration']) or empty($_POST['img'])
  or empty($_POST['type'])){
    echo 'Preencha todos os campos';
  }else{
    $title = mysqli_escape_string($connect,$_POST['title']);
    $sinopse = mysqli_escape_string($connect, $_POST['sinopse']);
    $gender = mysqli_escape_string($connect,$_POST['gender']);
    $year = mysqli_escape_string($connect, $_POST['year']);
    $duration = mysqli_escape_string($connect, $_POST['duration']);
    $img = mysqli_escape_string($connect, $_POST['file']);
    $type = mysqli_escape_string($connect, $_POST['type']);
    $sql = "INSERT INTO posts (title,sinopse,gender,year,duration,img,type) VALUES ('$title','$sinopse','$gender','$year','$duration','$img','$type')";
  }
}


?>