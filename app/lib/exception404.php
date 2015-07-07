<?php

class Exception404 extends Exception {
    
    public function __construct($message = NULL, $code = 0, $previous = NULL)
    {
        parent::__construct($message, $code, $previous);
        
        include_once DIR_VIEWS.'404.php';
        header("HTTP/1.0 404 Not Found");
    }
}

?>