<?php

class Library {

  private function __construct()
  {
  }
  
  public static function load($name)
  {
    if(file_exists(DIR_LIB.$name.'.php'))
    {
      include_once DIR_LIB.$name.'.php';
    }
    else
    {
      throw new Exception('Nie znaleziono modulu systemowego (lib): '.$name);
    }
  }
}

?>