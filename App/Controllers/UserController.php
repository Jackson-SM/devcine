<?php

namespace App\Controllers;

use App\Models\User;
use App\Database\PostgresConnect;

class UserController {

  public function readByEmail(string $email){
    $sql = "SELECT * FROM users WHERE email = :email";

    $stmt = PostgresConnect::connect()->prepare($sql);
    $stmt->bindValue(":email", $email);

    $stmt->execute();

    $data = $stmt->fetch();
    return $data;
  }

  public function create(User $user){
    $sql = "INSERT INTO users (email, login, name, password, level, img_profile) VALUES (:email, :login, :name, :password, :level, :img_profile)";

    $userExists = $this->readByEmail($user->getEmail());
    if(!empty($userExists)){
      throw new \Exception("Email already exists");
    }

    $stmt = PostgresConnect::connect()->prepare($sql);
    $stmt->bindValue(":email", $user->getEmail());
    $stmt->bindValue(":login", $user->getLogin());
    $stmt->bindValue(":name", $user->getName());
    $stmt->bindValue(":password", $user->getPassword());
    $stmt->bindValue(":level", $user->getLevel() || 1);

    $name = $user->getImgProfile()['name'];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $newName = uniqid().".".$extension;

    if(!is_dir(ROUTER_IMG_PROFILE)){
      mkdir(ROUTER_IMG_PROFILE);
    }

    $tmpName = $user->getImgProfile()["tmp_name"];
    $path = ROUTER_IMG_PROFILE."/".$newName;

    if(move_uploaded_file($tmpName, $path)){
      $user->setImgProfile($newName);
    }

    $stmt->bindValue(":img_profile", $user->getImgProfile());

    $stmt->execute();
  }
   
  public function readById(int $id){

  }
}