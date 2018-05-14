<?php

namespace Framework;

class Router
{
    private $routes;
    
    private $currentRoute;
    
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }
    
    public function match(Request $request)
    {
        $url = $request->getUrl(); // book/213
        $routes = $this->routes;
        
        foreach ($routes as $route) {
            // loop through available routes
            $pattern = $route['pattern'];
            
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
            
            if (preg_match($pattern, $url, $matches)) {
                // remove match by whole regexp
                array_shift($matches);
                // var_dump($matches);
                
                if (!empty($route['parameters'])) {
                    $result = array_combine(
                        array_keys($route['parameters']),
                        $matches
                    ); 
                    
                    $request->mergeGetWithArray($result);
                }
                
                $this->currentRoute = $route;
                
                return;
            }
        }
        
        throw new \Exception('Page not found', 404);
    }
    
    public function getCurrentController()
    {
        return $this->getCurrentRouteAttribute('controller');
    }
    
    public function getCurrentAction()
    {
        return $this->getCurrentRouteAttribute('action');
    }
    
    private function getCurrentRouteAttribute($key)
    {
        if (!$this->currentRoute) {
            return null;
        }
        
        return $this->currentRoute[$key];
    }
    
    public static function redirect($to)
    {
        header("Location: {$to}");
        die;
    }
}