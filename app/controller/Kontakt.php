<?php

class Controller_Kontakt extends Controller_Base {
  
  public function before()
  {
    parent::before();
  }
  
  public function action_index()
  { 
    // wybieram widok
    $this->view = View::factory('template');
    
    // ustawiam dane w widoku
    $this->view->title = 'Strona Glowna';
    $this->view->content = View::factory('kontakt/index');
  }
  
  public function after()
  {
    parent::after();
  }
}

?>