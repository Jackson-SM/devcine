<?php
  session_start();
  if($_SESSION['logged']){
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
  <link rel="stylesheet" href="../public/css/home/navbar.css">
  <link rel="stylesheet" href="../public/css/home/sections.css">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>Home</title>
</head>
<body>
  <nav class="navbar">
    <div class="logo">
      <i class='bx bx-cube'></i>
      <h1>Mega-Cine</h1>
    </div>
    <div class="menu">
      <input type="checkbox" name="checkbox" id="open">
      <label for="open" class="btn-menu"><i class='bx bx-menu'></i></label>
      <ul class="submenu">
        <div class="title-submenu">
          <label for="open" class="btn-close"><i class='bx bx-x'></i></label>
          <h2>Menu</h2>
        </div>
        <li><a href="" class="login">Entrar</a></li>
        <li><a href="" class="register">Registrar</a></li>
      </ul>
    </div>
  </nav>
  <main>
    <article class="starter">
      <h1>Assista Filmes, séries de qualquer lugar.</h1>
      <section>
        <h2>Assista sem limites quando quiser.</h2>
        <h3>Vamos assistir?</h3>
        <a href="">Entrar Agora</a>
      </section>
    </article>
    <article>
      <section>
        <h2>Titlle</h2>
      </section>
      <section>
        <h2>Titlle</h2>
      </section>
      <section>
        <h2>Titlle</h2>
      </section>
    </article>
    <footer>
    </footer>
  </main>
</body>
</html>