<?php

namespace App\Core;

class RouterController {

  public function createTemplate(string $page, array $params = []) {

    $loader = new \Twig\Loader\FilesystemLoader('App/Views');

    $twig = new \Twig\Environment($loader);

    echo $twig->render($page,
    [
      ...$params
    ]
    );
  }
}