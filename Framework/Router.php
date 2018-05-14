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
        // var_dump($url);
        $routes = $this->routes;
        // var_dump($routes);
        
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
            // var_dump($pattern);
            
            if (preg_match($pattern, $url, $matches)) {
                // var_dump($matches);
                // remove match by whole regexp
                array_shift($matches);
                // var_dump($matches);
                
                if (!empty($route['parameters'])) {
                    $result = array_combine(
                        array_keys($route['parameters']),
                        $matches
                    ); 
                    
                    // var_dump($result);
                    
                    $request->mergeGetWithArray($result);
                }
                
                $this->currentRoute = $route;
                
                
                var_dump($this->currentRoute);
                
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