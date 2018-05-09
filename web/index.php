<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS . '..' . DS);
define('VIEW_DIR', ROOT . 'View' . DS);

spl_autoload_register(function($className) {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    
    require ROOT . $className;
});

$request = new \Framework\Request($_GET, $_POST);
$router = new \Framework\Router();
$pdo = new \PDO('mysql:host=localhost;dbname=mvc1', 'root', null); // todo: config file

$controller = $request->get('controller', 'default');
$action = $request->get('action', 'index');

$controller =  ucfirst($controller) . 'Controller';
$action .= 'Action';

try {
    if (!file_exists(ROOT . 'Controller' . DS . $controller . '.php')) {
        throw new \Exception("{$controller} not found");
    }
    
    $controller = '\\Controller\\' . $controller;
    $controller = (new $controller())
        ->setRouter($router)
        ->setPdo($pdo)
    ;
    
    if (!method_exists($controller, $action)) {
        throw new \Exception("{$action} not found");
    }
    
    $content = $controller->$action($request);   
} catch (\Exception $e) {
    // todo: create exception controller object
    // execute $content = $controller->errorAction()
    $content = $e->getMessage(); // todo: fix
}

require VIEW_DIR . 'layout.phtml';