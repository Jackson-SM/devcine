<?php

namespace App\Controllers;

use App\Models\User;
use App\Database\PostgresConnect;

class UserController {

  private $error,$user;

  public function create(User $user){
    $sql = "INSERT INTO users (email, name, password, level, img_profile) VALUES (:email, :name, :password, :level, :img_profile)";

    $userExists = $this->readByEmail($user->getEmail());
    if(!empty($userExists)){
      echo 'Account already exists.';
      return true;
    }

    $stmt = PostgresConnect::connect()->prepare($sql);
    $stmt->bindValue(":email", $user->getEmail());
    $stmt->bindValue(":name", $user->getName());
    $stmt->bindValue(":password", $user->getPassword());
    $stmt->bindValue(":level", $user->getLevel() || 1);

    $name = $user->getImgProfile()['name'];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $newName = uniqid().".".$extension;

    $tmpName = $user->getImgProfile()["tmp_name"];

    $stmt->bindValue(":img_profile", $newName);

    if($stmt->execute()){
      $id = PostgresConnect::connect()->lastInsertId();

      $_SESSION['id'] = $id;
      $_SESSION['logged'] = true;
      
      if(!is_dir(ROUTER_IMG_PROFILE."/".$id)){
        mkdir(ROUTER_IMG_PROFILE."/".$id);
      }
      $path = ROUTER_IMG_PROFILE."/".$id."/".$newName;

      if(move_uploaded_file($tmpName, $path)){
        $user->setImgProfile($newName);
      }else{
        return "Not possible uploaded file";
      }
    }

  }

  public function readByEmail(string $email){
    $sql = "SELECT * FROM users WHERE email = :email";

    $stmt = PostgresConnect::connect()->prepare($sql);
    $stmt->bindValue(":email", $email);

    $stmt->execute();

    $data = $stmt->fetch();
    return $data;
  }
   
  public function readById($id){
    if($id){
      $sql = "SELECT * FROM users WHERE id = :id";
    
      $stmt  = PostgresConnect::connect()->prepare($sql);
      $stmt->bindValue(":id", $id);
  
      $stmt->execute();
      
      $data = $stmt->fetch();
      return $data;  
    }else{
      session_destroy();
    }
  }
}