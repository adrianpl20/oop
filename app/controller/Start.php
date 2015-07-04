<?php

class Controller_Start extends Controller_Base {
  
  public function before()
  {
    parent::before();
  }
  
  public function index()
  { 
    // wybieram widok
    $this->view = View::factory('template');
    
    // ustawiam dane w widoku
    $model_Page = new Model_Page;
    
    $this->view->title = 'Strona Glowna';
    $this->view->content = $model_Page->getContent();
    $this->view->users = $model_Page->getList();
  }
  
  public function after()
  {
    parent::after();
  }
}

?>