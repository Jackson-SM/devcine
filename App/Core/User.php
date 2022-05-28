<?php

namespace App\Core;

class User {
  private $id;

  public function idSession(){
    $id = null;

    if(isset($_SESSION['id'])){
      $id = $_SESSION['id'];
    }

    $this->id = $id;
    return $this->id;
  }
}