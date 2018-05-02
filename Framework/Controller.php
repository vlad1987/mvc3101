<?php

namespace Framework;

class Controller
{
    protected $router;
    
    protected $pdo;
    
    public function setRouter(Router $router)
    {
        $this->router = $router;
        
        return $this;
    }
    
    public function setPdo(\PDO $pdo)
    {
        $this->pdo = $pdo;
        
        return $this;
    }
    
    protected function render($view, array $args = [])
    {
        extract($args);
        $class = get_class($this);
        $class = strtolower(str_replace(['Controller', '\\'], '', $class));
        
        $path = VIEW_DIR . $class . DS . $view;
        
        if (!file_exists($path)) {
            throw new \Exception("{$path} not found");
        }
        
        ob_start();
        require $path;
        
        return ob_get_clean();
    }
}