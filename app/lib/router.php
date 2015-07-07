<?php

class Router {
    
    private static $instance;
    private $uri;
    
    
    public function __construct($uri = NULL)
    {
        if(!empty($uri))
        {
            $pos = strpos($uri, '?');
            if($pos !== FALSE)
            {
                $uri = substr($uri, 0, $pos);
            }
            
            $uri = ltrim($uri, '/');
            $uri = rtrim($uri, '/');
            
            $this->uri = $uri;
        }
    }
    
    public static function instance($uri)
    {
        if(!self::$instance instanceof Router)
        {
            self::$instance = new Router($uri);
        }
        return self::$instance;
    }
    
    public function matchRoute()
    {
        $finded = FALSE;
        $routes = Route::getAllRoutes();
        
        foreach($routes as $route)
        {
            $uri = preg_replace('/<\w+>/', '[[:alpha:][:digit:]\-_\+]+', $route['expression']);
            $uri = str_replace(')', ')?', $uri);
            
            preg_match("#^$uri$#", $this->uri, $results);
            
            if($results)
            {
                $finded = TRUE;
                $this->setRouteData($this->uri, $route);
                break;
            }
        }
            
        if($finded === FALSE)
        {
            throw new Exception404;
        }
        
        if(!isset($_GET['controller']) OR empty($_GET['controller']))
        {
            throw new Exception('Nie ustawiono domyslnego kontrolera dla danego wzorca w pliku bootstrap.php');
        }
        
        if(!isset($_GET['action']) OR empty($_GET['action']))
        {
            throw new Exception('Nie ustawiono domyslnej akcji kontrolera dla danego wzorca w pliku bootstrap.php');
        }
    }
    
    private function setRouteData($uri, $route)
    {
        if(!empty($uri))
        {
            $expression = preg_replace('/[()<>]+/', '', $route['expression']);
                
            $tmp = explode('/', $expression);
            $tmp2 = explode('/', $uri);
            
            foreach($tmp as $key => $value)
            {
                if(empty($value))
                    continue;
                
                $_GET[$value] = $tmp2[$key];
            }
        }
        
        // Domyœlne parametry
        if(!empty($route['defaults']))
        {
            foreach($route['defaults'] as $key => $value)
            {
                if(!isset($_GET[$key]) OR empty($_GET[$key]))
                {
                    $_GET[$key] = $value;
                }
            }
        }
    }
}

?>