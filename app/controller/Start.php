<?php

class Controller_Start extends Controller_Base {
  
  public function before()
  {
    parent::before();
  }
  
  public function action_index()
  { 
    $model_News = new Model_News;
    
    // wybieram widok
    $this->view = View::factory('template');
    
    // ustawiam dane w widoku
    $this->view->title = 'Strona Główna';
    $this->view->content = View::factory('start/index');
    
    $this->view->content->news = $model_News->getAll();
  }
  
  public function after()
  {
    parent::after();
  }
}

?>