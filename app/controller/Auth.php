<?php

class Controller_Auth extends Controller_Base {
  
  public function before()
  {
    parent::before();
  }
  
  public function action_register()
  { 
    if($this->logged === TRUE)
    {
        header('Location: /');
        exit;
    }
    
    $model_Auth = new Model_Auth;
    
    // obsluga formularza
    if(isset($_POST['send']))
    {
        $valid = $model_Auth->registerValidation($_POST);
        
        if($valid === TRUE)
        {
            $model_Auth->createAccount($_POST);
        }
    }
      
    // wybieram widok
    $this->view = View::factory('template');
    
    // ustawiam dane w widoku
    $this->view->title = 'Zarejestruj się';
    $this->view->content = View::factory('auth/register');
    
    $this->view->content->valid = $valid;
  }
  
  public function action_login()
  { 
    if($this->logged === TRUE)
    {
        header('Location: /');
        exit;
    }
    
    $model_Auth = new Model_Auth;
    
    // obsluga formularza
    if(isset($_POST['send']))
    {
        $valid = $model_Auth->loginValidation($_POST);
        
        if($valid === TRUE)
        {
            $model_User = new Model_User;
            
            $userid = $model_User->getIdFromName($_POST['name']);
            
            // loguje użytkownika
            Auth::instance()->login($userid);
            
            // przekierowanie na glowna strone
            header('Location: /');
            exit;
        }
    }
      
    // wybieram widok
    $this->view = View::factory('template');
    
    // ustawiam dane w widoku
    $this->view->title = 'Zaloguj się';
    $this->view->content = View::factory('auth/login');
    
    $this->view->content->valid = $valid;
  }
  
  public function action_logout()
  {
      if($this->logged === TRUE)
      {
          Auth::instance()->logout();
      }
      
      header('Location: /');
      exit;
  }
  
  public function after()
  {
    parent::after();
  }
}

?>