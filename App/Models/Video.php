<?php

namespace App\Models;

class Video {
  private $title,$sinopse,$type,$year,$img_cover,$gender;

  public function setTitle($title){
    $this->title = $title;
  }

  public function getTitle(){
    return $this->title;
  }

  public function setSinopse($sinopse){
    $this->sinopse = $sinopse;
  }

  public function getSinopse(){
    return $this->sinopse;
  }

  public function setType($type){
    $this->type = $type;
  }

  public function getType(){
    return $this->type;
  }

  public function setYear($year){
    $this->year = $year;
  }

  public function getYear(){
    return $this->year;
  }

  public function setImgCover($img_cover){
    $this->img_cover = $img_cover;
  }

  public function getImgCover(){
    return $this->img_cover;
  }

  public function setGender($gender){
    $this->gender = $gender;
  }

  public function getGender(){
    return $this->gender;
  }
}