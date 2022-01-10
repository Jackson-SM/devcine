<?php
require '../../database/db_connect.php';
$login = mysqli_escape_string($connect, $_POST['login']);
$password = mysqli_escape_string($connect, $_POST['password']);
$erros = [];

if(empty($login) or empty($password)){
  $erros[] = 'Preencha todos os campos corretamente';
}else{
  $sql = "SELECT login FROM usuarios WHERE login = '$login'";
  $result = mysqli_query($connect, $sql);
  if(mysqli_num_rows($result) > 0 ){
    $password = md5($password);
    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND password = '$password'";
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) == 1){
      $data = mysqli_fetch_array($result);
      $_SESSION['logged'] = true;
      $_SESSION['id_user'] = $data['id'];
      if($data['level']== 2){
        echo "Nível de acesso Comum level: $data[level]"; 
      }else{
        echo "Nível de acesso Moderador level: $data[level]";
      }
    }
  }else {
    echo 'Nenhum resultado encontrado';
  }
}