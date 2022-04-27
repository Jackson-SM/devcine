<?php

namespace App\Models;

class User {
  private $email,$login,$name,$password,$level,$img_profile;

  /* 
    Email Functions
  */

  public function setEmail(string $email){
    $this->email = $email;
  }

  public function getEmail(){
    return $this->email;
  }

  /* 
    Login Functions
  */

  public function setLogin(string $login){
    $this->login = $login;
  }

  public function getLogin(){
    return $this->login;
  }

  /* 
    Name Functions
  */

  public function setName(string $name){
    $this->name = $name;
  }

  public function getName(){
    return $this->name;
  }

  /*
  Passowrd Functions
  */

  public function setPassword(string $password){
    $this->password = $password;
  }

  public function getPassword(){
    return $this->password;
  }

  public function hashTransformPassword(string $password){
    $this->password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 15]);
  }

  /* 
    Level Functions
  */

  public function setLevel(int $level){
    $this->level = $level;
  }

  public function getLevel(){
    return $this->level;
  }

  /* 
    Image Profile Functions
  */

  public function setImgProfile(string $img_profile){
    $this->img_profile = $img_profile;
  }

  public function getImgProfile(){
    return $this->img_profile;
  }
}