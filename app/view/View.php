<?php

class View {

  private $template;
  
  public function __construct($name)
  {
    if(file_exists(DIR_VIEWS.$name.'.php'))
    {
      $this->template = $name;
    }  
    else
    {
      throw new Exception('Nie znaleziono widoku: '.$name);
    }
  }
  
  public static function factory($name)
  {
    return new View($name);  
  }
  
  public function render()
  {
    // wyswietlam widok
    if(!empty($this->template) AND file_exists(DIR_VIEWS.$this->template.'.php'))
    {
      include_once DIR_VIEWS.$this->template.'.php';
    }
  }
}

?>