<?php

namespace App\Database;

class PostgresConnect {

  private static $instance;

  public static function connect() {
    if(!isset(self::$instance)){
      try {
        self::$instance = new \PDO("pgsql:host=localhost;port=5432;dbname=devcine", "postgres", "123");
      }catch(\PDOException $e){
        echo $e->getMessage();
      }
    }
    return self::$instance;
  }
}