<?php

class Controller_News extends Controller_Base {
  
  public function before()
  {
    parent::before();
  }
  
  public function action_add()
  { 
    $model_News = new Model_News;
    
    // obsluga formularza
    if(isset($_POST['add']))
    {
        $valid = $model_News->validation($_POST);
        
        if($valid === TRUE)
        {
            $model_News->add($_POST);
        }
    }
      
    // wybieram widok
    $this->view = View::factory('template');
    
    // ustawiam dane w widoku
    $this->view->title = 'Dodaj artykuł';
    $this->view->content = View::factory('news/add');
    
    $this->view->content->valid = $valid;
  }
  
  public function after()
  {
    parent::after();
  }
}

?>