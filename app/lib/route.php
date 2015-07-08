<?php

class Route {
    
    /*
     * Przechowuje wzorce adresow url
     */
    private static $routes = array();
    
    
    private function __construct()
    {
    }
    
    public static function add($name, $expression, array $defaults = NULL)
    {
        self::$routes[$name] = array(
            'expression' => $expression,
            'defaults' => $defaults
        );
    }
    
    public static function get($name)
    {
        return self::$routes[$name];
    }
    
    public static function getAllRoutes()
    {
        return self::$routes;
    }
    
    public static function generateURI($route_name, array $data)
    {
        $route = Route::get($route_name);
        $expr = $route['expression'];
        
        $data2 = array_keys($data);
        foreach($data2 as $value)
        {
            $data3['<'.$value.'>'] = $data[$value];
        }
        
        $uri = str_replace(array('(', ')'), '', $expr);
        return '/'.str_replace(array_keys($data3), $data3, $uri);
    }
}

?>