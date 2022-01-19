<?php
  require '../../database/db_connect.php';

  session_start();
  if($_SESSION['logged']){
    header('location: ../../');
  }

  if(isset($_POST['btn-register'])){
    $login = mysqli_escape_string($connect,$_POST['login']);
    $password = $_POST['password'];
    $name = mysqli_escape_string($connect,$_POST['name']);
    $email = mysqli_escape_string($connect,$_POST['email']);
    $loginExists = "SELECT login FROM usuarios WHERE login = '$login'";
    $erros = [];
  if(empty($_POST['login']) or empty($_POST['password']) or empty($_POST['name']) or empty($_POST['email'])){
      
    }else {
      $result = mysqli_query($connect, $loginExists);
      if(mysqli_num_rows($result) > 0) {
        $error = 'Usuário já existente';
        setcookie("error", $error, time() + 2, '/', 'megacine.com',false);
        header('location: ../../pages/register');
      }else {
        $emailExistis = "SELECT email FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($connect, $emailExistis);
        if(mysqli_num_rows($result)){
          $error = 'Email já está registrado no site.';
          setcookie("error", $error, time() + 2, '/', 'megacine.com',false);
          header('location: ../../pages/register');
        }else {
          $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
          $formats = ["png","jpeg","jpg"];
          $newName = null;
          
          if($_FILES['file']['name'] == ""){
            $newName = 'unknown';
          }else{
            $newName = uniqid().".$extension";
          }

          $password_hash = password_hash($password,PASSWORD_BCRYPT);
          $sql = "INSERT INTO usuarios (login,password,name,email,img_profile,level) VALUES ('$login', '$password_hash', '$name','$email','$newName', 1)";
          $register = mysqli_query($connect, $sql);
          if($register){
            $sql = "SELECT * FROM usuarios WHERE login = '$login'";
            $result = mysqli_query($connect, $sql);
            $data = mysqli_fetch_array($result);
            
            if(in_array($extension,$formats)){
              $path = "img/$data[id]/";
              if(!is_dir($path)){
                mkdir($path);
              }
              $tmpName = $_FILES['file']['tmp_name'];
              if(move_uploaded_file($tmpName, $path.$newName)){
                
              }
            }else{
              $error = 'Não foi possível carregar a imagem.';
              setcookie("error", $error, time() + 2, '/', 'megacine.com',false);
              header('location: ../../pages/register');
            }

            $_SESSION['logged'] = true;
            $_SESSION['id_user'] = $data['id'];
            $_SESSION['level'] = $data['level'];
            header('location: ../../');
          }else{
            $error = 'Ocorreu um erro inesperado no registro.';
            setcookie("error", $error, time() + 2, '/', 'megacine.com',false);
            header('location: ../../pages/register');
          }
        }
      }
    }
  }else{
    header('location: ../../');
  }

  /*
  
  */
?>