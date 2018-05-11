<?php

namespace Framework;

class Router
{
    private $routes;
    
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }
    
    public static function redirect($to)
    {
        header("Location: {$to}");
        die;
    }
}