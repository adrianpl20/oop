<?php

class Module {

  private function __construct()
  {
  }
  
  public static function load($name)
  {
    if(file_exists(DIR_MODULES.$name.'.php'))
    {
      include_once DIR_MODULES.$name.'.php';
    }
    else
    {
      throw new Exception('Nie znaleziono modulu: '.$name);
    }
  }
}

?>