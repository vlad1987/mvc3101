<?php

namespace Framework;

class Router
{
    private $routes;
    
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }
    
    public function match(Request $request)
    {
        $url = $request->getUrl(); // book/213
        var_dump($url);
        $routes = $this->routes;
        var_dump($routes);
        
        foreach ($routes as $route) {
            // loop through available routes
            $pattern = $route['pattern'];
            // var_dump($pattern);
            
            if (!empty($route['parameters'])) {
                // var_dump($route['parameters']);
                foreach ($route['parameters'] as $name => $regex) {
                    $pattern = str_replace(
                        '{' . $name . '}', 
                        '(' . $regex . ')', 
                        $pattern
                    );
                }
            }
            
            $pattern = '@^' . $pattern . '$@';
            var_dump($pattern);
        }
    }
    
    public static function redirect($to)
    {
        header("Location: {$to}");
        die;
    }
}