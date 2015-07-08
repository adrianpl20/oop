<?php

class Session {
  
  private static $instance;
  
  private function __construct()
  {
  }
  
  public static function instance()
  {
      if(!self::$instance instanceof Session)
      {
          self::$instance = new Session;
          
          if(session_status() === PHP_SESSION_DISABLED)
          {
              throw new Exception('Sesje na twoim serwerze sa wylaczone.');
          }
      }
      return self::$instance;
  }
  
  public function start()
  {
      session_start();
  }
  
  public function regenerate($delete_old_session = FALSE)
  {
      session_regenerate_id($delete_old_session);
  }
  
  public function destroy()
  {
      session_destroy();
  }
  
  public function clear()
  {
      $_SESSION = array();
  }
  
  public function set($key, $value)
  {
      $_SESSION[$key] = $value;
  }
  
  public function get($key)
  {
      return $_SESSION[$key];
  }
  
  public function delete($key)
  {
      unset($_SESSION[$key]);
  }
  
  public function id()
  {
      return session_id();
  }
}

?>