<?php

class Controller_Base {

  protected $view;
  protected $logged = FALSE;

  public function before()
  {
    // --- Ladowanie modulow, np. od logowania, sesja ---
    global $modules;
    
    if(!empty($modules) AND is_array($modules))
    {
      foreach($modules as $value)
      {
        Module::load($value);
      }
    }
    
    // --- Start sesji uzytkownika ---
    Session::instance()->start();
    
    // --- Sprawdzam czy uzytkownik jest zalogowany ---
    $this->logged = Auth::instance()->is_logged();
  }
  
  public function after()
  {
    if($this->view instanceof View)
    {
      // -- CSS i Javascript --
      $this->view->_script = array();
      
      $this->view->_style = array(
        '/media/style.css'
      );
      
      // -- Wstawiam dodatkowe dane do widoku --
      $this->view->logged = $this->logged;
        
      // -- Wyswietlam widok --
      $this->view->render();
    }
    else
    {
      throw new Exception('Nie ustawiono zadnego widoku do wyswietlenia.');
    }
  }
  
  public function __call($method, $args)
  {
      throw new Exception('Nie znaleziono metody: '.$method.'.');
  }
  
  public static function __callStatic($method, $args)
  {
      throw new Exception('Nie znaleziono metody statycznej: '.$method.'.');
  }
}

?>