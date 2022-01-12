<?php
  require_once 'database/db_connect.php';

  session_start();
  if(!isset($_SESSION['logged'])){
    header('location: pages/login.html');
  }

  $sql = "SELECT * FROM usuarios WHERE id = '$_SESSION[id_user]'";
  $result = mysqli_query($connect, $sql);
  $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Css-->
  <link rel="stylesheet" href="public/css/index/navbar.css">
  <link rel="stylesheet" href="public/css/global.css">
  <link rel="stylesheet" href="public/css/index/main.css">
  <link rel="stylesheet" href="public/css/index/apresentation.css">
  <!--Dependencies-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <title>DevCine</title>
</head>

<body>
  <nav class="navbar">
    <div>
      <h1>Dev-Cine</h1>
    </div>
    <ul class="category">
      <li><a href="">Filmes</a></li>
      <li><a href="">Séries</a></li>
      <li><a href="">Categorias</a></li>
      <li><a href="">Loja</a></li>
    </ul>
    <ul class="user">
      <div>
        <div class="search-container">
          <div>
            <input type="checkbox" name="show-search" id="show-search">
            <label for="show-search"><i class="fas fa-search"></i></label>
            <input type="search" placeholder="Pesquise aqui" name="search" id="search">
          </div>
        </div>
      </div>
      <li><a href="pages/login.html" class="btn-login">Entrar</a></li>
      <li><a href="pages/register.html" class="btn-register">Registrar</a></li>
    </ul>
  </nav>
  <section class="apresentation">
    <img src="public/img/sections/apresentation/films.jpg" alt="">
  </section>
  <section class="main">
    <section class="films">
      <h1>Filmes</h1>
      <div class="list-films-series">
        <div class="container">
          <div class="card">
            <a href="" class="img-link">
              <img src="public/img/sections/main/films/mariaejoao.jpg">
            </a>
          </div>
          <div class="info">
            <h1>Maria e João: O Conto de Bruxas.</h1>
            <p><strong>Sinopse:</strong> Desta vez, as migalhas nos guiam por um caminho muito mais sombrio e
              perturbador.
              Durante um
              período de
              escassez, Maria e seu irmão mais novo, João, saem de casa e partem para a floresta em busca de comida e
              sobrevivência.</p>
            <p><strong>Gênero: </strong><span class="gender">Conto de Fadas</span>, <span class="gender">Literatura
                infantil</span> e
              <span class="gender">Ficção</span>
            </p>
            <a href="" class="watch">Assistir</a>
            <div class="info-film">
              <span><strong>Ano: </strong>2019</span>
              <span><strong>Duração: </strong>1h 31min</span>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="card">
            <a href="" class="img-link">
              <img src="public/img/sections/main/films/thor.jpg">
            </a>
          </div>
          <div class="info">
            <h1>Thor</h1>
            <p><strong>Sinopse:</strong>Como filho de Odin, rei dos deuses nórdicos, Thor logo herdará o trono de Asgard
              de seu idoso pai. Porém, no dia de sua coroação, Thor reage com brutalidade quando os inimigos dos deuses
              entram no palácio violando o tratado. Como punição, Odin manda Thor para a Terra. Enquanto seu irmão Loki
              conspira em Asgard, Thor, agora sem seus poderes, enfrenta sua maior ameaça.</p>
            <p><strong>Gênero: </strong><span class="gender">Ação</span> <span class="gender">Fantasia</span>
              <span class="gender">Aventura</span> <span class="gender">Ficção-Cientifica</span> <span
                class="gender">Super-Herói</span>
            </p>
            <a href="" class="watch">Assistir</a>
            <div class="info-film">
              <span><strong>Ano: </strong>2019</span>
              <span><strong>Duração: </strong>1h 31min</span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="series">
      <h1>Séries</h1>
      <div class="list-films-series">
        <div class="container">
          <div class="card">
            <a href="" class="img-link">
              <img src="public/img/sections/main/films/loki.jpg">
            </a>
          </div>
          <div class="info">
            <h1>Loki</h1>
            <p><strong>Sinopse:</strong> Loki, Deus da Trapaça, sai da sombra de seu irmão para embarcar em uma aventura
              que ocorre após os eventos de "Vingadores: Ultimato".</p>
            <p><strong>Gênero: </strong>Conto de Fadas, Literatura infantil e Ficção</p>
            <a href="" class="watch">Assistir</a>
            <div class="info-film">
              <span><strong>Ano: </strong>2021</span>
              <span><strong>Episodios: </strong>6</span>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</body>

</html>