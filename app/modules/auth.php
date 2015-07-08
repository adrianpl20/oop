<?php

class Auth {
  
  private static $instance;
  
  private function __construct()
  {
  }
  
  public static function instance()
  {
      if(!self::$instance instanceof Auth)
      {
          self::$instance = new Auth;
          
          if(session_status() === PHP_SESSION_NONE)
          {
              Session::instance()->start();
          }
      }
      return self::$instance;
  }
  
  public function login($user_id)
  {
      $session = Session::instance();
      
      $session->regenerate(TRUE);
      $session->set('uid', $user_id);
      $session->set('logged', TRUE);
  }
  
  public function is_logged()
  {
      return (Session::instance()->get('logged') === TRUE);
  }
  
  public function logout($destroy_session = FALSE)
  {
      $session = Session::instance();
      
      if($destroy_session === TRUE)
      {
          $session->destroy();
      }
      else
      {
          $session->delete('uid');
          $session->delete('logged');
          
          $session->regenerate(TRUE);
      }
  }
  
  public function get_id()
  {
      return Session::instance()->get('uid');
  }
  
  public function encodePassword($password)
  {
      return hash('sha256', $password);
  }
}

?>