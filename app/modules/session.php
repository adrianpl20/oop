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
    }
    
    return self::$instance;
  }
  
  public function start()
  {
    session_start();
  }
}

?>