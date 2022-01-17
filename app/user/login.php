<?php
include '../../database/db_connect.php';
session_start();
if($_SESSION['logged']){
  header('location: ../../');
}

if(isset($_POST['btn-invite'])){
  $login = mysqli_escape_string($connect, $_POST['login']);
  $password = $_POST['password'];

  if(empty($login) or empty($password)){
    $erros[] = 'Preencha todos os campos corretamente';
  }else{
    $sql = "SELECT * FROM usuarios WHERE login = '$login'";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($result);
    if(password_verify($password,$data['password'])){
      $_SESSION['logged'] = true;
      $_SESSION['id_user'] = $data['id'];
      $_SESSION['level'] = $data['level'];
    }else{
      echo 'senha incorreta';
    }
    header('location: ../../');
  }
}else{
  header('location: ../../pages/login.html');
}