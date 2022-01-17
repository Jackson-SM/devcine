<?php
  session_start();
  if(!empty($_SESSION['logged'])){
    header('location: ../../');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/user/register.css">
  <link rel="stylesheet" href="../public/css/global.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>Register</title>
</head>

<body>
  <div class="container">
    <div class="center">
      <div class="title">
        <h1>Register</h1>
        <i class='bx bx-user-plus'></i>
      </div>
      <form action="../app/user/register.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="input_content">
          <input type="text" name="login" required>
          <label for="login">Login</label>
        </div>
        <div class="input_content">
          <input type="password" name="password" required>
          <label for="password">Password</label>
        </div>
        <div class="input_content">
          <input type="text" name="name" required>
          <label for="name">Name</label>
        </div>
        <div class="input_content">
          <input type="email" name="email" required>
          <label for="email">Email</label>
        </div>
        <div class="input_file">
          <input type="file" name="file" id="file" accept="image/*">
          <label for="file">Arquivo</label>
        </div>
        <button type="submit" name="btn-register">Enviar</button>
        <div class="links">
          <span>Don't have an account? <a href="login">Sign-up</a></span>
        </div>
      </form>
    </div>
  </div>
</body>

</html>