<?php

class Controller_Base {

  protected $view;

  public function before()
  {
    // ladowanie modulow, np. od logowania, sesja
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
  }
  
  public function index()
  {
  
  }
  
  public function after()
  {
    // wyswietlam widok
    if($this->view instanceof View)
    {
      $this->view->render();
    }
    else
    {
      throw new Exception('Nie ustawiono zadnego widoku do wyswietlenia.');
    }
  }
}

?>