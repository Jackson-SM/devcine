<?php

namespace App\Controllers;

use App\Database\PostgresConnect;

class DashboardController {
  public function readByNumbersUsers(){
    $sql = "SELECT * FROM users";

    $stmt = PostgresConnect::connect()->prepare($sql);

    if($stmt->execute()){
      $usersNumbers = $stmt->rowCount();

      return $usersNumbers;
    }
  }

  public function readByFilms(){
    $sql = "SELECT * FROM videos WHERE type = 'film'";

    $stmt = PostgresConnect::connect()->prepare($sql);

    if($stmt->execute()){
      $films = $stmt->rowCount();

      return $films;
    }
  }

  public function readBySeries(){
    $sql = "SELECT * FROM videos WHERE type = 'serie'";

    $stmt = PostgresConnect::connect()->prepare($sql);

    if($stmt->execute()){
      $series = $stmt->rowCount();

      return $series;
    }

  }

}