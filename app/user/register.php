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
  if(empty($_POST['login']) or empty($_POST['password']) or empty($_POST['name']) or empty($_POST['email'])){
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
          $extension = pathinfo($_FILES['file']['name']);
          $formats = ["png","jpeg","jpg"];
          if(empty($_POST['file'])){
            $sql = "INSERT INTO usuarios (login,password,name,email,img_profile,level) VALUES ('$login', '$password', '$name','$email','unknown', 1)";
            $register = mysqli_query($connect, $sql);
          }else{
            $newName = uniqid().".$extension";
            $sql = "INSERT INTO usuarios (login,password,name,email,img_profile,level) VALUES ('$login', '$password', '$name','$email','$newName', 1)";
            $register = mysqli_query($connect, $sql);
          }
          if($GLOBALS['register']){
            $sql = "SELECT * FROM usuarios WHERE login = '$login'";
            $result = mysqli_query($connect, $sql);
            $data = mysqli_fetch_array($result);
            
            if(in_array($extension['extension'],$formats)){
              $path = "img/$data[id]/";
              $dir = is_dir($path);
              if(!$dir){
                mkdir($path);
              }
              $tmpName = $_FILES['file']['tmp_name'];
              $newName = uniqid().".$extension[extension]";
              if(move_uploaded_file($tmpName, $path.$newName)){
                echo 'Arquivo movido com sucesso';
              }else{
                echo 'A operação falhou';
              }
            }

            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $data['id'];
            $_SESSION['level'] = $data['level'];
            header('location: ../../');
          }else{
            echo 'Falha no registro';
          }
        }
      }
    }
  }

  /*
  
  */
?>