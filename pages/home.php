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
          <li><a href="login" class="login">Entrar</a></li>
          <li><a href="register" class="register">Registrar</a></li>
        </ul>
      </div>
    </nav>
    <main>
      <article class="starter">
        <h1>Assista Filmes, séries de qualquer lugar.</h1>
        <section>
          <h2>Assista sem limites quando quiser.</h2>
          <h3>Assine por 29,99 por mês apenas. Com possibilidade de cancelamento.</h3>
          <a href="register">Criar Conta<i class='bx bxs-chevrons-right'></i></a>
        </section>
      </article>
      <article>
        <section class="apresentation">
          <div class="content-apresentation">
            <div class="title-apresentation">
              <h1>Lorem ipsum dolor sit amet, consectet</h1>
              <h2> lorem ipsum dolor sit am ea commodo content consectet dolor more</h2>
            </div>
            <div class="img-apresentation">
              <img src="../public/img/home/illustration1.svg" alt="">
            </div>
          </div>
        </section>
        <section class="apresentation">
          <div class="content-apresentation">
            <div class="title-apresentation">
              <h1>Lorem ipsum dolor sit amet, consectet</h1>
              <h2> lorem ipsum dolor sit am ea commodo content consectet dolor more</h2>
            </div>
            <div class="img-apresentation">
              <img src="../public/img/home/illustration2.svg" alt="">
            </div>
          </div>
        </section>
        <section class="apresentation">
          <div class="content-apresentation">
            <div class="title-apresentation">
              <h1>Lorem ipsum dolor sit amet, consectet</h1>
              <h2> lorem ipsum dolor sit am ea commodo content consectet dolor more</h2>
            </div>
            <div class="img-apresentation">
              <img src="../public/img/home/illustration1.svg" alt="">
            </div>
          </div>
        </section>
      </article>
      <footer>
        <div class="logo-footer">
        <i class='bx bx-cube-alt' ></i>
        <h2>Mega-Cine</h2>
        </div>
        <div class="links">
          <ul>
            <li><a href="">Perguntas</a></li>
            <li><a href="">Séries Originais</a></li>
            <li><a href="">Informações</a></li>
          </ul>
          <ul>
            <li><a href="">Centro de Ajuda</a></li>
            <li><a href="">Perguntas Frequentes</a></li>
          </ul>
          <ul>
            <li><a href="">Conta</a></li>
            <li><a href="">Privacidade</a></li>
            <li><a href="">Aleatorio</a></li>
          </ul>
          <ul>
            <li><a href="">Entre em contato</a></li>
          </ul>
        </div>
        <div class="infos">
          <div class="plataforms">
            <a href=""><i class='bx bxl-instagram-alt' ></i></a>
            <a href=""><i class='bx bxl-twitter'></i></a>
            <a href=""><i class='bx bxl-discord-alt' ></i></a>
          </div>
          <div class="contact">
            <span>Fale conosco: 0800-000-0000</span>
          </div>
        </div>
      </footer>
    </main>
</body>
</html>