<?php

$servername = 'localhost:3307';
$user = 'root';
$password = '';
$db_name = 'devcine';

$connect = mysqli_connect($servername, $user, $password, $db_name);
if(mysqli_connect_error()){
  echo 'Ocorreu um erro';
}