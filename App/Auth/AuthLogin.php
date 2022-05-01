<?php

namespace App\Auth;

use App\Controllers\UserController;
use App\Database\PostgresConnect;
use App\Models\User;

class AuthLogin {

  public function login(User $user){

    $userController = new UserController();
    $userExists = $userController->readByEmail($user->getEmail());

    if(!empty($userExists)){
      if(password_verify($user->getPassword(), $userExists['password'])){
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = PostgresConnect::connect()->prepare($sql);
  
        $stmt->bindValue(":email", $user->getEmail());
  
        $stmt->execute();

        $_SESSION['logged'] = true;
        $_SESSION['id'] = $userExists['id'];
      } 
    }
  }
}