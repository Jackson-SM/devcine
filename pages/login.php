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
  <link rel="stylesheet" href="../public/css/user/login-register.css">
  <link rel="stylesheet" href="../public/css/user/login.css">
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="center">
      <div>
        <h1>Register</h1>
        <h2>Log in to your account</h2>
      </div>
      <form action="../app/user/login" method="POST" autocomplete="off">
        <div class="input_content">
          <input type="text" name="login" required>
          <span></span>
          <label for="login">Login</label>
        </div>
        <div class="input_content">
          <input type="password" name="password" required>
          <span></span>
          <label for="password">Password</label>
        </div>
        <button type="submit" name="btn-invite">Enviar</button>
        <div class="links">
          <span>Forgot your<a href="">Password</a></span>
          <span>Don't have an account?<a href="register">Sign In</a></span>
        </div>
      </form>
    </div>
  </div>
</body>

</html>