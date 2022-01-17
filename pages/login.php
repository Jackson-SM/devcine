<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/global.css">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="center">
    <h1>Register</h1>
      <form action="../app/user/login" method="POST">
        <div class="input_content">
          <label for="login">Login</label>
          <input type="text" name="login">
        </div>
        <div class="input_content">
          <label for="password">Password</label>
          <input type="password" name="password">
        </div>
        <button type="submit" name="btn-invite">Enviar</button>
      </form>
    </div>
  </div>
</body>

</html>