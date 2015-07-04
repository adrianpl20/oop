<?php

  define('DIR_CONTROLLER', 'app/controller/');
  define('DIR_MODEL', 'app/model/');
  define('DIR_VIEW', 'app/view/');
  define('DIR_VIEWS', 'app/views/');
  define('DIR_MODULES', 'app/modules/');
  
  include_once 'app/bootstrap.php';
  
  include_once DIR_VIEW.'View.php';
  include_once DIR_MODULES.'Module.php';
  

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
        throw new Exception('Nie znaleziono kontrolera: '.$classname);
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
  
  
  $get_controller = NULL;
  $get_action = NULL;
  
  if(isset($_GET['controller']))
  {
    $get_controller = $_GET['controller'];
  }
  if(isset($_GET['action']))
  {
    $get_action = $_GET['action'];
  }
  
  if(empty($get_controller))
  {
    $get_controller = (isset($start_controller) AND file_exists(DIR_CONTROLLER.$start_controller.'.php')) ? $start_controller : 'base';
  }
  if(empty($get_action))
  {
    $get_action = 'index';
  }
  
  
  try
  {
    $tmp = 'Controller_'.ucfirst(strtolower($get_controller));
    $controller = new $tmp();
  
    $controller->before();
    $tmp = strtolower($get_action);
    $controller->$tmp();
    $controller->after();
  }
  catch(Exception $e)
  {
    echo $e->getMessage();
  }

?>