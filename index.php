<?php

  define('DIR_CONTROLLER', 'app/controller/');
  define('DIR_MODEL', 'app/model/');
  define('DIR_VIEW', 'app/view/');
  define('DIR_VIEWS', 'app/views/');
  define('DIR_LIB', 'app/lib/');
  define('DIR_MODULES', 'app/modules/');
  
  include_once DIR_VIEW.'View.php';
  include_once DIR_LIB.'Library.php';
  include_once DIR_MODULES.'Module.php';
  Library::load('route');
  Library::load('router');
  Library::load('exception404');
  Library::load('session');
  
  include_once 'app/bootstrap.php';
  

  function __autoload($classname)
  {
    $temp = explode('_', $classname);
    
    if(isset($temp[1]))
    {
      $classname = $temp[1];
    }
    
   
    if(strtolower($temp[0]) === 'controller')
    {   
      if(file_exists(DIR_CONTROLLER.$classname.'.php'))
      {
        include_once DIR_CONTROLLER.$classname.'.php';
      }
      else
      {
        //throw new Exception('Nie znaleziono kontrolera: '.$classname);
        throw new Exception404;
      }
    }
    else if(strtolower($temp[0]) === 'model')
    {
      if(file_exists(DIR_MODEL.$classname.'.php'))
      {
        include_once DIR_MODEL.$classname.'.php';
      }
      else
      {
        throw new Exception('Nie znaleziono modelu: '.$classname);
      }
    }
    else
    {
      throw new Exception('Nie znaleziono klasy: '.$classname);
    }
  }
  
  try
  {
    // Router
    $router = Router::instance($_SERVER['REQUEST_URI']);
    $router->matchRoute();
    // ----
    
    $get_controller = basename($_GET['controller']);
    $get_action = basename($_GET['action']);
  
    
    $tmp = 'Controller_'.ucfirst(strtolower($get_controller));
    $controller = new $tmp();
  
    $controller->before();
    $tmp = 'action_'.strtolower($get_action);
    $controller->$tmp();
    $controller->after();
  }
  catch(Exception $e)
  {
    echo $e->getMessage();
    //echo '<br />Plik: '.$e->getFile();
    //echo '<br />Linia: '.$e->getLine();
  }

?>