<?php

class HTML {
  
  public static function script($file)
  {
      return '<script type="text/javascript" src="'.$file.'"></script>';
  }
  
  public static function style($file)
  {
      return '<link rel="stylesheet" type="text/css" href="'.$file.'" />';
  }
}

?>