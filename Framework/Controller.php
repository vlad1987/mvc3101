<?php

namespace Framework;

class Controller
{
    protected function render($view)
    {
        $class = get_class($this);
        $class = strtolower(str_replace(['Controller', '\\'], '', $class));
        
        $path = VIEW_DIR . $class . DS . $view;
        
        if (!file_exists($path)) {
            die("{$path} not found");
        }
        
        ob_start();
        require $path;
        
        return ob_get_clean();
    }
}