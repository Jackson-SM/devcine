<?php
session_start();
  if(!empty($_SESSION['logged'])){
    header('location: ../');  
  }
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
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>Login</title>
</head>
<body>
  <?php
    if(!empty($_COOKIE['error'])){
  ?>
  <div class="notification">
    <div class="title-notific">
      <i class='bx bxs-bell-ring'></i>
      <span>Notification</span>
      <a href="" class="exit-notific"><i class='bx bx-x'></i></a>
    </div>
    <p><?= $_COOKIE['error']; ?></p>
  </div>
  <?php
  }
  ?>
  <div class="container">
    <div class="center">
      <div>
        <div class="title">
        <i class='bx bx-cube'></i>
        <h1>Login</h1>
        </div>
        <h2>Log in to your account</h2>
      </div>
      <form action="../app/user/login" method="POST" autocomplete="off">
        <div class="input_content">
          <input type="text" name="login" required>
          <span></span>
          <label for="login">Username</label>
        </div>
        <div class="input_content">
          <input type="password" name="password" required>
          <span></span>
          <label for="password">Password</label>
        </div>
        <button type="submit" name="btn-invite">Login</button>
        <div class="links">
          <span>Forgot your <a href="">Password</a></span>
          <span>Don't have an account? <a href="register">Sign-In</a></span>
        </div>
      </form>
    </div>
  </div>
  <script src="../public/js/notification.js"></script>
</body>

</html>