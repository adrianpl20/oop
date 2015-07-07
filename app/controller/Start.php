<?php

class Controller_Start extends Controller_Base {
  
  public function before()
  {
    parent::before();
  }
  
  public function action_index()
  { 
    // wybieram widok
    $this->view = View::factory('template');
    
    // ustawiam dane w widoku
    $model_Page = new Model_Page;
    
    $this->view->title = 'Strona Glowna';
    $this->view->content = View::factory('start/index');
    $this->view->content->users = $model_Page->getList();
  }
  
  public function after()
  {
    parent::after();
  }
}

?>