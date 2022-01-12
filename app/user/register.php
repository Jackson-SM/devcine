<?php
  require '../../database/db_connect.php';

  session_start();
  if($_SESSION['logged']){
    header('location: ../../');
  }

  if(isset($_POST['btn-register'])){
    $login = mysqli_escape_string($connect,$_POST['login']);
    $password = mysqli_escape_string($connect,$_POST['password']);
    $name = mysqli_escape_string($connect,$_POST['name']);
    $email = mysqli_escape_string($connect,$_POST['email']);
    $loginExists = "SELECT login FROM usuarios WHERE login = '$login'";
    $erros = [];
  if(empty($_POST['login'] or empty($_POST['password']) or empty($_POST['name']) or empty($_POST['email']))){
      echo 'Preencha todos os campos';
    }else {
      $result = mysqli_query($connect, $loginExists);
      if(mysqli_num_rows($result) > 0) {
        echo 'Conta já existente';
      }else {
        $emailExistis = "SELECT email FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($connect, $emailExistis);
        if(mysqli_num_rows($result)){
          echo 'Email já existente';
        }else {
          $password = md5($password);
          $sql = "INSERT INTO usuarios (login,password,name,email,level) VALUES ('$login', '$password', '$name', '$email', 1)";
          $register = mysqli_query($connect, $sql);
          if($register){
            $sql = "SELECT * FROM usuarios WHERE login = '$login'";
            $result = mysqli_query($connect, $sql);
            $data = mysqli_fetch_array($result);
            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $data['id'];
            header('location: ../../');
          }else{
            echo 'Falha no registro';
          }
        }
      }
    }
  }
?>