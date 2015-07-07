<?php

class Database {
  
  private static $instance;
  
  private function __construct()
  {
  }
  
  public static function instance()
  {
    if(!self::$instance instanceof Database)
    {
      try
      {
        self::$instance = new PDO('mysql:host=localhost;dbname=projekt', 'root', '');
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e)
      {
        die('Nie udalo sie polaczyc z baza danych: '.$e->getMessage());
      }
    }
    return self::$instance;  
  }
}

class DB extends Database {
}

?>