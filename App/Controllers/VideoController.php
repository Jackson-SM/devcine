<?php

namespace App\Controllers;

use App\Database\PostgresConnect;
use App\Models\Video;

class VideoController {

  public function create(Video $video){
    $sql = "INSERT INTO videos (title,sinopse,type,year,img_cover,gender,duration) VALUES (:title, :sinopse, :type, :year, :img_cover, :gender, :duration)";
    
    $stmt = PostgresConnect::connect()->prepare($sql);

    $stmt->bindValue(":title", $video->getTitle());
    $stmt->bindValue(":sinopse", $video->getSinopse());
    $stmt->bindValue(":type", $video->getType());
    $stmt->bindValue(":year", $video->getYear());
    $stmt->bindValue(":gender", $video->getGender());
    $stmt->bindValue(":duration", $video->getDuration());

    $name = $video->getImgCover()['name'];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $newName = uniqid().".".$extension;

    $temp = $video->getImgCover()['tmp_name'];

    $stmt->bindValue(":img_cover", $newName);

    if($stmt->execute()){
      $id = PostgresConnect::connect()->lastInsertId();

      $path = ROUTER_IMG_VIDEO."/".$video->getType()."/".$id."/";

      if(!is_dir($path)){
        mkdir($path);
      }

      move_uploaded_file($temp, $path.$newName);
    }
    
  }

  public function readByFilms(){
    $sql = "SELECT * FROM videos WHERE type = 'film'";

    $stmt = PostgresConnect::connect()->prepare($sql);

    if($stmt->execute()){
      $films = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      return $films;
    }
  }

  public function readBySeries(){
    $sql = "SELECT * FROM videos WHERE type = 'serie'";

    $stmt = PostgresConnect::connect()->prepare($sql);

    if($stmt->execute()){
      $series = $stmt->fetchAll(\PDO::FETCH_ASSOC);

      return $series;
    }

  }
  
}